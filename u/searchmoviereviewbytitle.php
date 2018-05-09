<form method="POST">
<title>END USERS - SEARCH MOVIE reviews BY MOVIE Title</title>
<h1>END USER  - SEARCH MOVIE reviews BY MOVIE Title </h1>
<h2>AVINASH SHAH 2018 Spring - IT 635102 </h2>
<input type="TEXT" name="search" />
<input type="SUBMIT" name="submit" Value="Search For Movie Reviews by Movie Title" />
</form>


<?php
$output = NULL;

if(isset($_POST['submit']))
{

$mysqli = NEW mysqli("localhost", "enduser", "password123", "IT635");

$search = $mysqli->real_escape_string($_POST['search']);

//OLD query the database for movietitles that match search result, and return movie title and movie idate
// OLD $resultSet = $mysqli->query("select * FROM movie WHERE movie_title LIKE '%$search%'");

// WILL TAKE THE MOVIE ID AND OUTPUT ALL THE MOVIE ROWS MATCHING MOVIE_ID
$resultSet = $mysqli->query(
"SELECT movie.movie_id, movie.movie_title, moviereview.movie_review
FROM movie
INNER JOIN moviereview
ON movie.movie_id=moviereview.movie_id
WHERE movie.movie_title LIKE '%$search%'");

if(empty($_POST['search'])) //will make sure you cannot search empty space
 {
	 echo "no values to search";
 }

else{
 
if($resultSet->num_rows > 0)
	{

			
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Title</th>";
        echo "<th>Reviews</th>";
        echo "</tr>";
		
	while($row = mysqli_fetch_array($resultSet))
		{		
				echo "<tr>";
                echo "<td>" . $row['movie_id'] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
        		echo "<td>" . $row['movie_review'] . "</td>";
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