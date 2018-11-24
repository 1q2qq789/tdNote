<?php
session_start();
include(__DIR__ . "/../views/menu.inc.php");
include_once(__DIR__ . "/../utils/articleUtils.php");
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Article From</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/articleCss.css" />
</head>
<body>
<div>
<div class='titreArticleFrom'>
<a href="../home.php" ><button type="button" class="btn btn-primary">revenir à home</button></a>
<h1>Article from:<?php echo $_GET['id'] ?></h1>
</div>


<?php
$user = getUserArticle($_GET['id']);
foreach ($user as $key => $value) {
    echo '<article>';
    echo "<h4>".$value['title']."</h4>";
    if ($value['username'] == $_SESSION['user']) {
        echo "<a  class='delete' href=./scripts/clearArticles.php?id=" . $arti['id'] . "><img src='images/delete.png' width='30' height='30' alt=''>DELETE" . "</a>";
    }
    echo '<hr>';
    echo '<p>'.$value['content'] .'</p>' ;
    echo '<p>'.$value['date'].'</p>';
    echo "<p><a href=#?id=" . $value['username'] . ">@" . $value['username'] . "</a></p>";
    echo '</article>';

}
?>



</article>
</div>
</body>
</html>

