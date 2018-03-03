<?php
// include the html code for the page header
include "templates/header.html";
// include the html code for the navigation bar
include "templates/navigation.html";
// openening a new MySQL database connection
require "includes/db_connect.php";
// require the helper functions script in includes directory.
require "includes/functions.php";
// checks if the 'page' parameter is set in the query string
if (isset($_GET['page'])) {
	$page = $_GET['page']; // if so, it sets the page variable to the value of the 'page' parameter.
} else {
	$page = 'home'; // if not, it sets the page variable to home.
}
// defining a variable to store content (html).
$content = "";
// determining which view to serve based on value of $page variable.
switch ($page) {
case 'home' :
	include 'views/home.php';
	break;
case 'make_order' :
	include 'views/make_order.php';
	break;
case 'products' :
	include 'views/products.php';
	break;
case 'sell_product' :
	include 'views/sell_product.php';
	break;
default :
	include 'views/404.php';
}
// close the connection to the database */
mysqli_close($link);
// output the HTML code.
echo $content;
//
include "templates/footer.html";
?>