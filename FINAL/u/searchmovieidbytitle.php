<form method="POST">
<title>END USERS - SEARCH MOVIE ID # BY MOVIE Title</title>
<h1>END USER  - SEARCH MOVIE ID # BY MOVIE Title </h1>
<h2>AVINASH SHAH 2018 Spring - IT 635102 </h2>
<input type="TEXT" name="search" />
<input type="SUBMIT" name="submit" Value="Search For Movie ID By Title" />
</form>


<?php
$output = NULL;

if(isset($_POST['submit']))
{

$mysqli = NEW mysqli("localhost", "enduser", "password123", "IT635");

$search = $mysqli->real_escape_string($_POST['search']);

//query the database for movietitles that match search result, and return movie title and movie idate
$resultSet = $mysqli->query("select * FROM movie WHERE movie_title LIKE '%$search%'");

if(empty($_POST['search'])) //will make sure you cannot search empty space
 {
	 echo "no values to search";
 }

else{
 
if($resultSet->num_rows > 0)
	{

			
		echo "<table>";
        echo "<tr>";
        echo "<th>Movie ID #</th>";
        echo "<th>Movie Title</th>";
		echo "</tr>";
		
			while($row = mysqli_fetch_array($resultSet))
		{
			    echo "<tr>";
                echo "<td>" . $row['movie_id'] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
				echo "</tr>";
		}
	}
	else
	{
		$output = "No Results for : " . $search;
	}
	}
}
?>


<?php

echo $output;
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
?>