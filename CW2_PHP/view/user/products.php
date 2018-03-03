<?php
$productList = "<div id ='table'><table>"; // start of table.
while ($product = $getProducts->fetchObject()){ // fetching products from products table.
	echo "<tr>"; // start of table row.
    $link = "<td>user.php?page=product_info&amp;id=$product->pro_id</td>"; // creating link to eah of the products fetched from database.
    $productList .= "<td><a href='$link'>$product->pro_title</a></td>"; // adding the link made above each title of the product/result.
	echo "</tr>"; // end of table row.
}
$productList .= "</table></div>"; // end of table.
echo $productList; // echo above content.
?>