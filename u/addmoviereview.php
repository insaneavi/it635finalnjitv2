<form method="POST">
<title>END USER - Add Movie Review by movie id #</title>
<h1>END USER  - Add Movie Review by movie id # </h1>
<h2>AVINASH SHAH 2018 Spring - IT 635102 </h2>
					   <br/>
					   <br/>
		Movie ID : <input type="number" name="inc_movie_id">
					   <br/>
		Movie Review/Comments ~ Allowed characters [0-9,a-z,A-Z$_]   : <input type="text" name="inc_movie_review">
					   <br/>
<input type="SUBMIT" name="submit" Value="Add Movie review" />
</form>

<?php

$output = NULL;

if(isset($_POST['submit']))
{

$con = NEW mysqli("localhost", "root", "Welcome1", "IT635");
$movie_id = (int)$_POST['inc_movie_id'];
$movie_review =  $_POST['inc_movie_review'];
$sql = "INSERT INTO moviereview VALUES($movie_id, '$movie_review')";

if(empty($_POST['submit'])) //will make sure you cannot enter empty space
 {
	 echo "You must put in a movie id #";
	 echo "<br>";
 }

 if(empty($_POST['inc_movie_review'])) //will make sure you cannot enter empty space
 {
	 echo "You cannot put in a blank movie review";
	 echo "<br>";
 }

		if(!mysqli_query($con,$sql))
		{
		$output = "ERROR ENTERING MOVIE Review/Comment INTO DB";
		}
		else 
		{
		$output = "MOVIE REVIEW WAS SUCCESSFULLY ADDED";
		}

}
?>


<?php
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/u/searchmoviebytitle2.php">Don't know the movie id #?, Click Here</a>
HTML;
echo "<br>";
echo "<br>";
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/u/uindex.html">Click here to Return to END USER FUNCTIONS</a>
HTML;
echo "<br>";
echo "<br>";
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/logout.php">Click here to Log Out</a>
HTML;
echo "<br>";
echo "<br>";

echo $output;
?>