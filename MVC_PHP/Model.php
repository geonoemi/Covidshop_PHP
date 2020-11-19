<?php //modell class goes here

class Model{
	//változó a db kapcsolathoz
	private $conn;
	//konstruktor
	function __construct(){

		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "covidshop";

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
			"SELECT itemName, price, quantity, description, id FROM product;"
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

	//csinálhatunk egy ilyen generikus metódust is, ha ez szimpibb, akkor nem kell a fenti kettő
	//ez működik bármilyen paraméter nélküli selecten szerintem
	function productsGet($sql){
		//lekérdezés végeredménye
		$result = array();
		//prepared statement
		$query = $this->conn->prepare(
			$sql
		);
		//query végrehajtása 
		$query->execute();

		//result tömb benépesítése
		while($row = $query->fetch()) {
			array_push($result, $row);
		}

		//tömb visszaadása
		return $result;
	}

	//termékek keresése
	function searchProducts($keyword){
		//eredmény tömb
		$products = array();
		//prepared statement
		$query = $this->conn->prepare(
			"SELECT itemName, price, quantity, description, id FROM product WHERE itemName LIKE '%" . $keyword . "%';"
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

	//termékek hozzáadása
	function addProduct($name, $quantity, $prodid, $price, $description, $picid){
		//prepared statement
		$stmt = $this->conn->prepare(
			"INSERT INTO product(itemName, price, quantity, description, picId)
			VALUES (:name, :quantity, :prodid, :price, :description, :picid);"
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
	//user tábla minden adata
	function getAllUsers() {
		//eredmény tömb
		$users = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM customer;"
		);

		//lekérdezés lefuttatása
		$query->execute();

		//users tömb benépesítése
		while($row = $query->fetch()){
			array_push($users,$row);
		}

		//tömb visszaadása
		return $users;
	}

	//felhasználó lekérése felhasználónév alapján
	function getUserByName($username){
		//eredmény tömb
		$users = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM customer
			WHERE username = :username;"
		);

		//paraméter hozzáadása
		$query->bindValues(':username', $username);

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
	function getUserById($id){
		//eredmény tömb
		$users = array();

		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM customer
			WHERE id = :id;"
		);

		//paraméter hozzáadása
		$query->bindValues(':id', $id);

		//lekérdezés lefuttatása
		$query->execute();

		//users tömb benépesítése
		while($row = $query->fetch()){
			array_push($users,$row);
		}

		//tömb visszaadása
		return $users;
	}

	//ezt a kettőt is meg lehet csinálni generikusra, mert csak egy paramétere van mindkettőnek
	//pl:
	function getGeneralUserData($sql, $param1, $param2){
		//eredmény tömb
		$users = array();

		//prepared statement
		$query = $this->conn->prepare(
			$sql
		);

		//paraméter hozzáadása
		$query->bindValues($param1, $param2);

		//lekérdezés lefuttatása
		$query->execute();

		//users tömb benépesítése
		while($row = $query->fetch()){
			array_push($users,$row);
		}

		//tömb visszaadása
		return $users;
	}

	//felhasználónév és jelszó páros egyezőségének vizsgálata
	function checkUserData($username, $password){
		//eredmény tömb
		$users = array();
		
		//pw titkosítás
		$password = md5($password);
		
		//prepared statement
		$query = $this->conn->prepare(
			"SELECT * FROM customer
			WHERE username = :username AND password = :password;"
		);

		//paraméter hozzáadása
		$query->bindValues(':username', $username);
		$query->bindValues(':password', $password);

		//lekérdezés lefuttatása
		$query->execute();

		//ha megfelelő a felhasználónév és jelszó páros akkor igaz értékkel tér vissza
		//ha nem akkor hamissal
		if($query->rowCount()>0){
            return true;
        }else{
            return false;
        }
	}

	//felhasználó regisztrálása
	function addUser($username, $password){
		//először megnézzük, hogy létezik e már a felhasználónév
		if(count($this->getUserByName($username)>0)){
			//ha már létezik a felhasználónév hamissal térünk vissza
			return false;
		}else{
			//ha nem létezik hozzáadjuk a customer táblához
			$stmt = $this->conn->prepare(
				"INSERT INTO customer(username, password)
				VALUES (:username, :password);"
			);

			//paraméter hozzáadás
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', md5($password));

			//statement lefuttatása
			return $stmt->execute();
		}
	}
}
