<?php
$proFound = isset($products); // if the products have been selected do the following
if ( $proFound === false ) { // if no products have been found within the query then
    echo 'no products found, try again!' ; // echo error message , telling user no products have been found.
}

$productList = "<div id='table'><table>"; // using table element as start of table
while ($product = $getProducts->fetchObject()){ // grabbing/fetching results all of products stored in database.
	echo "<tr>"; // echoing table row start.
    $link = "<td>user.php?page=product_info&amp;id=$product->pro_id</td>"; // storing a link withinside the table row allowing user to view individually product. 
    $productList .= "<td><a href='$link'>$product->pro_title</a></td>"; // adding link 
	echo "</tr>"; // echoing table row end tag.
}
$productList .= "</table></div>"; // echoing end of table
echo $productList; // ecoing the table of results above.
?>