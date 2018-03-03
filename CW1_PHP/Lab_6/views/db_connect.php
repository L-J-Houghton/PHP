<?php
// set variable (link) to mysqli command connect to enable connection to database.
$link = mysqli_connect(
    'localhost',
    'lhoug001',
    'Bizibit1515',
    'lhoug001_anotherdb'
);

/* check if the connection succeeded */
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

?>