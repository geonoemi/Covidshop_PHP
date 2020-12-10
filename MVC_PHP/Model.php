<?php //modell class goes here

class Model{
	//változó a db kapcsolathoz
	private $conn;
	//konstruktor
	function __construct(){

		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "covidshopuj";

		//try-catch blokk
		try{
			//pdo példány
            $this->conn = new PDO("mysql:host=".$host.";dbname=".$dbname, $username,$password);

			//default hibaüzenet mód
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			//fetch_assoc default fetch módnak
			$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		//catch a hibára
        }catch(PDOException $e){
            echo "Connection failed " . $e->getMessage();
        }
	}

	//--PRODUCT TABLE--
	//termékek nevei
	function getProductNames(){
		//lekérdezés eredménye
		$productsName = array();
		//prepared statement
		$query = $this->conn->prepare(
			"SELECT itemName FROM product;"
		);
		//query végrehajtása
		$query->execute();

		//productsName tömb benépesítése
		while($row=$query->fetch()){
			array_push($productsName, $row);
		}

		//visszatérési értéknek a tömb
		return $productsName;
	}

	//termékekről minden adat
	function getProducts(){
		//lekérdezés végeredménye
		$products = array();
		//prepared statement
		$query = $this->conn->prepare(
			"SELECT itemName, price, quantity, description, id , picId FROM product
			WHERE quantity > 0;"
		);
		//query végrehajtása
		$query->execute();

		//products tömb benépesítése
		while($row = $query->fetch()) {
			array_push($products, $row);
		}

		//tömb visszaadása
		return $products;
	}

