<?php
// Database connection class
 
class DbConfig{
	// member variable
	public $dbcon;  // database connection handler
	
	// member functions
	public function __construct(){
		// create connection
		$this->dbcon = new mysqli("localhost", "root", "", "pharmadb");
		
		// check connection
		if($this->dbcon->connect_error){
			die("Connection Failed ".$this->dbcon->connect_error);
		}else{
			//echo "Connection Successful";
		}
		
	}
} 

class Product{
	// member variables/ properties
	public $p_name;
	public $manufacturer;
	public $price;
	public $p_photo;
	
	
	public $obj; //obect handler of PdbConfig
	
	// member functions
	public function __construct(){
		//create connection
		$this->obj = new DbConfig;
	}
	
	public function newProduct($p_name, $manufacturer, $price, $p_photo, $catid, $rep_id){
		
		
		$this->p_name = $p_name;
		$this->manufacturer = $manufacturer;
		$this->price = $price;
		$this->p_photo = $p_photo;
		$this->catid = $catid;
		$this->rep_id = $rep_id;
		

		//insert into user table
		$sql = "INSERT INTO product (p_name, manufacturer, price, p_photo, catid, rep_id) VALUES('$p_name', '$manufacturer', '$price', '$p_photo' $catid, $rep_id)";
		
		// check if the query method runs the insert statement
		if($this->obj->dbcon->query($sql)===true){
			
			echo " You have successfully added a  NEW product  <a href='msrdashboard.php'>Back to View Products in Page</a>";
		}else{
			
			echo "Error ".$this->obj->dbcon->error;
		}
	}
	
		//function to display all
	public function getProduct(){
		//write queryto select roles from database
		$sql = "SELECT * FROM product"; //"SELECT * FROM product "; catid = '$catid'
		$result = $this->obj->dbcon->query($sql);
		
		//check if the query() runs the select statement
		if($result = $this->obj->dbcon->query($sql)){
			// do this
			
			$row = $result->fetch_all(MYSQLI_ASSOC);
			// if not so do this
		}else{
			echo "Error ".$this->obj->dbcon->error;
		}
		return $row;
	}
	
		//function to display all roles
	public function editProduct($product_id){
		//write queryto select a specific user
		$sql = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
		$result = $this->obj->dbcon->query($sql);
		
		//check if the query() runs the select statement
		
		if($result = $this->obj->dbcon->query($sql)){
			// do this
			
			$row = $result->fetch_assoc();
			// if not so do this
		}else{
			echo "Error ".$this->obj->dbcon->error;
		}
		return $row;
	}


	public function updateProduct($p_name, $manufacturer, $price, $product_id){
		
		
		$this->p_name = $p_name;
		$this->manufacturer = $manufacturer;
		$this->price = $price;
		
		//insert int user table
		$sql = "UPDATE product set p_name='$p_name', manufacturer='$manufacturer', price='$price' WHERE product_id='$product_id'";
		
		// check if the query() runs the update statement
		if($this->obj->dbcon->query($sql)===true){
			
			// echo You've successfully registered <a href="register.php"
			
			// redirect to view users page
			
			header('Location: http://localhost/pharmahub/msrdashboard.php');


		}else{
			
			echo "Error ".$this->obj->dbcon->error;
		}
	}
	
	// search user method
	public function searchProduct($search){
		
		// write query to search based on the parameter
		$query = "SELECT p_name, manufacturer, price FROM product WHERE p_name like '%$search%' OR manufacturer like '%$search%'";
		
		//run the sql query
		$result = $this->obj->pdbcon->query($query);
		
		if($this->obj->dbcon->affected_rows > 0){
			
			$row =  $result->fetch_all(MYSQLI_ASSOC);
			
			// json string
			$jsonrow = json_encode($row);
			/*$jsondata = "{
				'msgcode' : 1,
				'msgdata' : $jsonrow
			}";*/
			
		}elseif($this->obj->dbcon->affected_rows == 0){
			/*$jsondata = "{
				'msgcode' : 2,
				'msgdata' : 'Not Found'
			}";
			$row = "Not Found";
			*/$jsonrow = "{'msgdata' : 'Not found'}";
		}else{
			
			echo "Error ".$this->obj->dbcon->error;
		}
		return $jsonrow;
	}
	
	
	// delete rep method
	public function deleteProduct($product_id){
		
		
		$query = "DELETE from product WHERE product_id = '$product_id'";
		
		//write a query to delete specific rep based rep_id
		if($result = $this->obj->dbcon->query($query)){
			// do this
			
			$result = "Product successfully deleted";
		
			// if not so do this
		}else{
			echo "Error ".$this->obj->dbcon->error;
		}
		return $result;
	}	
	
// check input method
	public static function checkInput($data){
		//removes unnecessary spaces in input tags
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = addslashes($data);
		
		return $data;
		}
	
}


//-----------------------------------------------------------------------------------------
//------------------------------------- PRODUCT ENDS --------------------------------------
//-----------------------------------------------------------------------------------------
?>