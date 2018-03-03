<?php
if(isset($newSellerMsg)===false) { // if the Seller message has been set and is false , do the following
    $newSellerMsg = ""; // set seller message to empty value.
}
$newSeller = "<form method='post' action='user.php?page=users'> <!-- // form to add a new user to the database (site). -->
        <div id='name'><img src='images/sProducts.png'></div> <!-- // title of page (image). -->
        <div id='username'><input type='text' name='username' required/></div><!--  username (text) input. -->
        <div id='password'><input type='password' name='password' required/></div> <!-- password input -->
        <div id='create'><input type='submit' value='create user' name='newSeller'/></div><!-- // submit button to submit/post data. -->
</form>"; // end of form.
echo $newSeller; // echoing above content.