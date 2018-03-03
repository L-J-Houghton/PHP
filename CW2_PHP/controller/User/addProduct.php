<?php
include_once "model/Product_DB.class.php"; // including the Product_DB class model class , used below.
$product = new Product_DB( $db ); // creating a new object
$pro_added = isset($_POST['action']); // checking if the product form had been submitted or not 
if ($pro_added){  //  if the above is true , do the following.

	$press = $_POST['action']; // check whether the button was clicked , this applies to both adding and removing of products.
	$pro_id = $_POST['pro_id'];// 
	$add = ($press === 'add');// set the add button to the clicked variable enabling add action to take place and therefore allowing user to add chnages to products.
	$deletePro = ($press=== 'delete'); // set the delete button to the clicked variable enabling the delete action to take place.
	$addPro = ($add and $pro_id === '0' ); // set addPro variable to true if the add button has been clicked and the product id is equal to 0.
	$editPro = ($add and $addPro === false);// set editPro to false , disabling user to edit product values.
	     
	$pro_title = $_POST['pro_title']; // using post method to get the product title.
	$pro_img = $_POST['pro_img'];// using post method to get the product image.
	$pro_price = $_POST['pro_price'];// using post method to get the product price.
	if ($addPro) { // the user has pressed the add button within the form , then this condition is true and the below shall run
		$pro_upload = $product->addPro($pro_title, $pro_img, $pro_price);// add the product to the table using the addPro method made within the model class Product_DB.
		if($_FILES['image_upload']['error'] > 0){ // checking for any errors whilst uploading image.
			die('An error has ocurred whilst uploading.'); //  if an error is thrown then display message.
		}

		if(!getimagesize($_FILES['image_upload']['tmp_name'])){ // getting the file size of image.
			die('Please check you are uploading an image.'); // display message if the size of image cannot be found.
		}

		// Checking the filetype
		if($_FILES['image_upload']['type'] != 'image/png'){ // if the file is not a png image then display.
			die('Incorrect filetype...try again.');// display incorrect filetype error , asking user to try again.
		}

		// Checking filesize
		if($_FILES['image_upload']['size'] > 500000){ // if the file size of the image being uploaded is too large then display following.
			die('Image uploaded exceeds maximum upload size. Try again'); // displays if image is above max file size limit.
		}

		// Check if the file exists
		if(file_exists('upload/' . $_FILES['file_upload']['name'])){// checking if the image already exists.
			die('Image already exists. Please rename!'); // rename image if the name already exists.
		}
		if(!move_uploaded_file($_FILES['image_upload']['tmp_name'], '/images/' . $_FILES['image_upload']['name'])){ // upload image to the images directory.
			die('Error uploading file - check destination!.'); // dislaying error if the image cannot be uploaded to correct directory.
		}

		die('Image uploaded successfully.'); // finally display success message once image is uploaded.
		
		
	} else if ($editPro){ // else if the user has selected the edit product button 
		$product->editPro($product_title, $pro_img, $pro_price); // using the editPro function to allow the user to edit/update the product values.
		$pro_upload = $pro_id; // set the product being 
	} else if ($deletePro){ // if the user has submitted the delete button , this shall be true and the following shall occur.
		$product->deletePro($pro_id); // delete the product if the delete button is submitted.
	}	 
}
//Loading existing content in form for updated and editing.
$pro_view = isset($_GET['pro_id']); // if the product view button has been pressed do the below
if($pro_view) { // if the product view button has been selected and is true do the following
	$pro_id = $_GET['pro_id']; // get the product id number.
	$pro_info = $product->getPro($pro_id);// get the product details/values using by using product id to query the table.
	$pro_info->pro_id = $pro_id;
// if we have jjst saved or updated an entry, we want to load the new contents back in to the form 
// (so that the user can see & confirm the changes that they've just made)
} else if(isset($pro_upload)){ // else if the product upload button has been pressed do the following.
    $pro_info = $product->getPro($pro_upload); // get the product that has been updated , store it as pro_info
    $pro_info->message = "Product updated!"; // product updated message letting user know product has been updated/edited successfully.
} else { // else set the values to empty values as the form requires values. 
	$pro_info = new StdClass(); // create std object (no properties).
	$pro_info->pro_id = 0; // setting product id value to 0.
	$pro_info->pro_title = "";// setting product title value to blank.
	$pro_info->pro_img = "";// setting product title value to blank.
	$pro_info->pro_price = 0;// setting product id value to 0.
}
include_once "view/user/editProduct.php"; // including the user view , editProduct which displays a form enabling user to edit a product.
?>
<!-- Reference guides:

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online guide: http://php.net/manual/en/features.file-upload.php
-->