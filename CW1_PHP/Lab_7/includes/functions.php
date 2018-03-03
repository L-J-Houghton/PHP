<?php
/* 	Helper functions. 
	Include once from index.php */
/* define a function to sanitise user input 
(this would ideally be in includes folder)
helps protect against XSS */
function clean_input($data) {
  $data = trim($data); // strips whitespace from beginning/end
  $data = stripslashes($data); // remove backslashes
  $data = htmlspecialchars($data); // replace special characters with HTML entities
  return $data;
}
?>