<?php 
if(!file_exists('config/db.php')){
  if(isset($_POST['install'])){
      $host = $_POST['host'];
      $sqlusername = $_POST['sqlusername'];
      $sqlpassword = $_POST['sqlpassword'];
      $database = $_POST['database'];

      $config1 = fopen("config/db.php", "w");
      $txt1 = 
'<?php
/*
* DATABASE INFORMATION
*
* DON\' EDIT THIS FILE!!!
*/

define("HOST","'.$host.'");
define("USERNAME","'.$sqlusername.'");
define("PASSWORD","'.$sqlpassword.'"); 
define("DATABASE","'.$database.'");

/* TODO EDIT THIS TEXT */
';
    fwrite($config1, $txt1);
    fclose($config1);
    header('location: /');
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Install FastCode</title>
  <style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #4CAF50;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 50px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="password"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}</style>
</head>
<body>
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>FastCode install</h3>
    <h4>* Required</h4>
    <h2>MySQL Settings</h2>
    <fieldset>
      <input placeholder="Host*" type="text" name="host" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Username*" type="text" name="sqlusername" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Password*" type="password" name="sqlpassword" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Database*" type="text" name="database" tabindex="4" required>
    </fieldset>
    
    <fieldset>
      <button name="install" type="submit" id="contact-submit">Install FastCode</button>
    </fieldset>
    <p class="copyright">Designed by <a href="https://FastCode.tk" target="_blank" title="FastCode">FastCode</a></p>
  </form>
</div>

</body>
</html>
<?php }?>
<?php
if(!file_exists('config.php')){
	if(isset($_POST['install'])){
		$host = $_POST['host'];
		$sqlusername = $_POST['sqlusername'];
		$sqlpassword = $_POST['sqlpassword'];
		$database = $_POST['database'];
		$sqlcomment = $_POST['sqlcomment'];
		$sitename = $_POST['sitename'];
		$adminusername = $_POST['adminusername'];
		$adminemail = $_POST['adminemail'];
		$adminpassword = $_POST['adminpassword'];

		$config = fopen("config.php", "w");
		    $txt = 
'<?php
/* 
* Site created successfully 
* 
* Site Name : '.$sitename.'
* 
* Site created by : '.$adminusername.'
*/

define("HOST","'.$host.'");
define("USERNAME","'.$sqlusername.'");
define("PASSWORD","'.$sqlpassword.'"); 
define("DATABASE","'.$database.'");

/* TODO or comment from MySQL */
/*
*	'.$sqlcomment.'
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
    define("SITENAME","'.$sitename.'");
}

define("SITENAME","'.$sitename.'");
';
		fwrite($config, $txt);
		fclose($config);

		$conn = mysqli_connect($host, $sqlusername, $sqlpassword, $database);

		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$settingsTable = "
		CREATE TABLE IF NOT EXISTS settings 
		(
		    Id INT NOT NULL AUTO_INCREMENT, 
		    PRIMARY KEY(Id),
		    Sitename VARCHAR(64), 
		    rootId INT(1), 
		    Time VARCHAR(32) 
		)";

		$time = date("Ymd");
		if (mysqli_query($conn, $settingsTable)){
		    $sql = "INSERT INTO `settings` (`sitename`, `rootId`, `Time`)
			VALUES ('$sitename', '1', '".$time."')";
			if (mysqli_query($conn, $sql)){
			}else{
				die('Site settings table not added!');
			}

		}

		$usersTable = "
		CREATE TABLE IF NOT EXISTS users 
		(
		    Id INT NOT NULL AUTO_INCREMENT, 
		    PRIMARY KEY(Id),
		    firstname VARCHAR(64), 
		    lastname VARCHAR(64), 
		    username VARCHAR(128), 
		    email VARCHAR(128), 
		    password VARCHAR(128), 
		    passwordMD5 VARCHAR(128), 
		    role VARCHAR(64),
		    `group` VARCHAR(64),
		    ip VARCHAR(128),
		    Time VARCHAR(32) 
		)";
		$ip = $_SERVER['REMOTE_ADDR'];
		if (mysqli_query($conn, $usersTable)){
		    $sql = "INSERT INTO `users` (`firstname`, `lastname`, `username`, `email`, `password`, `passwordMD5`, `role`, `group`, `ip`, `Time`)
			VALUES ('Root', '', 'root', 'root@root.root', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'root', '', '".$ip."', '".$time."')";
			if (mysqli_query($conn, $sql)){
			}else{
				die('Site ussers table not added!');
			}

		}

		$sql = "INSERT INTO `users` (`username`, `email`, `password`, `passwordMD5`, `role`,`ip`, `Time`)
			VALUES ('".$adminusername."', '".$adminemail."', '".$adminpassword."', '".md5($adminpassword)."', 'Admin','".$ip."', '".$time."')";
			if (mysqli_query($conn, $sql)){
			}else{
				die('Admin not added!');
			}

		// header('location:/');
	}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Install FastCode</title>
	<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #4CAF50;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 50px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="password"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="password"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}</style>
</head>
<body>
<div class="container">  
  <form id="contact" action="" method="post">
    <h3>FastCode install</h3>
    <h4>* Required</h4>
    <h2>MySQL Settings</h2>
    <fieldset>
      <input placeholder="Host*" type="text" name="host" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Username*" type="text" name="sqlusername" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Password*" type="password" name="sqlpassword" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Database*" type="text" name="database" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your comment or TODO from MySQL" name="sqlcomment" tabindex="5"></textarea>
    </fieldset>
    <h2>Site Settings</h2>
    <fieldset>
      <input placeholder="Site Name*" type="text" name="sitename" tabindex="6" required>
  	</fieldset>
  	<fieldset>
      <input placeholder="Admin Username*" type="text" name="adminusername" tabindex="7" required>
    </fieldset>
    <fieldset>
		<input placeholder="Admin Email*" type="email" name="adminemail" tabindex="8" required>
    </fieldset>
    <fieldset>	
      <input placeholder="Admin Password*" type="password" name="adminpassword" tabindex="9" required>
    </fieldset>
    <fieldset>
      <button name="install" type="submit" id="contact-submit">Install FastCode</button>
    </fieldset>
    <p class="copyright">Designed by <a href="https://FastCode.tk" target="_blank" title="FastCode">FastCode</a></p>
  </form>
</div>

</body>
</html>






<?php 
	die();
}
 ?>