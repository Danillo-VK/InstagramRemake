<?php
include "config.php";
include "auth_session.php";

//lees het ID uit de url
$id = $_GET['id'];

// is het ID een nummer?
if (is_numeric($id)) {
  //lees het lid uit de database
  $result900 = mysqli_query($mysqli, "SELECT * FROM comment_tabel WHERE comment_ID =" . $id);

  if ($result900) {
      $row = mysqli_fetch_array($result900); 
      $id3 = $row['user_ID'];
      $id2 = $row['post_ID'];

if ($id3 == $varID) {
    $result = mysqli_query($mysqli, "DELETE FROM comment_tabel WHERE comment_ID =" . $id);
      if ($result) {
        //alles OK, verstuur terug naar de homepage
      header("Location:commentpost.php?id=$id2");
      exit;
  } else {
    echo "Er ging wat mis met het verwijderen.";
    exit;
  }

}
else{
      echo "GATVER! en nog iemand anders comments proberen te verwijderen ook! dat dacht ik niet<br>";
  echo "<a href='dashboard.php'> Ga terug</a>";
  }
}else{

}
  } else {
  // het ID was geen nummer
  echo "sorry er is iets fout gegaan";

}
  
?>
