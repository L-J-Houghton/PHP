<?php
$content = "<h1>Make an order</h1>";
// define a variable with path to the script which will process form
// ->	$_SERVER["PHP_SELF"] is a path to the current script (index.php)
$action = $_SERVER["PHP_SELF"]."?page=make_order";
// turn autocommit off
mysqli_autocommit($link, FALSE);
// start a transaction
mysqli_query($link, 'START TRANSACTION');
// fetching the products so that we have access to their names and id's.
// lock in shared mode so affected data cannot be altered by other 
// sessions BEFORE the transaction is committed or rolled back.
// only listing products that are in stock.
$sql = "SELECT product_id, product_title
        FROM products
		INNER JOIN Inventory
		ON products.product_id=Inventory.pro_id
		WHERE Inventory.reserve>0
	    ORDER BY product_title LOCK IN SHARE MODE";
$result = mysqli_query($link, $sql);
// checking if the query returned a result.
if ($result === false) {
    echo mysqli_error($link);
} else {
    $options = "";
    // create an option for each product.
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='".$row['product_id']."'>";
        $options .= $row['product_title'];
        $options .= "</option>";
    }
}
// defining the form html.
// note : the customer_id is a hidden field.
$form_html = "<form action='".$action."' method='POST'>
				<input type='hidden' name='customer_id' value='1'>
                <fieldset>
                    <label for='product_id'>Product:</label>
                    <select name='product_id' required>
						<option value='' disabled selected>Select a product</option>
                        ".$options."
                    </select>
                </fieldset>
                <fieldset>
                    <label for='quantity'>Qty:</label>
					<input type='number' name='qauntity' min='1' max='100'>
                </fieldset>
                <fieldset>
                    <label for='delivery'>Select delivery method:</label>
                    <select name='delivery' required>
						<option value='second class' selected>second class</option>
						<option value='first class'>first class</option>
						<option value='next working day'>next working day</option>
                    </select>
                </fieldset>
                <button type='submit'>Place order</button>
              </form>";
// appending the html form to content string.
$content .= $form_html;

// defining the variables and setting them to empty values.
$product_id = $reserve = $quantity = $customer_id = $shipping= "";
// checking if there was a POST request.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// validating the form data.
	$qauntity = mysqli_real_escape_string($link, clean_input($_POST["quantity"]));
	$product_id =  mysqli_real_escape_string($link, clean_input($_POST["product_id"]));
	$customer_id =  mysqli_real_escape_string($link, clean_input($_POST["customer_id"]));
	$shipping =  mysqli_real_escape_string($link, clean_input($_POST["shipping"]));
	// define query to get stock info for album that has been ordered
	// lock the data FOR UPDATE so that it cannot be read by other 
	// sessions BEFORE the transaction is committed or rolled back
	$sql1 = "SELECT reserve FROM Inventory WHERE pro_id=".$product_id." FOR UPDATE";
	// run first query
	$result = mysqli_query($link, $sql1);
	// checking if the first query returned a result.
	if ($result === false) {
		exit(mysqli_error($link)); // exit script with message.
	}
	// getting the reserve value from the first result-set.
	$row = mysqli_fetch_row($result);
	$reserve = $row[0];
	// checking if there are enough products in stock, and calculating new reserves.
	if ($qauntity <= $reserve) {
		$new_reserve_val = $reserve - $quantity;
	} else {
		exit("Sorry out of stock."); // exit script  with message.
	}
	// defining the insertion query needed to add a row to the Transaction (orders) table
	$sql2 = sprintf("INSERT INTO Transactions (customer_id, shipping)
		VALUES (%d, '%s')", $customer_id, $shipping);
	// running the second query.
	$result2 = mysqli_query($link, $sql2);
	
	// getting the id of last row inserted (the transaction id).
	$transaction_id = mysqli_insert_id($link);
	// defining the insertion query needed to add a new row to the Line table.
	$sql3 = sprintf("INSERT INTO Line (transaction_id, product_id, quantity)
		VALUES (%d, '%s', %d)", $transaction_id, $product_id, $qauntity);
	// running the third query.
	$result3 = mysqli_query($link, $sql3);
	// defining the update query needed to update the Inventory table.
	$sql4 = sprintf("UPDATE Inventory SET reserve=%d 
		WHERE product_id='%s'", $new_reserve_val, $product_id);
	// running the final query.
	$result4 = mysqli_query($link, $sql4);
	// checking if the queries 2-4 all went ahead.
	if ($result2 === false || $result3 === false || $result4 === false) {
		// if one of them returned false,  a rollback transaction will occur.
		mysqli_rollback($link);
		echo mysqli_error($link);
	} else {
		// else all of it is completed without any error, so commit transaction to database.
		mysqli_commit($link);
		$content .= "Order successfully placed.";
	}
}
?>