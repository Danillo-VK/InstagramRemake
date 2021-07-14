<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['naam'])) {
         
        $naam           = $_POST['naam'];
        $wachtwoord        = $_POST['wachtwoord'];

        // Check user is exist in the database
        // $result1 = mysqli_query($mysqli, "SELECT * FROM account_tabel");
        // $row = mysqli_num_rows($result1);

        // if ($naam = $row['naam']) {
            
        //     $id = $row['User_ID'];

        // }

        $query    = "SELECT * FROM `account_tabel` WHERE naam='$naam'
                     AND wachtwoord='$wachtwoord'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $countrows = mysqli_num_rows($result);
        $query1    = "SELECT User_ID FROM `account_tabel` WHERE naam='$naam'
                     AND wachtwoord='$wachtwoord'";
        $result1 = mysqli_query($con, $query1) or die(mysql_error());
        if ($countrows == 1) {
            $row = mysqli_fetch_array($result);
            $row1 = mysqli_fetch_array($result1);
            $_SESSION['User_ID'] = $row['User_ID'];
            $_SESSION['naam'] = $row['naam'];
            
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        
        <input type="text" class="login-input" name="naam" placeholder="naam"/>
        <input type="password" class="login-input" name="wachtwoord" placeholder="wachtwoord"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>
