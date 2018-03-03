<?
include_once "model/Product_DB.class.php"; // including the model class (Product_DB) being used below.
$product = new Product_DB($db); // creating a new object using the class Product_DB.
$getProducts = $product->getProducts(); // object orientation used to get all the products in table and store them within a variable.
include_once "view/user/product_list.php"; // including the view product_list which displays all products.
?>
<!-- Reference guides:

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 
-->