<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "auth_session.php";
include "config.php";
require('db.php');

$postID2 = $_GET['id'];
 
$sql=" UPDATE post_tabel SET teller = teller + 1 WHERE post_ID=" . $postID2;


if (mysqli_query($con, $sql)) {
?>	<script>window.location.replace("dashboard.php");</script>
<?php
}


?>