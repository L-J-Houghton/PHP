<?php
$editPro= "<form method='post' action='user.php?page=editProduct' id='editProduct' enctype='multipart/form-data'> <!-- // start of form (using post method to send data). --> 
    <input type='hidden' name='id' value='$pro_info->pro_id' /> <-- // displaying id number of product. -->
	
     <input type='text' name='product_title' maxlength='50' value='$pro_info->pro_title' required />
	 <div id='upload'><img src='images/icon.png'><input type='file' name='image_upload'></div>
     <div id='Delete'><input type='submit' name='action' value='delete item' /></div> <!-- // delete (submit button) to delete product. -->
     <div id='Add'><img src='images/Add.png'><input type='submit' name='action' value='save item' /></div> <!-- // add option (submit button) to add the editions to the product. -->
	 </form> <!-- // end form. -->
";
echo $editPro; // echo the above.
?>