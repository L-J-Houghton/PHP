<?php
$content = "<h1>Sell a product</h1>";
// defining a variable with the path to the script which will process the form.
$action = $_SERVER["PHP_SELF"]."?page=sell_product";

mysqli_autocommit($link, FALSE);
// starting the transaction
mysqli_query($link, 'START TRANSACTION');
// fetch the products so that user has access to their names etc.
// apply the LOCK IN SHARE MODE to ensure the products will be valid
// at the point we COMMIT the transaction.
$sql = "SELECT product_cat, product_brand 
        FROM products
	    ORDER BY product_cat LOCK IN SHARE MODE";
$result = mysqli_query($link, $sql);


if ($result === false) {
    echo mysqli_error($link);
} else {
    $options = "";
    // create an option for each product.
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_options .= "<option value='".$row['product_cat']."'>";
        $cat_options .= $row['product_cat'];
        $cat_options .= "</option>";
		$brand_options .= "<option value='".$row['product_brand']."'>";
        $brand_options .= $row['product_brand'];
        $brand_options .= "</option>";
    }
}
// defining the html form.
$form_html = "<form action='".$action."' method='POST'>
				<fieldset>
					<label for='product_title'>Name of product:</label>
					<input type='text' name='product_title' required>
				</fieldset>
                <fieldset>
                    <label for='product_price'>Price:</label>
					<input type='number' name='product_price' min='1' max=''>
                </fieldset>
                <fieldset>
                    <label for='product_desc'>Description:</label>
					<input type='text' name='product_desc' min='1' max='140'>
                </fieldset>
                <fieldset>
                    <label for='product_keywords'>Keywords:</label>
					<input type='text' name='product_keywords' min='1' max='80'>
                </fieldset>
                <fieldset>
                    <label for='product_cat'>Category:</label>
                    <select name='product_cat' required>
						<option value='' disabled selected>Select a Category</option>
                        ".$cat_options."
                    </select>
                </fieldset>
                <fieldset>
                    <label for='product_brand'>Brand:</label>
                    <select name='product_brand' required>
						<option value='' disabled selected>Select a Brand</option>
                        ".$brand_options."
                    </select>
                </fieldset>
                <button type='submit'>Submit</button>
              </form>";
// append html form to the content string.
$content .= $form_html;
// defining variables and setting them to empty values
$product_id = $product_title = $product_price = $product_desc = $product_keywords = $product_cat = $product_brand = "";
// checking if there was a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// validate the form data below.
	$product_title = mysqli_real_escape_string($link, clean_input($_POST["product_title"]));
	$product_price =  mysqli_real_escape_string($link, clean_input($_POST["product_price"]));
	$product_desc =  mysqli_real_escape_string($link, clean_input($_POST["product_desc"]));
	$product_keywords =  mysqli_real_escape_string($link, clean_input($_POST["product_keywords"]));
	$product_cat =  mysqli_real_escape_string($link, clean_input($_POST["product_cat"]));
	$product_brand =  mysqli_real_escape_string($link, clean_input($_POST["product_brand"]));
	// defining the insertion query
	$sql = sprintf("INSERT INTO products (product_title, product_price, product_desc, product_keywords, product_cat, product_brand)
		VALUES ('%s', %d, '%s', '%s', '%s', '%s')", $product_title, $product_price, $product_desc, $product_keywords, $product_cat, $product_brand);
	// running the query to insert the data
	$result = mysqli_query($link, $sql);
	// checking if the query went ok
	if ($result === false) {
		mysqli_rollback($link);
		// handling specific errors based on mysli error number codes
		$errno = mysqli_errno($link);
		switch ($errno) {
			case 1062 : // case for duplicate entry
				$content .= "Duplicate product.";
				break;
			default :
				echo mysqli_error($link);
		}
				
	} else {
		mysqli_commit($link);
		$content .= "Product successfully added.";
	}
    }
?>