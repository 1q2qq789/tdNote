<?php
session_start();
include(__DIR__ . "/views/menu.inc.php");
include_once(__DIR__ . "/./utils/userUtils.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/articleCss.css" />
</head>
<body>
<section>
      <h1>Your Info:</h1>
      <article>
      <div class='$username'>
      <?php
      $user = userInfo();
      foreach ($user as $key => $value) {
        foreach ($value as $titre => $profil) {
          echo "<span><p class='profil'>" . $titre . ":" . $profil . "</p>" . "<span>";
        }
      }
      $_SESSION['id'] = $value['id'];
      ?>
      </div>
    </article>

    <h1>Your Articles:</h1>    
      <?php
      $username = $_SESSION['user'];
      $articlUser = getUserArticle($username);
      foreach ($articlUser as $key => $arti) {
        echo '<article>';
        echo "<h4>". $arti['title']."</h4>";
        echo "<a class='delete' href=./scripts/clearArticles.php?id=" . $arti['id'] . "><img src='images/delete.png' width='30' height='30' alt=''>DELETE" . "</a>";
        echo '<hr>';
        echo $arti['content'] . '<br>';
        echo $arti['date'] . '<br>';
        echo "<a href=#?id=" . $arti['username'] . ">@" . $arti['username'] . "</a><br>";
        echo '</article>';
      }
      ?>
  </section>
</body>
</html>