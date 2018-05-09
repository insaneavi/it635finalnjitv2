<?php
session_start();
session_destroy();

echo "You have been logged out.<br>";
//echo '<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/index.php">Click here to Return to the Login Site </a>';
echo <<<HTML
<a href="http://ec2-18-218-36-211.us-east-2.compute.amazonaws.com/index.php">Click here to Return to the Login Site</a>
HTML;
?>