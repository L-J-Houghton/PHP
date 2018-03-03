<?
class Users extends DB{ // child class using inheritance to inherit method from parent class .
    public function createUser($username, $password){ // function to create new users.
        $this->checkUsername($username); // checking to see if username is valid.
        $sql = "INSERT INTO users (username, password)VALUES( ?, ? )"; // inserting username and password of new user into table.
		$password = SHA1($password); // using encryption to hash password.
        $credentials= array($username, $password); // take data parsed , store as an array to be used below.
        $this->declareState($sql, $credentials);   // 
    }
    public function checkDetails($username, $password){ // fucntion used to check if the users details entered are valid , see below
        $sql = "SELECT username FROM users WHERE username = ? AND password = ?"; // query to check whether the details entered via form match records in database.
		$password = SHA1($password); // taking password data and encrypting.
        $info = array($username, $password); // taking the data parsed and storing within an array form , then assigning to info variable (see below).
        $declare = $this->declareState($sql, $info);// executing statement.
        if ($declare->rowCount() === 1 ) { // if the details found are correct do the following.
            $message = true; // set the message variable to true and therefore user details are correct.
        } else { // else do
            $failure = new Exception( "Authentication failed , please try again!" ); // creating exception object with error message.
            throw $failure; // throw the exception error caught above.
        }
        return $message; // return the error message.
    }
     private function checkUsername($username) { // check to see if the username already exists within database.
        $sql = "SELECT username FROM users WHERE username = ?"; // query database to find if any usernames match that posted from the form.
        $info = array($username);// taking the data parsed and storing within an array form to be used below.
        $this->declareState($sql, $info); // prepare statement.
        $declare = $this->declareState($sql, $info); // executing statement.
        if ($declare->rowCount() === 1 ) { // if a username does match do the following.
            $error = new Exception("Error: '$username' already used, try another username!"); // creating exception object with error message.
            throw $error; // throw the error if found , above.
        } 
    }

}
	 /*Reference:
	 
	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online guide : http://php.net/manual/en/language.oop5.inheritance.php
	 
	 */



