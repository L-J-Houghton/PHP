<?php
require('includes/db_connect.php');
include('templates/header');
include('templates/navigation.html');
// get the value of the each page parameter from the URL
// if no parameter detected do the following else statement.
if (!isset($_GET['page'])) {
    $page_id = 'home'; // display home page
} else {
    $page_id = $_GET['page']; // else get requested page
}

switch ($page_id) {
case 'home' :
    include 'views/home.php';
    break;
case 'record' :
    include 'views/customers.php';
    break;
case 'artist' :
    include 'views/products.php';
    break;
default :
    include 'views/404.php';
}
include('templates/footer');
?>