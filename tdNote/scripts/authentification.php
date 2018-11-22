<?php
session_start();
include( __DIR__. "/../utils/userUtils.php");



if(!isset($_POST["submit"]) || !isset($_POST["username"]) || !isset($_POST["password"])) {
  header("location: ../index.php");
  exit();
  
}
$username = $_POST['username']; 
$password =$_POST['password'];
try{
$user=userExists($username,$password);
if($user == null) {
  $msg = "Wrong username and Password.";
  $error = urlencode($msg);
  header("location: ../index.php?authError=$error");
  //echo "The user does not exists";
} else {
  login($username);
  header("location:../home.php");
} 
}catch(Exception $ex) {
echo "<span class='error'>An error occurred: ".$ex->getMessage()."</span>";
}
 ?>