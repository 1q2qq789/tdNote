<?php
include_once('../utils/userUtils.php');
include_once('../utils/articleUtils.php');

if (!isLoggedIn()) {
    header("location: ./index.php");
    exit();
}


$title = $_POST['title'];
$content = $_POST['content'];

if (empty($title) || empty($content)) {
    $msg = "titre ou contenu ne peut pas etre vide.";
    $error = urlencode($msg);
    header("location: ../articles.php?articleError=$error");
} else {
    try {
        $userId = $_SESSION['id'];
        insertArticle($userId, $title, $content);
    } catch (Exception $ex) {
        echo "<span class='error'>An error occurred: " . $ex->getMessage() . "</span>";
    }
    $msg = "Congratulations! You article has been created!";
    $msg = urlencode($msg);
    header("location:../home.php?article=$msg");


}




//header('location: ../articles.php');
exit();

?>