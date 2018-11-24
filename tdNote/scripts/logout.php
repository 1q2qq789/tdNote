<?php
session_start();
include_once(__DIR__ . '/../utils/userUtils.php');
logout();
header("location: ../index.php");
exit();
?>