<?php
// include the HTML for the page header
include "templates/header.html";
// include the HTML for the navigation bar
include "templates/navigation.html";
// open a new MySQL database connection
require "includes/db_connect.php";
// require the helper functions script
require "includes/functions.php";
// check if 'page' parameter is set in query string
if (isset($_GET['page'])) {
	$page = $_GET['page']; // if so, set page variable to value of 'page' parameter
} else {
	$page = 'home'; // if not, set page variable to home
}
// define a variable to store content HTML
$content = "";
// determine which view to serve based on value of $page
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
// output the HTML
echo $content;
//
include "templates/footer.html";
?>