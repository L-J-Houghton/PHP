<?php
include_once "db/db.php"; // including the database file , containing database credentials. 
try {// start try block
$db = new PDO($db_i,$db_u,$db_p);// creating PHP data object for the database name , database user and database password.
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );// used to represent an exception error raised by PDO.
} catch (PDOexception $con_error) {// catch PHP Data object connection error '$con_error'.
	echo "<h1>Connection failed!, please try again!</h1><p>$con_error</p>"; // echo/display error message if failure to connect to database.
}
$title = "Seller Account"; // setting title of page.
$css="style/goldbuy.css";// setting the css file , conataining the css3 code for the web app views.
include_once "template/headerbar.php";// headerbar template used to echo start tags of html page (see headerbar.php).
include_once "model/DB.class.php";// including / loading the DB.class used (see model/BB.class for more info).
include_once "model/User.class.php";// including / loading the User.class used (see model/User.class for more info).
$seller = new User(); // creating new user object
include_once "controller/user/signin.php"; // including the controller class signin.php to allow user to sign in.
if($seller->isOnline()) { // if the user is online (session has started etc.) do.
	include_once "template/user/user_nav.php"; // include and get the 
	$nav = isset($_GET['page']); // checking if the navigation 
	if ($nav) { // if a/the button has been clicked/pressed , set nav to true and do the following.
		$command = $_GET['page']; //load corresponding controller to the option selected.
	} else {// else do
		$command = "products"; //load default controller if not set / pressed.
	}
	include_once "controller/user/$command.php"; //load the controller correlating to the option selected by user.
	include_once "view/user/signout.php";// include / load the signout view to allow user to signout.
}
include_once "template/footerbar.php";// footer template used as the ending of the html body and html tags (see footerbar.php).
?>

<!-- Reference (guides):

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online guide: http://php.net/manual/en/class.pdoexception.php
-->