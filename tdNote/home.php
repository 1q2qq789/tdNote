<?php
session_start();
include_once(__DIR__."/./utils/articleUtils.php");
include_once(__DIR__."/./utils/userUtils.php");
include('./views/menu.inc.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>home</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/articleCss.css" />
	<script src="./js/jquery.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
    
</head>
<body>
<article>
<?php
    if(!isLoggedIn()) {
        header("location:index.php");
    }
        if(hasArticle()) {
          $article = getArticle();
          echo "<p class='message'> $article </p>";
        }else{
        $ar=getAllArticles();
        foreach($ar as $key=>$arti){
            echo $arti['title'];
            echo '<hr>';
            echo $arti['content'].'<br>';
            echo $arti['date'].'<br>';
        }
    }
    ?>
</article>
</body>
</html>