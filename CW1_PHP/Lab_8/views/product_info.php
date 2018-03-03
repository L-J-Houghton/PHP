<?php
// check if product_id is parameter set in the query string.
if (!isset($_GET['product_id'])) {
	// if it is not set, then don't run the script
	$content .= "<p>Sorry no products found!</p>";
}
else {
	// set a variable to store product_id value
	$product_id = $_GET['product_id'];
	// defining the SQL query to run (from the lab 3 queries.sql).
	// use column aliases if necessary to make referencing fields in result-set easier
	$sql = "SELECT * FROM products
	WHERE product_id='$product_id'";
	// query / search the database.
	$result = mysqli_query($link, $sql);
	// getting the number of rows in the result-set.
	$row_cnt = mysqli_num_rows($result);
	// checking if there are rows to display...
	if ($row_cnt == 0) {
		// if not, output a prompt.
		$content .= "<p>The product no longer exists!</p>";
	} else {
		// otherwise, update the html in the $content variable.
		
		// whilst there are rows, fetch each row as an associative array.
		// defining a row counter variable.
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			// in the first row, outputthe header and start of table.
			if ($i == 0) {
				$content .= "<h1>".$row['product_title']."</h1>";
				$content .= "<table cellpadding='5' border='2'>
						<thead align='left'>
							<tr>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>";
				 $content .= "<p>The album has $row_cnt tracks.</p>";
			}
			// appending the content with more html containing the row data.
			$content .= "<tr>
							<td>".$row['product_desc']."</td> 
							<td>".$row['product_price']."</td>
						</tr>"; // referencing a field value in the array by its key.
			// incrementing row counter variable.
			$i++;
		}
		// free the result set.
		mysqli_free_result($result);
		$content .= "</tbody></table>";
	}
} // end if/else statement.
?>