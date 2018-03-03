<?php 
$sql = "SELECT * FROM products";
// set a query to search the database
$result = mysqli_query($link, $sql);
// update HTML content string with the current page title
$content .= "<h1>PRODUCTS</h1>";
// get the number of rows in a result-set
$row_cnt = mysqli_num_rows($result);
// check if there are rows to display else print out content.
if ($row_cnt == 0) {
	// if not, output a suitable message
	$content .= "<p>There are no products to show!</p>";
} else {
	// otherwise, update the HTML in $content variable.
	$content .= "<table cellpadding='5' border='2'>
					<thead align='left'>
						<tr>
							<th>Product</th>
							<th>Price</th>
							<th>Category</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>";
    // while there are rows, fetch each row as an associative array
    while ($row = mysqli_fetch_assoc($result)) {
		// append the content with more HTML containing row data from the database.
		$content .= "<tr>
						<td><a href='?page=product_info=".$row['product_id']."'>".$row['product_title']."</a></td> 
						<td>&pound;".$row['product_price']."</td> 
						<td>".$row['product_cat']."</td> 
						<td>".$row['product_desc']."</td>
					</tr>"; // reference a field value in the array by its key.
    }
    // free the result set
    mysqli_free_result($result);
	$content .= "</tbody></table>"; // end of content.
}
?>