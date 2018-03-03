<?php
require('includes/db_connect.php');

// get the value of the page parameter from the URL
// if no parameter detected do the following else statement.
if (!isset($_GET['page'])) {
    $page_id = 'home'; // display the homepage
} else {
    $page_id = $_GET['page']; // else get the requested page.
}

switch ($page_id) {
case 'home' :
    include 'views/home.php';
    break;
case 'customers' :
    include 'views/customers.php';
    break;
case 'products' :
    include 'views/products.php';
    break;
default :
    include 'views/404.php';
}

// creating a variable for the html content.
$content = "<h1>Customers:</h1>";

// fetch a result set from database.
$sql = "SELECT customer_id, customer_name, customer_email FROM customers";
$result = mysqli_query($link, $sql);

// check to see if the query returned a result
if ($result === false) {
    echo mysqli_error($link);
} else {
    $content .= "<table border='2'><tbody>";
    // fetch an associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $content .= "<tr>";
        $content .= "<td>".$row['customer_id']."</td>";
        $content .= "<td>".$row['customer_name']."</td>";
        $content .= "<td>".$row['customer_email']."</td>";
$content .= "</tr>";
    }
    $content .= "</tbody></table>";
    // free the result set
    mysqli_free_result($result);
}

// output the html content.
echo $content;

?>