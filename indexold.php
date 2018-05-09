<?php
session_start();
$output = NULL;

//Check Form
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) || empty($password)){
		$output = "You Cannot Leave any of these Fields Empty.";
	}else{
		//Connect to the database
		$mysqli = NEW mysqli('localhost', 'enduser', 'password123', 'IT635');
		
		$username = $mysqli->real_escape_string($username);
		$password = $mysqli->real_escape_string($password);
		
		$query = $mysqli->query("SELECT user_type FROM movieuser WHERE user_username = '$username' AND user_password = '$password'");
		
		if($query->num_rows == 0) {
			$output = "Invalid username or password";
	}else{
			//user logged in successfully.
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['user'] = $username;
			
			$output = "WELCOME ". $_SESSION['user'] . " - <a href='logout.php'>Logout</a>";
		}
		
	 }
}	

if(!isset($_SESSION['loggedin'])){
	//Display Welcome Guest /Display Login Form
	echo "Welcome Guest, Please log in.<p />";
	
	?>
	<form method="POST">
		Username: <input type="TEXT" name="username" />
		<p />
		Password: <input type="Password" name = "password" />
		<br/>
		<input type="SUBMIT" name="submit" value = "Log In" />
	</form>
	<?php
}else{
	//Display Welcome *USER* /Display Logout
}
echo $output;
?>