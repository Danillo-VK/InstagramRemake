<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['upload'])) {
        
$naam           = $_POST['naam'];
$email       = $_POST['email'];
$wachtwoord        = $_POST['wachtwoord'];
$beschrijving       = $_POST['beschrijving'];

    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "assets/images/profiles/".$image;


        
        $query    = "INSERT into `account_tabel` ( naam, email, wachtwoord, beschrijving, pfimage)
                     VALUES ( '$naam','$email', '$wachtwoord', '$beschrijving', '$image')";
        $result   = mysqli_query($con, $query);

        if (move_uploaded_file($tempname, $folder))  {
        echo"Image uploaded successfully";
        if ($result) {

            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
      }
      else{
         echo"Failed to upload image";
        }
    } else {
?>
    <form class="form" action="" method="POST" enctype="multipart/form-data">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="naam" placeholder="naam" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="wachtwoord" placeholder="wachtwoord">
        <input type="textarea" class="login-input" name="beschrijving" placeholder="beschrijving">
        <input type="file" name="uploadfile" value="ProfielFoto" placeholder="profielfoto"/><br>
        <button type="submit" name="upload">Registreer</button>
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
