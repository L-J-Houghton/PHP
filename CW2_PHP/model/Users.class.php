<?php
class Users{
    public function __construct(){ // using the 
        session_start(); // start of session
    }
	 
 	public function isOnline(){ // check to see if session is open (user is online).
        $sessionSelect = isset($_SESSION['online']); // set session to online.
        if ($sessionSelect) { // the the session is true (sesssion open) do the following.
            $ = $_SESSION['online']; // set session to online
        } else {// else do
            $systemOut = false; // set the session to false (closed).
        }
        return $systemOut; // return the vlaue either true or false based on whether session is open.
	}
	
	public function signIn() {
        $_SESSION['online'] = true; // if user is signed in the session is therefore online and thereofore open = true.
	}
 
	public function signOut() { // when user signs out , close the session
        $_SESSION['online'] = false; // setting session to false and closing session.
	}
 
}

	 /* Reference:
	 
	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 PHP online reference guide: http://php.net/manual/en/book.session.php
	 
	 */