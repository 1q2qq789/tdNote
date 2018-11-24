<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>home</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    
</head>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
    
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="../home.php">
              <img src="images/home3.svg" width="30" height="30" alt="">
               home</a></li>
            <li><a href="../articles.php">
            <img src="images/post.svg" width="30" height="30" alt="">
              New Post</a></li>
            <li><a href="../scripts/logout.php">
            <img src="images/logout.png" width="30" height="30" alt="">
              Logout</a></li>
              <li><a href="../profilArticle.php">
            <img src="images/user.svg" width="30" height="30" alt="">
            <?php echo $_SESSION['user'] ?></a></li>
              <li class="miage"><a href="#">
              <img src="images/miage2.svg" width="30" height="30" alt="">
               The Miage Blog</a></li>
            </li>
        </ul>
    </div>
	</div>
</nav>