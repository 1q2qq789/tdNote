<?php
session_start();
include_once(__DIR__ . "/../utils/articleUtils.php");
$id = $_GET['id'];
try {
    deleteArticleUser($id);
    header("location:../home.php");
} catch (Exception $ex) {
    echo "<span class='error'>An error occurred: " . $ex->getMessage() . "</span>";
}

?>