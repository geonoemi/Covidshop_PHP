<?php //modell class hoes here

class Model{
	private $conn;
	function __construct(){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "covidshop";
		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}

	function getProductNames(){
		//get data from db
		return ['Maszk','Kesztyű','Cicatáp <3'];
	}

	function getProducts(){
		$products = array();
		$sql = "SELECT itemName, price, quantity, description, id FROM product;";
		$result = $this->conn->query($sql);
		while($row = $result->fetch_assoc()) {
			array_push($products, $row);
		}
		return $products;

	}
	function getUser() {return array('name' => 'fasz' , );}
	function addProduct($name, $quantity, $prodid, $price, $description) {
		$sql = "INSERT INTO product (itemName, price, quantity, description) VALUES ('" . $name . "', '" . $price . "', '" . $quantity . "', '" . $description. "');";
		$this->conn->query($sql);


	}
}
