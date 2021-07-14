<?php
include "config.php";
include "auth_session.php";

//lees het ID uit de url
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
  //lees het lid uit de database
$post = mysqli_query($mysqli, "SELECT post_tabel.image FROM post_tabel WHERE post_tabel.post_ID =" . $id );
$check = mysqli_query($mysqli, "SELECT post_tabel.account_ID FROM post_tabel WHERE post_tabel.post_ID =" . $id );
$row = mysqli_fetch_array($post);
$row2 = mysqli_fetch_array($check);
if ($row2['account_ID'] == $varID) {


  $result = mysqli_query($mysqli, "DELETE FROM comment_tabel WHERE post_ID =" . $id);
  if ($result) {
    $folder = "assets/images/posts/";
      $image = $row['image'];
      unlink($folder . $image);
      $result1 = mysqli_query($mysqli, "DELETE FROM post_tabel WHERE post_ID =" . $id);
  }else{
    echo "er is iets fout gegaan";
  }
  //controleer het resultaat
  if ($result1) {
      
      //alles OK, verstuur terug naar de homepage
      header("Location:account.php");
      exit;
  } else {
    echo "Er ging wat mis met het verwijderen.";
    exit;
  }
}else{
  echo "jij sneaky guy! je kan niet iemand anders zijn postst verwijderen. HELAASS";
  echo "<a href='dashboard.php'>Ga terug smerig ventje</a>";
} 
}else{
  echo "mag niet verwijderen";
  exit;
}

?>
