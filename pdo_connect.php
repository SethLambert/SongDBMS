<?php

$user = 'lambertsj16';
$pass = 'sl4465'; // first initial last initial last 4-digits of ID
$db_info='mysql:host=washington.uww.edu; dbname=cs366-2187_lambertsj16';
try {
    $db = new PDO($db_info, $user, $pass);

/*if(isset($db))
        echo "Connected";
else
        echo "Could not connect";*/

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>
