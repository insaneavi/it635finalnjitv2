<form method="POST">
<title>END USERS - SEARCH MOVIE DB BY MOVIE Title</title>
<h1>END USER  - SEARCH MOVIE DB BY MOVIE Title </h1>
<h2>AVINASH SHAH 2018 Spring - IT 635102 </h2>
<input type="TEXT" name="search" />
<input type="SUBMIT" name="submit" Value="Search For All Movie Info by Title" />
</form>


<?php
$output = NULL;

if(isset($_POST['submit']))
{

$mysqli = NEW mysqli("localhost", "enduser", "password123", "IT635");

$search = $mysqli->real_escape_string($_POST['search']);

// WILL TAKE THE MOVIE ID AND OUTPUT ALL THE MOVIE ROWS MATCHING MOVIE_ID
$resultSet = $mysqli->query(
"SELECT movie.movie_ID, 
moviegenre.movie_id, 
movie.movie_title, 
movieyear.movie_year, 
moviedirector.movie_director, 
moviestudio.movie_studio, 
movieimdb.movie_imdb, 
moviegenre.movie_genre, 
moviefileinfo.movie_source, 
moviefileinfo.movie_filename, 
moviefileinfo.movie_gb
FROM   moviegenre
INNER JOIN movie
ON moviegenre.movie_id=movie.movie_id
INNER JOIN moviedirector
ON moviedirector.movie_ID=movie.movie_id
INNER JOIN movieyear
ON movieyear.movie_ID=movie.movie_id
INNER JOIN moviestudio
ON moviestudio.movie_ID=movie.movie_id
INNER JOIN movieimdb
ON movieimdb.movie_ID=movie.movie_id
INNER JOIN moviefileinfo
ON moviefileinfo.movie_ID=movie.movie_id
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
        echo "<th>Year</th>";
        echo "<th>Director</th>";
		echo "<th>Studio</th>";
		echo "<th>imdb_link</th>";
		echo "<th>Genre</th>";
		echo "<th>Source</th>";
		echo "<th>filename</th>";
		echo "<th>filesizeGB</th>";
		echo "</tr>";
		
		while($row = mysqli_fetch_array($resultSet))
			
		{		echo "<tr>";
                echo "<td>" . $row['movie_id'] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
                echo "<td>" . $row['movie_year'] . "</td>";
                echo "<td>" . $row['movie_director'] . "</td>";
			    echo "<td>" . $row['movie_studio'] . "</td>";
				echo "<td>" . $row['movie_imdb'] . "</td>";
			    echo "<td>" . $row['movie_genre'] . "</td>";
			    echo "<td>" . $row['movie_source'] . "</td>";
				echo "<td>" . $row['movie_filename'] . "</td>";
				echo "<td>" . $row['movie_gb'] . "</td>";
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
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/u/addmoviereview.php">Add User User Review of Movie with Movie ID !REMEMEBER THE ID #! </a>
HTML;
echo "<br>";
echo "<br>";
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/u/searchmoviesbygenre.php"> Search Similar Movies by Movie Studio </a>
HTML;
echo "<br>";
echo "<br>";
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/u/searchmoviesbystudio.php"> Search Similar Movies by Genre </a>
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

?>