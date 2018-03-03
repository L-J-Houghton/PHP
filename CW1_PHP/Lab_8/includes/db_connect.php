<?php
// define a connection 'handle'
$link = mysqli_connect(
    'localhost',
    'lhoug001',
    'Bizibit1515',
	'lhoug001_anotherdb'
);
// check connection succeeded
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}
?>