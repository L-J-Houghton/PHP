<?php
// define a connection.
$con = mysqli_connect(
    'localhost',
    'lhoug001',
    'Bizibit1515',
	'lhoug001_anotherdb'
);
// check if connection succeeded.
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

$pro = "SELECT customer_name, customer_email FROM customer";

$res = mysqli_query($con, $pro);

if (mysqli_num_rows($res) == 0) {
    echo( "No customer info found." );
} else {
    echo( "Some customers were found!" );
}

/* check if the query returned a result */
if (mysqli_num_rows($res) == 0) {
    echo( "No customers found." );
} else {
    /* fetch each row in result-set as an associative array */
    while ($row = mysqli_fetch_assoc($res)) {
        echo($row['customer_name']." ".$row['customer_email']);
    }
    /* free result-set space in memory */
    mysqli_free_result($res);
}
 mysqli_close($con);
?>