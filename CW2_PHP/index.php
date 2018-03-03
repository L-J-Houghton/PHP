<?php
include_once "db/db.php"; // including the database file , containing database credentials. 
try { // start try block.
$db = new PDO($db_i, $db_u, $db_p); // creating PHP data object for the database name , database user and database password.
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // used to represent an exception error raised by PDO.
} catch (PDOexception $con_error) { // catch PHP Data object connection error '$con_error'.
	echo "<h1>Connection failed!, please try again!</h1><p>$con_error</p>"; // echo/display error message if failure to connect to database.
}
$css3="style/goldbuy.css"; // setting the css file , conataining the css3 code for the web app views.
include_once "model/DB.class.php"; // including / loading the DB.class used (see model/DB.class for more info).
include_once "template/headerbar.php"; // headerbar template used to echo start tags of html page (see headerbar.php).
include_once "controller/products.php";// products controller used to display the table of products fecthed from database.
//include_once "controller/maps.php";// maps controller used to display the campus map.
include_once "template/footerbar.php";// footer template used as the ending of the html body and html tags (see footerbar.php).
?>


<!-- Reference (guides):

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online guide: http://php.net/manual/en/class.pdoexception.php
-->