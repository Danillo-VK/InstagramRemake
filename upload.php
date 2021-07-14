<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "auth_session.php";
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "assets/images/posts/".$image;
    $teller = 0;

    $db = mysqli_connect("localhost", "85586_beroeps", "Ls_50bq1", "85586_beroeps");

    // Get all the submitted data from the form
    $sql = "INSERT INTO post_tabel(`post_ID`, `image`, `account_ID`, `teller`) VALUES ('NULL','$image','$varID','$teller')";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="index.css">
    <div id="content">

        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="uploadfile" value=""/>

            <div>
                <button type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
<br/><br/>

<div class="my-sticky-footer">
    <center><div class="icons">
            <div class="feed">
                <img class="icon" src="icons/feed.png" alt="feed" onclick="location.href = 'dashboard.php'">
            </div>

            <div class="post">
                <img class="icon" src="icons/camera.png" alt="post" onclick="location.href = 'upload.php'">
            </div>

            <div class="account">
                <img class="icon" src="icons/person.png" alt="user" onclick="location.href = 'account.php'">
            </div></center>


</div>

    </body>
</html>