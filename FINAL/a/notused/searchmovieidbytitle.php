<form method="POST">
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
	while($row = mysqli_fetch_array($resultSet))
		{
			
		echo "<table>";
        echo "<tr>";
        echo "<th>Movie ID #</th>";
        echo "<th>Movie Title</th>";
		echo "</tr>";
		
		
			    echo "<tr>";
                echo "<td>" . $row['movie_id'] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
				echo "</tr>";
		}
	}
	else
	{
		$output = "No Results";
	}
	}
}
?>


<?php

echo $output;

?>