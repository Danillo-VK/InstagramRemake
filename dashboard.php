<?php
//include auth_session.php file on all user panel pages
include "auth_session.php";
include "config.php";
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- Groupe post -->

<?php
 
$result10 = mysqli_query($mysqli, "SELECT post_tabel.image, account_tabel.naam, account_tabel.pfimage FROM post_tabel RIGHT JOIN account_tabel ON post_tabel.account_ID = account_tabel.User_ID WHERE account_tabel.User_ID =" . $varID );
$row10 = mysqli_fetch_array($result10); 
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3d6f2df1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">

    <title>Document</title>
</head> 

<body> 
    <div class="background bovenkant">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container justify-content-center ">
                <div class="d-flex flex-row justify-content-between align-items-center col-9">
                    <a class="navbar-brand" href="#">
                        <img style="width: 50%;" src="assets/images/LogoKlein.png" alt="" loading="lazy">
                    </a>
                    <div>
                     </div>
                    
                            <li class="list-inline-item ml-2 align-middle">
                                <a href="#" class="link-menu">
                                    <div
                                        class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center topbar-profile-photo">
                                        <?php echo"<img src='assets/images/profiles/" . $row10['pfimage'] .  "' 
                                            style='transform: scale(1.5); width: 100%; position: absolute; left: 0;'> " ?>
                                            
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>



    <div class="mt-6">
        <div class="container d-flex justify-content-center">
            <div class="col-9"> 
                    <div class="mw-100">
                    	<?php

                $result2 = mysqli_query($mysqli, "SELECT * FROM post_tabel WHERE post_ID = post_ID");

                $row100 = mysqli_fetch_array($result2);

$result1 = mysqli_query($mysqli, "SELECT * FROM account_tabel");


// telt de likes bij elkaar

$likes = $row100['post_ID'];
 


// welke naam bij welke post komt te staan
$accID = $row100['account_ID'];

$accnaampost = mysqli_query($mysqli, "SELECT * FROM account_tabel WHERE User_ID =" . $accID );



// eigen post beschrijving 
	
	$beschrijving = mysqli_query($mysqli, "SELECT * FROM post_tabel WHERE post_ID =" . $likes );
	

// comments 

$comment =mysqli_query($mysqli, "SELECT comment_tabel.bericht, account_tabel.naam FROM comment_tabel RIGHT JOIN account_tabel ON comment_tabel.user_ID = account_tabel.User_ID WHERE comment_tabel.post_ID =" . $likes );

$post = mysqli_query($mysqli, "SELECT post_tabel.account_ID, post_tabel.image, account_tabel.naam, account_tabel.pfimage, post_tabel.post_ID FROM post_tabel RIGHT JOIN account_tabel ON post_tabel.account_ID = account_tabel.User_ID WHERE post_tabel.post_ID = post_tabel.post_ID ORDER BY post_ID DESC");
 


while ($row1100 = mysqli_fetch_array($post)) {

	//account tabel 
	$row1 = mysqli_fetch_array($result1); 
	// accountnaam boven de post
	$row2 = mysqli_fetch_array($accnaampost);
	// comments
	$row4 = mysqli_fetch_array($comment);
	// beschrijving onder post 
	$row5 = mysqli_fetch_array($beschrijving); 


?>
                                    <?php 
                                        $postID2 = $row1100['post_ID'];
                                        $postID3 = $row1100['account_ID'];
                                     ?>

                        <!-- START OF POSTS -->

                        <div class="margin-bottom">
                        <div class="d-flex flex-column mt-8 mb-8">

                            <div class="card">
                                <div class="card-header p-3" onclick="location.href = 'account_iemand_anders.php?id= $postID3 '">
                                    <div class="flex-row align-items-center">
                                        <div
                                            class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center border border-danger post-profile-photo mr-3">
                                            <!-- hier profielfoto uitlezen uit database -->
                                           <?php
                                           
                                            echo "<img src='assets/images/profiles/" . $row1100['pfimage'] . "'
                                                style='transform: scale(1.5); width: 100%; position: absolute; left: 0;'>"

                                            ?>
                                            <!-- einde profielfoto uitlezen -->
                                        </div>
                                        <!-- hier de naam uitlezen uit database -->
                                        <?php

                                        $accountnaampost = $row1100['naam'];
                                        ?>
                                    <div class="margin-top12">
                                        <?php echo"<center><span class=font-weight-bold>" . $accountnaampost . "</span></center>" ?>
                                    </div>
                                        <!-- einde uitlees database -->
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="embed-responsive embed-responsive-1by1">
                                        <!-- hier foto uit database uitlezen -->
                                        
                                        <?php echo "<img class='embed-responsive-item' src='assets/images/posts/". $row1100['image'] ." '"?>

                                        <!-- einde foto uitlezen -->
                                    </div>


                                    <div class="d-flex flex-row justify-content-between pl-3 pr-3 pt-3 pb-1">
                                        <ul class="list-inline d-flex flex-row align-items-center m-0">
                                            <li class="list-inline-item">
                                                
                                                
                                                <button class="btn p-0" onclick="location.href = 'likeverwerk.php?id=<?php echo$postID2 ?>'">

                                                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16"
                                                        class="bi bi-heart" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </button>
                                            
                                            </li>
                                            <?php $postID1 = $row1100['post_ID'];  
                                            ?>

                                            
                                            <li class="list-inline-item ml-2">
                                             <button class='btn p-0' onclick="location.href = 'commentpost.php?id=<?php echo$postID1 ?> '">
                                                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16"
                                                        class="bi bi-chat" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                                    </svg>
                                                </button>
                                            </li> 
                                        </ul>
                                    </div>

                                    <div class="pl-3 pr-3 pb-2">
                                        <!-- lees likes uit -->

										<?php

                                        $berichtPost = mysqli_query($mysqli, "SELECT comment_tabel.bericht, post_tabel.post_ID FROM post_tabel RIGHT JOIN comment_tabel ON post_tabel.post_ID = comment_tabel.post_ID WHERE post_tabel.post_ID =" . $postID1);

                                        $row24 = mysqli_fetch_array($berichtPost);

                                        echo "<strong class='d-block'>Comment:</strong>";

                                        ?>
                                        <!-- einde naam van reactie  -->
                                        <!-- reactie uitlezen -->
                                       <?php echo"<p class='d-block mb-1'>" . $row24['bericht'] . "</p>"?>
                                        <!-- einde reactie uitlezen -->
                                    </div>

                                    


                                </div>      
                            </div>

                        </div>
                    </div>
                        <!-- END OF POSTS -->

<?php
}
?>
 
</body>


<footer>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</footer>




</div>
</div>
</div>
</div>


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
</div>
</html>
   
