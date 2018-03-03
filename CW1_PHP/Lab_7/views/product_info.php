<?php
// check if product_id has a parameter set in the query string
if (!isset($_GET['product_id'])) {
	// it is not set, so therefore don't run the script.
	$content .= "<p>Sorry no products found!</p>";
}
else {
	// continue running the script if else.
	// set a variable to store product_id value
	$product_id = $_GET['product_id'];
	// define the SQL query to run (see the lab 3 queries.sql file).
	// use column aliases if necessary to make referencing fields in result set simpler.
	$sql = "SELECT * FROM products
	WHERE product_id='$product_id'";
	// query / search the database
	$result = mysqli_query($link, $sql);
	// get the number of rows in the result set
	$row_cnt = mysqli_num_rows($result);
	// check if there are any rows to display
	if ($row_cnt == 0) {
		// if not, output a prompt message
		$content .= "<p>The product no longer exists!</p>";
	} else {
		// otherwise, update the html in the $content variable.
		
		// while there are rows, fetch each row as an associative array
		// define a row counter varibale aswell.
		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			// in the first row, output header and start of table.
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
						</tr>"; // reference a field value in the array by its key.
			// increment row counter everytime loop runs.
			$i++;
		}
		// free the result set
		mysqli_free_result($result);
		$content .= "</tbody></table>";
	}
} // end if/else statement.
?>