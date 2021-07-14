<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


$db_hostname = 'localhost';

$db_username = '85586_beroeps';

$db_password = 'Ls_50bq1';

$db_database = '85586_beroeps';


 

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password,$db_database);


 

if(!$mysqli) {

    echo "FOUT: geen connectie naar database. <br>";

    echo "Errno: ". mysqli_connect_errno() . "<br/>";

    echo "Error: ". mysqli_connect_error() . "<br/>";

    exit;

}

?>