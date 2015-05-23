<?php

	require_once '../config/config.php';
/*	require_once 'Textmessage.php';
	$nmRows = new Textmessage();
	$nr = $nmRows::nbOfRows($DBCon);
	echo $nr;
	unset($nmRows);
	*/
	
	$query = "SELECT * FROM msg_table_edited";
	if ($stmt = $DBcon2->prepare($query)) {

    /* execute query */
    $stmt->execute();

    /* store result */
    $stmt->store_result();

    print($stmt->num_rows);

    /* close statement */
    $stmt->close();
}
	//echo "foobar";
?>