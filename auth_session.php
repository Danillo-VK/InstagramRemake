<?php
    session_start();

    $varID = $_SESSION["User_ID"];
    $naamID = $_SESSION["naam"];

    if(!isset($_SESSION["naam"])) {
        header("Location: login.php");
        exit();
    }


    

?>
