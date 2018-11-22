<?php
session_start();
include_once(__DIR__.'/../utils/userUtils.php');					
					
if(isset($_POST['submit']))
{
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $gender=$_POST['gender'];
    $user=userExistsRegistration($username);
    if($user==null){
    try{
    createUser($username, $password, $firstname, $lastname,$telephone,$email,$gender);
    login($username);
    header("location:../home.php");
    }catch(Exception $ex) {
        header("location:../registration.php");
        echo "<span class='error'>An error occurred: ".$ex->getMessage()."</span>";
      }
   }else{
       $msg="username déjà exist";
       $error=urldecode($msg);
    header("location:../registration.php?authError=$error");
   }
}
?>
