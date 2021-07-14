<html>
    <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="comment.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
	<body>
		<header class="postheader">
			<button onclick='location.href ="dashboard.php"'><h4>Ga terug</h4></button>
			<center>
				<h2 style="color:white;">Comments</h2>
			</center>

		</header>
<?php
include("auth_session.php");
include "config.php";


$id = $_GET['id'];

// query voor de upload van de comment
 
$comment =mysqli_query($mysqli, "SELECT comment_tabel.comment_ID, comment_tabel.bericht, account_tabel.naam FROM comment_tabel RIGHT JOIN account_tabel ON comment_tabel.user_ID = account_tabel.User_ID WHERE comment_tabel.post_ID =" . $id );



while ($row2 = mysqli_fetch_array($comment)) {
  //start een tabelrij

  //maak de cellen voor de gegevens
	
  
  echo "<strong class='d-block groter'>" . $row2['naam'] . "</strong>";

	
  		echo "<p class='d-block mb-1 groter'>" . $row2['bericht'];
  		echo "<br><a href='commentverwijder.php?id=" . $row2['comment_ID'] . "'>Verwijder</a>";
  		echo "</p>";

 	
  echo "<br>";
  echo "<hr class='small'>";




}
 

?>
		<div class="my-sticky-footer message-text">
				  <div class="position-relative comment-box">
				  	<?php echo "<form action='commentpost_verwerk.php?id=" . $id . "' method='post'>"; ?>
                       <input name="berichtje" class="w-100 border-0 p-3 inputveld" placeholder="Add a comment..." required="required">
                       <input class="btn btn-primary position-absolute btn-ig buttonpost" type="submit" name="submit" id="sumbit" value="plaats">
                   </form>
                  </div>
		</div>




	</body>
</html>