<?php
session_start();
include_once(__DIR__ . "/./utils/articleUtils.php");
include_once(__DIR__ . "/./utils/userUtils.php");
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
<div class='pagehome'>
<?php
if (!isLoggedIn()) {
    header("location:index.php");
}
if (hasArticle()) {
    $article = getArticle();
    echo '<div class="alert alert-success" role="alert">';
    echo "<p class='message'> $article </p>";
} else {
    $username = $_SESSION['user'];
    $ar = getAllArticles();
    foreach ($ar as $key => $arti) {
        echo '<article>';
        echo "<h4>".$arti['title']."</h4>";
            //var_dump($arti);
        if ($arti['username'] == $username) {
            
            echo "<div><a class='delete' href=./scripts/clearArticles.php?id=" . $arti['id'] . "><img src='images/delete.png' width='30' height='30' alt=''>DELETE" . "</a></div>";
        }
        echo '<hr>';
        echo $arti['content'] . '<br>';
        echo $arti['date'] . '<br>';
        echo "<a href=scripts/articleFrom.php?id=" . $arti['username'] . ">@" . $arti['username'] . "</a><br>";
        echo '</article>';
    }
}
?>
</div>
</body>
</html>