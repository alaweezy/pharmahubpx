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

class Rep{
	// member variables/ properties
	public $username;
	public $password;
	public $rep_fname;
	public $rep_phone;
	public $email;
	public $employer;
	public $role;

	
	
	public $objdb; //obect handler of DbConfig
	
	// member functions
	public function __construct(){
		//create connection
		$this->objdb = new DbConfig;
	}
	
	public function newRep($username, $password, $rep_fname, $rep_phonephone, $email, $employer, $role){
		
		
		$this->username = $username;
		$this->password = $password;
		$this->rep_fname = $rep_fname;
		$this->rep_phone = $rep_phone;
		$this->email = $email;
		$this->employer = $employer;
		
		// encrypt the raw password
		$mypassword = md5($password);
		
		//insert into user table
		$sql = "INSERT INTO rep (username, password, rep_fname, rep_phone, email, employer) VALUES('$username', '$mypassword', '$rep_fname', '$rep_phone', '$email', '$employer')";
		
		// check if the query method runs the insert statement
		if($this->objdb->dbcon->query($sql)===true){
			
			echo " You have successfully registered  <a href='index.php'>Back to Sign in Page</a>";
		}else{
			
			echo "Error ".$this->objdb->dbcon->error;
		}
	}
	
		//function to display all
	public function getRep(){
		//write queryto select roles from database
		$sql = "SELECT * FROM rep "; //role.rolename FROM users left join role on role.roleid = users.roleid";
		$result = $this->objdb->dbcon->query($sql);
		
		//check if the query() runs the select statement
		if($result = $this->objdb->dbcon->query($sql)){
			// do this
			
			$row = $result->fetch_all(MYSQLI_ASSOC);
			// if not so do this
		}else{
			echo "Error ".$this->objdb->dbcon->error;
		}
		return $row;
	}
	
		//function to display all roles
	public function editRep($rep_id){
		//write queryto select a specific user
		$sql = "SELECT * FROM rep WHERE rep_id = '$rep_id' LIMIT 1";
		$result = $this->objdb->dbcon->query($sql);
		
		//check if the query() runs the select statement
		
		if($result = $this->objdb->dbcon->query($sql)){
			// do this
			
			$row = $result->fetch_assoc();
			// if not so do this
		}else{
			echo "Error ".$this->objdb->dbcon->error;
		}
		return $row;
	}


	public function updateRep($username, $rep_fname, $rep_phone, $email, $employer, $rep_id){
		
		
		$this->username = $username;
		$this->rep_fname = $rep_fname;
		$this->rep_phone = $rep_phone;
		$this->email = $email;
		$this->employer = $employer;
		$this->rep_id = $rep_id;
		
		//insert int user table
		$sql = "UPDATE rep set username='$username', rep_fname='$rep_fname', rep_phone='$rep_phone', email='$email', employer='$employer' WHERE rep_id='$rep_id'";
		
		// check if the query() runs the update statement
		if($this->objdb->dbcon->query($sql)===true){
			
			// echo You've successfully registered <a href="register.php"
			
			// redirect to view users page
			
			header('Location: http://localhost/pharmahub/msrdashboard.php');


		}else{
			
			echo "Error ".$this->objdb->dbcon->error;
		}
	}
	
