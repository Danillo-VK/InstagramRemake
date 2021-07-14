<?php
include("auth_session.php");
include "config.php";

$id = $_GET['id'];

$comment  = $_POST['berichtje'];
                


		$foutmelding = "";

		if ($comment == "")
  {
        $foutmelding .= "U heeft dit veld niet ingevoerd.";
  }

		if ($foutmelding == "") {
			
				$query  = "INSERT INTO comment_tabel (user_ID, bericht, post_ID)";
      		$query .= "VALUES('$varID', '$comment', '$id')";
      		$commentplaats = mysqli_query($mysqli, $query);
      		header("location:commentpost.php?id=$id ");
      		 



}else{

}
		?>