<? 
include_once "model/Product_DB.class.php"; // include model class Product_DB.
$products = new Product_DB($db); // create new object.
$pro_select = isset($_GET['pro_id']); // variable used to check if user has pressed product id link (see below).
$pro_search = isset($_GET['search']); // variable used to check if user has pressed search (see below).
if ($pro_select) { // if product has been selected (is set) by user (true) do following 
    $pro_id = $_GET['pro_id']; // get the product id.
    $pro_info = $pro->getPro($pro_id); 	 // using the getPro function get the product details accociated with the pro_id.
    include_once "view/product_info.php"; // include the product info view to display product info to user.
} else { // else do
    $products = $products->getProducts();  // get the whole table of products usng the getProducts function.
    include_once "view/product_list.php"; // include the product list view to display table/list of products to the user.
} 
if ($pro_search){ // if the user has pressed the search (true) do the following
    $pro_title = $_GET['search']; // set the text entered as the pro_title variable 
    $pro_result = $pro->searchPro($pro_title); // using the searchPro function get all the products accociated with the pro_title.
    include_once "view/product_list.php"; // include the product list view to display table/list of products found in search.
} else {// else 
    $pro_result->message = "No products found search again!"; // set the message to 'not found' to inform user.
}    
?>
	 /* Reference:
	 
	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 
	 */