	//termékek keresése
	function searchProducts($keyword) {
		//eredmény tömb
		$products = array();

		$sql = "SELECT itemName, price, quantity, description, id, picId FROM product WHERE itemName LIKE '%" . $keyword . "%';";
		$result = $this->conn->query($sql);
		while($row = $result->fetch()) {

		//prepared statement
		$query = $this->conn->prepare(
			$sql
		);

		//query végrehajtása
		$query->execute();

		//products tömb benépesítése
		while($row = $query->fetch()) {

			array_push($products, $row);
		}

		//visszatérési érték
		return $products;
	}
}
	//termékek hozzáadása
	function addProduct($name, $quantity, $prodid, $price, $description, $picid){
		//prepared statement
		$stmt = $this->conn->prepare(
			"INSERT INTO product(itemName, prodId, price, quantity, description, picId)
			VALUES (:name, :prodid, :price, :quantity, :description, :picid);"
		);

		//paraméterek hozzáadása a statementhez
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':quantity', $quantity);
		$stmt->bindParam(':prodid', $prodid);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':picid', $picid);

		//visszatérési értéknek a lefuttatás értéke
		return $stmt->execute();
	}



	//--customer TABLE--

	//felhasználó lekérése felhasználónév alapján
	function getUserByName($username){
		//eredmény tömb
		$users = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM users
			WHERE username = :username;"
		);

		//paraméter hozzáadása
		$query->bindParam(':username', $username);

		//lekérdezés lefuttatása
		$query->execute();

		//users tömb benépesítése
		while($row = $query->fetch()){
			array_push($users,$row);
		}

		//tömb visszaadása
		return $users;
	}

	//felhasználó lekérése id alapján
	function getUserId($username){
		//eredmény
		$userid;

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT id FROM users
			WHERE username = :username;"
		);

		//paraméter hozzáadása
		$query->bindParam(':username', $username);

		//lekérdezés lefuttatása
		$query->execute();

		$userid = $query->fetch();

		//userid visszaadása
		return $userid;
	}

	//felhasználónév és jelszó páros egyezőségének vizsgálata
	function checkUserData($username, $password){
		//eredmény tömb
		$users = array();

		//pw titkosítás
		$password = md5($password);

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM users
			WHERE username = :username AND password = :password;"
		);

		//paraméter hozzáadása
		$query->bindParam(':username', $username);
		$query->bindParam(':password', $password);

		//lekérdezés lefuttatása
		$query->execute();

		//ha megfelelő a felhasználónév és jelszó páros akkor igaz értékkel tér vissza
		//ha nem akkor hamissal
		if($query->rowCount()>0){
            return true;
        }
		else{
            return false;
        }
	}

	function isAdmin($username){
		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM users
			WHERE username = :username AND isadmin = 1;"
		);

		$query->bindParam(':username', $username);

		//eredmény és leffutatás
		$query->execute();

		if($query->rowCount()>0){
            return true;
        }
		else{
            return false;
        }
	}

	//felhasználó regisztrálása
	function addUser($username, $password, $email){
		//először megnézzük, hogy létezik e már a felhasználónév
		if(count($this->getUserByName($username))>0){
			//ha már létezik a felhasználónév hamissal térünk vissza
			return false;
		}else{
			//ha nem létezik hozzáadjuk a customer táblához
			$stmt = $this->conn->prepare(
				"INSERT INTO users(username, password, email)
				VALUES (:username, :password, :email);"
			);

			//paraméter hozzáadás
			$password = md5($password);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':email', $email);
			//statement lefuttatása
			return $stmt->execute();
		}
	}

	//jelszó változtatása
	function changePw($userid, $password){
		//prepared statement
		$stmt = $this->conn->prepare(
			"UPDATE users SET password=:password
			WHERE id=:userid;"
		);

		//pw titkosítás
		$password = md5($password);
		//paraméterek hozzáadása
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':userid', $userid);

		//leffutatás
		return $stmt->execute();
	}

	//email megváltoztatása
	function changeEmail($userid, $email){
		//prepared statement
		$stmt = $this->conn->prepare(
			"UPDATE users SET email=:email
			WHERE id=:userid;"
		);

		//paraméterek hozzáadása
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':userid', $userid);

		//leffutatás
		return $stmt->execute();
	}

	//mindkettő megváltoztatása
	function changePwAndEmail($userid, $password, $email){
		//prepared statement
		$stmt = $this->conn->prepare(
			"UPDATE users SET email=:email, password=:password
			WHERE id=:userid;"
		);

		//$userid = (int)$userid;
		//pw titkosítás
		$password = md5($password);
		//paraméterek hozzáadása
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':userid', $userid);

		//leffutatás
		return $stmt->execute();
	}

	//--LAKCÍMEK--
	//lekérdezi egy felhasználó jelenlegi lakcímeit
	function getAddress($userid){
		//eredménytömb
		$addressArr = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT postalcode, city, street, number, other FROM address
			WHERE userid = :userid;"
		);

		//paraméter hozzáadása
		$query->bindParam(':userid', $userid);

		//lefuttatás
		$query->execute();

		//ha van létező lakcím belerakjuk a tömbbe
		if($query->rowCount()>0){
			while($row=$query->fetch()){
				array_push($addressArr, $row);
			}
			return $addressArr;
		}//ha nincs akkor hamissal térünk vissza
		else return false;
	}

	//lakcím hozzáadása
	function addNewAddress($userid, $postalcode, $city, $street, $number){
		//prepared statements
		$query = $this->conn->prepare(
			"INSERT INTO address(userid, postalcode, city, street, number)
			VALUES (:userid, :postalcode, :city, :street, :number);"
		);

		//paraméter hozzáadás
		$query->bindParam(':userid', $userid);
		$query->bindParam(':postalcode', $postalcode);
		$query->bindParam(':city', $city);
		$query->bindParam(':street', $street);
		$query->bindParam(':number', $number);

		//lefuttatás
		return $query->execute();
	}

	//--MEGRENDELÉSEK--
	//az összes eddigi megrendelést lekérdezi
	function getAllOrders(){
		//eredménytömb
		$orders = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT users.username, orders.items, orders.price, orders.date FROM orders
			INNER JOIN users ON users.id = orders.userid
			ORDER BY orders.date ASC;"
		);

		//lekérdezés lefuttatása
		$query->execute();

		//orders tömb benépesítése
		while($row = $query->fetch()){
			array_push($orders,$row);
		}

		//tömb visszaadása
		return $orders;
	}

	//csak egy felhasználó rendelései userid alapján
	//lehet akár username is ha uniquera van állítva
	function getOrdersByUsername($username){
		//eredménytömb
		$orders = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT users.username, orders.items, orders.price, orders.date FROM orders
			INNER JOIN users ON users.id = orders.userid
			WHERE users.username = :username
			ORDER BY orders.date ASC;"
		);

		//parametrizálás
		$query->bindParam(':username', $username);

		//lekérdezés lefuttatása
		$query->execute();

		//orders tömb benépesítése
		while($row = $query->fetch()){
			array_push($orders,$row);
		}

		//tömb visszaadása
		return $orders;
	}

	//új megrendelés hozzáadása
	function newOrder($userid, $items, $price){
		//statement
		$stmt = $this->conn->prepare(
			"INSERT INTO orders(userid, items, price)
			VALUES (:userid, :items, :price);"
		);

		//paraméterek
		$stmt->bindParam(':userid', $userid);
		$stmt->bindParam(':items', $items);
		$stmt->bindParam(':price', $price);

		//végrehajtás
		return $stmt->execute();
	}
	function checkOut($quantity, $id) {
		$stmt = $this->conn->prepare("UPDATE product SET quantity = quantity - :quantity WHERE id = :id AND quantity - :quantity >= 0;");
		$stmt->bindParam(':quantity', $quantity);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

}
