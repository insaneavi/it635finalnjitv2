
	<?php
  /* // connect to mongodb
//$m = new MongoClient();
$m = new MongoClient("mongodb://127.0.0.1", array("username" => $username, "password" => $password));	
   echo "Connection to database successfully";
   // select a database
$db = $m->it635;
	
   echo "Database it635 selected";
  

   try {
    $conn = new MongoClient("mongodb://172.31.38.56:27018");
    var_dump($conn);
} catch (MongoConnectionException $e) {
    var_dump($e);
}
 */
 require 'vendor/autoload.php'; // include Composer's autoloader 
$mongo = new MongoDB\Client('mongodb://172.31.38.171:27017');
try 
{
    $dbs = $mongo->listDatabases();
}
catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e)
{
    // PHP cannot find a MongoDB server using the MongoDB connection string specified
    // do something here
}

?>