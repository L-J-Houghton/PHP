<?php
include_once "model/User_db.class.php"; // including the User_db class , being used below.
$addSeller = isset($_POST['newSeller']); // if the submit button within new seller form has been pressed (submitted) do the following.
if($addSeller) { // if the post method has occured , in other words if addSeller is true , do the following.
    $newUsername = $_POST['username']; // assign the value posted within form to that of the newUsername variable.
    $newPassword = $_POST['password'];  // assign the value posted within form to that of the newPassword variable.  
    $seller = new User_db($db); // creating an object using the included class file.
    try { // try block , please see below.
        $seller->createUser($newUsername, $newPassword); // using the createUser method made in the User_db class to create a new user with values stored within variables in arguments.
        $msg = "New Seller created"; // if successful the message displayed will state that a new seller has been created.
    } catch (Exception $error) { // catch exception error if the above try block fails.
        $msg = $error->getMessage(); // using getMessage fucntion to get the exception error found , storing it as a variable msg.
    }
}
include_once "view/User/new_seller.php"; // including the new seller view , to display form etc, to the user.

     /*Reference guides:

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online manual: http://php.net/manual/en/function.include.php
	 
	 */