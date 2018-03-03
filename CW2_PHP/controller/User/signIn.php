<?
include_once "model/User_db.class.php"; // including the model class User_db to be used, see below
$ sign= isset($_POST['signin']); // if the user has pressed / submitted the sign in button on the form do following
if($sign) { // if the above is true do following
    $username = $_POST['username']; // assign the username to that of the username entered within the sign in form.
    $password = $_POST['password']; // assign the password to that of the username entered within the sign in form.
    $userDB = new User_db($db); // create an object to be used in code below.
    try { // try block to do the following
        $userDB->checkDetails($username, $password); // check the details 
        $userDB->signIn();// sign the user in and therefore open/start the session using sign in method included via the User_db class.
    } catch ( Exception $error ) { // catch the exception error
        echo $error->getMessage(); // print / echo the excpetion error caught above.
    }
}
$signOut = isset($_POST['signout']); // if the user has pressed the sign out / submit button do the following.
if ($signOut){ // if the above is true do the following.
	$userDB->signOut(); // sign the user out and therefore close/end the session using sign out method included via the User_db class.
}
if (!$user->isOnline() ) { // if the user is not online and session is closed , do the following
    include_once "view/user/signIn.php"; // include the sign in view , therefore allowing user to sign back in.
}

	 /* Reference guides:

	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online guide: http://php.net/manual/en/function.isset.php
	 
	 */