<?php
class DB{ // parent class DB containg function used to execute statements.
	private $db; // private variable db.
    
	public function __construct ($db) { // parsing through database variable made above.
		$this->db = $db; // 
	}
     
        public function declareState($sql, $info = NULL){ // declareState used to make/prepare statement.
		$declare = $this->db->prepare($sql); // preparing sql statement.
		try{
			$declare->execute($info); // executing th sql statement prepared above.
		} catch (Exception $error){ // catch the exception error if the above fails.
		    $prompt ="<p>You tried to execui: $productSQL<p> // storing exception error prompt.
			    <p>Exception caught = $error</p>"; // setting exception error.
		    trigger_error($prompt); // display the error prompt made above to user.
		}
		return $declare; // return the result.
    }
}
	 /*Reference:
	 
	 Lab Exercises.
	 Coursework guide : http://gitlab.doc.gold.ac.uk/data-networks-web/lab-exercises-term-2/tree/master/coursework-blog/
	 
	 */