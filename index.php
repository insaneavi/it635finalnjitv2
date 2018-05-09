<?php
session_start();
$output = NULL;

//Check Form
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	if(empty($username) || empty($password)){
		$output = "You Cannot Leave any of these Fields Empty.";
	}else{
		//Connect to the database
		$mysqli = NEW mysqli('localhost', 'enduser', 'password123', 'IT635');
		
		$username = $mysqli->real_escape_string($username);
		$password = $mysqli->real_escape_string($password);
		
		$query = $mysqli->query("SELECT user_type FROM movieuser WHERE user_username = '$username' AND user_password = '$password'");
		$row = mysqli_fetch_array($query); //returns the usertype as a error 0 for end user, 1 for admin
		$usertype = $row['user_type']; //returns the 0 or 1 value
		
		if($query->num_rows == 0) {
			$output = "Invalid username or password";
	}else{
			//user logged in successfully.
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['user'] = $username;
			
			$output = "WELCOME ". $_SESSION['user'] . " - <a href='http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/logout.php'>Logout</a>";
			
						switch ($usertype){
				case "0":
					echo "YOU ARE A END USER, Go Here ---> " . " - <a href='http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/u/uindex.html'>End User Portal</a><br><br>";
					break;
				case "1":
					echo "YOU ARE A ADMIN, Go Here ---> " . " - <a href='http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/a/aindex.html'>ADMIN Portal</a><br><br>";
					break;
				default:
					echo "YOU ARE A NO ONE, Go AWAY!";				
							 }
			
			}
		
	 }
}	

if(!isset($_SESSION['loggedin'])){
	//Display Welcome Guest /Display Login Form

	echo "Welcome Guest, Please log in.<p />";
	
	?>
	<form method="POST">
	<title>MOVIE TRACKER DB PROJECT</title>
	<h1>MOVIE TRACK DB PROJECT  </h1>
	<h2>AVINASH SHAH 2018 Spring - IT 635102 </h2>
		<p />
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
echo nl2br($output);

?>