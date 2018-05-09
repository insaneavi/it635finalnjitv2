<?php
	
	//create connection for mysqli
	$conn = NEW mysqli("localhost", "root", "Welcome1", "IT635");
	
	//checking connection
	
	if($conn->connect_error)
	{
		die("connection failed:" . $conn->connect_error);
	}
		$movie_title = mysqli_real_escape_string($conn, $_POST['inc_movie_title']);

		$movie_director = mysqli_real_escape_string($conn, $_POST['inc_movie_director']);
		$movie_studio = mysqli_real_escape_string($conn, $_POST['inc_movie_studio']);
		$movie_imdb = mysqli_real_escape_string($conn, $_POST['inc_movie_imdb']);
		$movie_source = mysqli_real_escape_string($conn, $_POST['inc_movie_source']);
		$movie_filename = mysqli_real_escape_string($conn, $_POST['inc_movie_filename']);
		$movie_year = (int)$_POST['inc_movie_year'];
		$movie_gb = (float)$_POST['inc_movie_gb'];
		$movie_genre = mysqli_real_escape_string($conn, $_POST['inc_movie_genre']);
		$movie_id = 'NULL';
		
//		$movie_year = $_POST['inc_movie_year'];
//		$movie_gb = $_POST['inc_movie_gb'];		
		
				//echo $movie_title;
				//echo $movie_year;
				//echo $movie_director;
				//echo $movie_studio;
				//echo $movie_imdb;
				//echo $movie_source;
				//echo $movie_filename;
				//echo $movie_gb;
				//echo $movie_genre;

//this is where the query that will take the values from input from the ADMIN and pass into the new_movie MYSQL procedure


	$sql = "CALL new_movie($movie_id, '$movie_title', $movie_year, '$movie_director', '$movie_studio', '$movie_imdb', '$movie_source', '$movie_filename', $movie_gb, '$movie_genre')";
	//$sql1 = "CALL new_movie($movie_id, 'Spider-Man', '2002', 'Sam Raimi', 'Columbia Pictures', 'http://www.imdb.com/title/tt0145487', 'BluRay', 'Spiderman.2002.1080p.Bluray.x264-hV.mkv', '10.1', 'Action, Adventure, Sci-fi')";
	if(mysqli_query($conn, $sql))
	{
		echo "MOVIE WAS SUCCESSFULLY ADDED";
		echo "<br>";
		echo "<br>";
		echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/a/aindex.html">Click here to Return to Admin FUNCTIONS</a>
HTML;
	echo "<br>";
	echo "<br>";
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/logout.php">Click here to Log Out</a>
HTML;
	echo "<br>";
	echo "<br>";
		
	} 
	else
	{
	echo "ERROR: Couldn't execute $sql. " . mysqli_error($conn);
	}
	
?>