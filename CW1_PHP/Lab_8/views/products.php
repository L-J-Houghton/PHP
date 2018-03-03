<?php 
// defining the SQL query to run (from the lab 3 queries.sql)
// use column aliases if necessary to make referencing fields in the result-set easier.
$sql = "SELECT * FROM products";
// query the database
$result = mysqli_query($link, $sql);
// update the html content with the string of the page title.
$content .= "<h1>PRODUCTS</h1>";
// getting the number of rows in the result-set.
$row_cnt = mysqli_num_rows($result);
// checking if there are any rows to display.
if ($row_cnt == 0) {
	// if not, output a prompt.
	$content .= "<p>There are no products to show!</p>";
} else {
	// otherwise, updating the html in the $content variable.
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
    // while there are rows, the below code will fetch each row as an associative array.
    while ($row = mysqli_fetch_assoc($result)) {
		// append the content with more html containing the row data.
		$content .= "<tr>
						<td><a href='?page=product_info=".$row['product_id']."'>".$row['product_title']."</a></td> 
						<td>&pound;".$row['product_price']."</td> 
						<td>".$row['product_cat']."</td> 
						<td>".$row['product_desc']."</td>
					</tr>"; // referencing a field value in the array by its key.
    }
    // free the result set
    mysqli_free_result($result);
	$content .= "</tbody></table>";
}
?>