	// search user method
	public function searchRep($search){
		
		// write query to search based on the parameter
		$query = "SELECT rep_fname, rep_phone, employer FROM rep WHERE rep_fname like '%$search%' OR employer like '%$search%'";
		
		//run the sql query
		$result = $this->objdb->dbcon->query($query);
		
		if($this->objdb->dbcon->affected_rows > 0){
			
			$row =  $result->fetch_all(MYSQLI_ASSOC);
			
			// json string
			$jsonrow = json_encode($row);
			/*$jsondata = "{
				'msgcode' : 1,
				'msgdata' : $jsonrow
			}";*/
			
		}elseif($this->objdb->dbcon->affected_rows == 0){
			/*$jsondata = "{
				'msgcode' : 2,
				'msgdata' : 'Not Found'
			}";
			$row = "Not Found";
			*/$jsonrow = "{'msgdata' : 'Not found'}";
		}else{
			
			echo "Error ".$this->objdb->dbcon->error;
		}
		return $jsonrow;
	}
	
	
	// delete rep method
	public function deleteRep($rep_id){
		
		
		$query = "DELETE from rep WHERE rep_id = '$rep_id'";
		
		//write a query to delete specific rep based rep_id
		if($result = $this->objdb->dbcon->query($query)){
			// do this
			
			$result = "Sales Rep successfully deleted";
		
			// if not so do this
		}else{
			echo "Error ".$this->objdb->dbcon->error;
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
	
	
	public function loginMSR($username, $password, $role){
	
		$password = md5($password);
		
		$query = "SELECT * FROM rep WHERE username = '$username' AND password = '$password'  LIMIT 1";
		
		$result = $this->objdb->dbcon->query($query);
		
			if($this->objdb->dbcon->affected_rows == 1 && $role == 'MSR'){
				// redirect the user to dashboard
				$row = $result->fetch_array();
				
				// create session variables
				$_SESSION['username'] = $row['username'];
				$_SESSION['rep_fname'] = $row['rep_fname'];
				$_SESSION['rep_phone'] = $row['rep_phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['employer'] = $row['employer'];
				$_SESSION['rep_id'] = $row['rep_id'];			
				
				//rediredct to your first or landing page
			header("Location: http://localhost/pharmahub/msrdashboard.php");
				
			}else{
				// display invalid login credentials
				$result = "<span class='alert alert-danger error'> Invalid Email Address or Password</span>";
			}
			return $result;
		}
	
	
	// to upload profile image
	
	public function uploadProfileImage(){
		// check if $_FILE has a value
		if($_FILES['profilephoto']['error'] == 0){
			
			// start file upload
			// specify the destination folder to upload files into
			$folder = "profilephoto/";
			$filesize = $_FILES['profilephoto']['size'];
			$filename = $_FILES['profilephoto']['name'];
			$filetype = $_FILES['profilephoto']['type'];
			$filetmpname = $_FILES['profilephoto']['tmp_name'];
			
			// get the file extension
			$file_ext = explode('.', $filename);
			$file_ext = end($file_ext);
			$file_ext = strtolower($file_ext);
			
						// specify extensions allowed
			$extensions = array('png', 'gif', 'jpg', 'jpeg', 'bmp');
			
			// check if file extension is valid
			if(in_array($file_ext, $extensions) ===false ){
				
				$error[] = "Extension Not Allowed!";
				
			}
			
			if($filesize > 2097152){
				$error[] = "File size must be exactly or less than 2mb";
			}
			
			$filename = time();
			
			$destination = $folder.$filename. ".$file_ext";
			
			// now check if there is no error then upload the file
			if(empty($error)==true){
				// then upload to destination folder
				move_uploaded_file($filetmpname, $destination);
				
				// update photo column in users table bases on userid
				$rep_id = $_SESSION['rep_id'];
				$query = "UPDATE rep SET photo = '$destination' WHERE rep_id='$rep_id'";
				
				// run the sqn query
				$result = $this->objdb->dbcon->query($query);
				if($this->objdb->dbcon->affected_rows > 0){
					
					$_SESSION['photo'] = $destination;
					
					$result = "<div class='alert alert-success'>Profile Photo Successfully Uploaded</div>";
					
				}else{
					
					$result = "<div class='alert alert-warning'> No Profile Photo Uploaded</div>".$this->objdb->dbcon->error;
				}
				
			}else{
				var_dump($error);
			}
		}else{
			$result = "<div class='alert alert-danger'>Please upload an Image</div>";
		}
		return $result;
	}	
	
	
	
}
//-----------------------------------------------------------------------------------------
//--------------------------------------- REP ENDS ----------------------------------------
//-----------------------------------------------------------------------------------------


class Pharm{
	// member variables/ properties
	public $username;
	public $password;
	public $pharm_name;
	public $pharm_phone;
	public $email;
	public $pharm_address;
	public $role;

	
	
	public $objdb; //obect handler of DbConfig
	
	// member functions
	public function __construct(){
		//create connection
		$this->objdb = new DbConfig;
	}
	
	public function newPharm($username, $password, $pharm_name, $pharm_phone, $email, $pharm_address, $role){
		
		
		$this->username = $username;
		$this->password = $password;
		$this->rep_fname = $pharm_name;
		$this->rep_phone = $pharm_phone;
		$this->email = $email;
		$this->employer = $pharm_address;
		
		// encrypt the raw password
		$mypassword = md5($password);
		
		//insert into user table
		$sql = "INSERT INTO pharmacy (username, password, pharm_name, pharm_phone, email, pharm_address) VALUES('$username', '$mypassword', '$pharm_name', '$pharm_phone', '$email', '$pharm_address')";
		
		// check if the query method runs the insert statement
		if($this->objdb->dbcon->query($sql)===true){
			
			echo " You have successfully registered  <a href='pharmindex.php'>Back to Sign in Page</a>";
		}else{
			
			echo "Error ".$this->objdb->dbcon->error;
		}
	}
	
		//function to display all
	public function getPharm(){
		//write queryto select roles from database
		$sql = "SELECT * FROM pharmacy "; //role.rolename FROM users left join role on role.roleid = users.roleid";
		$result = $this->objdb->dbcon->query($sql);
		
		//check if the query() runs the select statement
		if($result = $this->objdb->dbcon->query($sql)){
			// do this
			
			$row = $result->fetch_all(MYSQLI_ASSOC);
			// if not so do this
		}else{
			echo "Error ".$this->objdb->dbcon->error;
		}
		return $row;
	}
	
		//function to display all roles
	public function editPharm($pharm_id){
		//write queryto select a specific user
		$sql = "SELECT * FROM pharmacy WHERE pharm_id = '$pharm_id' LIMIT 1";
		$result = $this->objdb->dbcon->query($sql);
		
		//check if the query() runs the select statement
		
		if($result = $this->objdb->dbcon->query($sql)){
			// do this
			
			$row = $result->fetch_assoc();
			// if not so do this
		}else{
			echo "Error ".$this->objdb->dbcon->error;
		}
		return $row;
	}


	public function updatePharm($username, $pharm_name, $pharm_phone, $email, $pharm_address, $pharm_id){
		
		
		$this->username = $username;
		$this->rep_fname = $pharm_name;
		$this->rep_phone = $pharm_phone;
		$this->email = $email;
		$this->employer = $pharm_address;
		$this->rep_id = $pharm_id;
		
		//insert int user table
		$sql = "UPDATE pharmacy set username='$username', pharm_name='$pharm_name', pharm_phone='$pharm_phone', email='$email', pharm_address='$pharm_address' WHERE pharm_id='$pharm_id'";
		
		// check if the query() runs the update statement
		if($this->objdb->dbcon->query($sql)===true){
			
			// echo You've successfully registered <a href="register.php"
			
			// redirect to view users page
			
			header('Location: http://localhost/pharmahub/pharmdashboard.php');


		}else{
			
			echo "Error ".$this->objdb->dbcon->error;
		}
	}
	
	// search user method
	public function searchPharm($search){
		
		// write query to search based on the parameter
		$query = "SELECT pharm_name, FROM pharmacy WHERE pharm_name like '%$search%'";
		
		//run the sql query
		$result = $this->objdb->dbcon->query($query);
		
		if($this->objdb->dbcon->affected_rows > 0){
			
			$row =  $result->fetch_all(MYSQLI_ASSOC);
			
			// json string
			$jsonrow = json_encode($row);
			/*$jsondata = "{
				'msgcode' : 1,
				'msgdata' : $jsonrow
			}";*/
			
		}elseif($this->objdb->dbcon->affected_rows == 0){
			/*$jsondata = "{
				'msgcode' : 2,
				'msgdata' : 'Not Found'
			}";
			$row = "Not Found";
			*/$jsonrow = "{'msgdata' : 'Not found'}";
		}else{
			
			echo "Error ".$this->objdb->dbcon->error;
		}
		return $jsonrow;
	}
	
	
	// delete rep method
	public function deletePharm($pharm_id){
		
		
		$query = "DELETE from pharm WHERE pharm_id = '$pharm_id'";
		
		//write a query to delete specific rep based rep_id
		if($result = $this->objdb->dbcon->query($query)){
			// do this
			
			$result = "Pharmacy successfully deleted";
		
			// if not so do this
		}else{
			echo "Error ".$this->objdb->dbcon->error;
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
	
	
	public function loginPharm($username, $password, $role){
	
		$password = md5($password);
		
		$query = "SELECT * FROM pharmacy WHERE username = '$username' AND password = '$password'  LIMIT 1";
		
		$result = $this->objdb->dbcon->query($query);
		
			if($this->objdb->dbcon->affected_rows == 1 && $role == 'Pharmacy'){
				// redirect the user to dashboard
				$row = $result->fetch_array();
				
				// create session variables
				$_SESSION['username'] = $row['username'];
				$_SESSION['pharm_name'] = $row['pharm_name'];
				$_SESSION['pharm_phone'] = $row['pharm_phone'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['pharm_address'] = $row['pharm_address'];
				$_SESSION['pharm_id'] = $row['pharm_id'];			
				
				//rediredct to your first or landing page
			header("Location: http://localhost/pharmahub/pharmdashboard.php");
				
			}else{
				// display invalid login credentials
				$result = "<span class='alert alert-danger error'> Invalid Email Address or Password</span>";
			}
			return $result;
		}
	
	
	// to upload profile image
	
	public function uploadProfileImage(){
		// check if $_FILE has a value
		if($_FILES['profilephoto']['error'] == 0){
			
			// start file upload
			// specify the destination folder to upload files into
			$folder = "profilephoto/";
			$filesize = $_FILES['profilephoto']['size'];
			$filename = $_FILES['profilephoto']['name'];
			$filetype = $_FILES['profilephoto']['type'];
			$filetmpname = $_FILES['profilephoto']['tmp_name'];
			
			// get the file extension
			$file_ext = explode('.', $filename);
			$file_ext = end($file_ext);
			$file_ext = strtolower($file_ext);
			
						// specify extensions allowed
			$extensions = array('png', 'gif', 'jpg', 'jpeg', 'bmp');
			
			// check if file extension is valid
			if(in_array($file_ext, $extensions) ===false ){
				
				$error[] = "Extension Not Allowed!";
				
			}
			
			if($filesize > 2097152){
				$error[] = "File size must be exactly or less than 2mb";
			}
			
			$filename = time();
			
			$destination = $folder.$filename. ".$file_ext";
			
			// now check if there is no error then upload the file
			if(empty($error)==true){
				// then upload to destination folder
				move_uploaded_file($filetmpname, $destination);
				
				// update photo column in users table bases on userid
				$rep_id = $_SESSION['pharm_id'];
				$query = "UPDATE pharm SET photo = '$destination' WHERE pharm_id='$pharm_id'";
				
				// run the sqn query
				$result = $this->objdb->dbcon->query($query);
				if($this->objdb->dbcon->affected_rows > 0){
					
					$_SESSION['photo'] = $destination;
					
					$result = "<div class='alert alert-success'>Profile Photo Successfully Uploaded</div>";
					
				}else{
					
					$result = "<div class='alert alert-warning'> No Profile Photo Uploaded</div>".$this->objdb->dbcon->error;
				}
				
			}else{
				var_dump($error);
			}
		}else{
			$result = "<div class='alert alert-danger'>Please upload an Image</div>";
		}
		return $result;
	}	
	
	
	
}
//-----------------------------------------------------------------------------------------
//------------------------------------- PHARM ENDS ----------------------------------------
//-----------------------------------------------------------------------------------------


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