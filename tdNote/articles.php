<?php
session_start();
include_once("./utils/userUtils.php");
include_once("./utils/articleUtils.php");

if(!isLoggedIn()) {
  header("location: ./index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Articles</title>
  <link rel='stylesheet' type='text/css' href='./css/articleCss.css' />
</head>
<body>
<div>
<form method='POST' id='createArticle' action='./scripts/createArticle.php'>
        <h1>Create a new Post</h1>
        <?php
        if(hasArticleError()) {
          $err = getArticleError();
          echo "<p class='error' > $err </p>";
        }
        ?>
        <input type="text" name='title' placeholder='Article Title' />
        <textarea rows='10' name='content'></textarea>
        <input name='add_article' type='submit' value='Create Article'/>
      </form>
      <form method='POST' id='createArticle' action='./scripts/clearArticles.php'>
      <input name='clear_articles' class='important' type='submit' value='Clear Articles'/>
      </form>
      <div>
</body>
</html>
