<!DOCTYPE html>
<html>
<head>
	<title>account</title>
	    <meta charset="UTF-8">


	<link rel="stylesheet" type="text/css" href="account.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index2.css">
</head>
<body>

	<?php 
		include("auth_session.php");
		include "config.php";

$id = $_GET['id'];
 
$result10 = mysqli_query($mysqli, "SELECT post_tabel.image, account_tabel.naam, account_tabel.beschrijving, account_tabel.pfimage FROM post_tabel RIGHT JOIN account_tabel ON post_tabel.account_ID = account_tabel.User_ID WHERE account_tabel.User_ID =" . $id );

$row = mysqli_fetch_array($result10); 


$post = mysqli_query($mysqli, "SELECT post_tabel.post_ID, post_tabel.image, post_tabel.teller FROM post_tabel WHERE post_tabel.account_ID =  $id ORDER BY post_tabel.post_ID DESC" );



	?>



<header>

	<div class="container">

		<div class="profile">
			
			<div class="profile-image">
				<div class="square">
				<?php echo"<img class='grottepf' src='assets/images/profiles/" . $row['pfimage'] .  "'>"; ?> 
				</div>

			</div>

			<div class="profile-user-settings">

				<h1 class="profile-user-name"><?php echo $row['naam']; ?></h1>

			</div>

			<div class="profile-bio">

				<p><span class="profile-real-name"><?php echo $row['naam']; ?></span> <?php echo $row['beschrijving']; ?></p>

			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>

<main>
<?php
	while ($row2 = mysqli_fetch_array($post)) {

		?>

	<div class="container"> 
		<div class="gallery"> 
			
			<div class="gallery-item" tabindex="0">

			<?php	echo "<img src='assets/images/posts/" . $row2['image'] . "' class='gallery-image'>" ?>

				<div class="gallery-item-info"> 

				</div>

			</div>


		</div>
		<!-- End of gallery -->



	</div>
	<!-- End of container -->

	<?php
}

	?>

</main>

<?php
	include"footer.php";
?>

</html>

</body>
</html>