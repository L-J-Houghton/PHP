<?php
class Product_DB extends DB{ // child class Product_DB is used to inherit method from parent class DB.
    
        public function addProduct($pro_title, $pro_img, $pro_price) {// function to add new products to the database.
		$proSql = "INSERT INTO products (pro_title, pro_image, pro_price)  VALUES ( ?, ?, ?)"; // sql statement used to insert values into each product column for each new product.
		$info = array($pro_title, $pro_img, $pro_price);// stroing the data parsed as an array , see below
		$pro_state = $this->declareState($proSql, $info); // using the data stored within the array above to execute using the sql query by using declareState to do so.
		return $this->db->lastInsertId(); // returning the last inserted products.
	}
	public function editPro($pro_id, $pro_title, $pro_img, $pro_price) { // editPro used to edit product details.
		$edit = "UPDATE products  // sql query used to update the existing product details including image , price and title / name of product.
                	SET pro_title = ?, 
	                pro_img = ?,
					pro_price = ?,
        	        WHERE pro_id = ?";
		$info = array($pro_title, $pro_img, $pro_price); // storing the data passed through function in form of array see below.
		$declare = $this->declareState($edit, $info);// executing the statement made above with the appropriate values stored within variables.
		return $declare; // return the result.
	}
	public function getProduct_id($pro_id){ // get product function used to get the values of an individual product from within the products table.
		$get_id = "SELECT pro_id, pro_title, pro_img, pro_price FROM products WHERE pro_id = ?"; // sql statement used to fecth results from table relating to the product fields/values.
		$info = array($pro_id);// storing the data passed through function in form of array see below.
		$declare = $this->declareState($get_id, $info);// executing the statement made above with the appropriate values stored within variables.
		$pro = $declare->fetchObject(); // using fecthObject method to get the product/values.
		return $pro;
	}
	public function searchPro($search){ // get product function used to get the values of an individual product from within the products table.
		$search = "SELECT * FROM products WHERE pro_title LIKE '%or%';" // sql statement used to fecth results from table relating to the product fields/values.
		$declare = $this->declareState($search);// executing the statement made above with the appropriate value stored within variable.
		return $declare; // return results found
	}
	public function deletePro($pro_id) { // deletePro used to remove products / results from the database.
		$del = "DELETE FROM products WHERE pro_id = ?"; // query to delete results from table .
		$info = array($pro_id); // s
		$declare = $this->declareState($del, $info);// executing the statement made above with the appropriate values stored within variables.
	}
	public function getProducts(){ // get products function used 
		$getPro = "SELECT pro_id, pro_title, pro_img, pro_price  FROM products"; // making query/statement to get each product with their values within the table.
		$declare = $this->declareState($getPro);// executing the statement made above with the appropriate value stored within variable.
		return $declare;// return the result.
	}
}
?>

<!-- Reference:

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online reference guide: http://php.net/manual/en/features.file-upload.php
	 
-->