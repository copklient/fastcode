<?php
/* 
* Site created successfully 
* 
* Site Name : CMS
* 
* Site created by : admin
*/

define("HOST","localhost");
define("USERNAME","megacraft");
define("PASSWORD","megacraft"); 
define("DATABASE","megacraft");

/* TODO or comment from MySQL */
/*
*	
*/

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT `sitename` FROM `settings`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$sitename = $row["sitename"];
    }
} else {
    define("SITENAME","CMS");
}

define("SITENAME","CMS");
