<?php
session_start();
include_once(__DIR__."/./home.php");
include_once(__DIR__."/./utils/userUtils.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/articleCss.css" />
    <script src="main.js"></script>
</head>
<body>
<section>
    <article>
      <h1>Profile:</h1>
      <div class='$username'>
      <?php
      $user=userInfo();
      foreach($user as $key =>$value){
        foreach($value as $titre=>$profil){
          echo "<p class='titre'>".$titre.":".$profil."</p>"."<br>";
        }
      }
      $_SESSION['id']=$value['id'];
      ?>
      </div>
    </article>

    <article>
      <?php
      $username=$_SESSION['user'];
      $articlUser=getUserArticle($username);
      foreach($articlUser as $key=>$arti){
        echo $arti['title'];
        echo '<hr>';
        echo $arti['content'].'<br>';
        echo $arti['date'].'<br>';
    }
      ?>
   </article>
  </section>
</body>
</html>