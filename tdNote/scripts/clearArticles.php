<?php
session_start();
include_once(__DIR__."/../utils/articleUtils.php");
$delete=$_POST['clear_articles'];
$id=$_SESSION['id'];
if(isset($delete)){
    try{
    deleteArticleUser($id);
    }catch(Exception $ex) {
        echo "<span class='error'>An error occurred: ".$ex->getMessage()."</span>";
      }
}
?>