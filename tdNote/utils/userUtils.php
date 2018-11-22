<?php
include( __DIR__. "/./dbUtils.php");

function getResult($request) {
  $result= Array();
  while ($row = $request->fetch()) {
      $oneLine=Array(); /* oneLine car il correspond à un seul tiple (ligne/enregistrement)
      */
      foreach($row as $key=>$value) {
          if (!is_numeric($key)) { /* ne prends pas les doublons avec 
              les clefs [0],[1],[2]...*/
              $oneLine[$key]=$value;
          }
      }
      array_push($result,$oneLine);
  }
  return $result;
}

function userExists($username,$password){
$mysql=connect();
$query="SELECT * FROM user WHERE username=:username and password=:password ";
$reponse=$mysql->prepare($query);
$data = array(
  "username" => $username,
  "password" => $password
);
execute($reponse, $data);
$user = null;
  while($row = $reponse->fetch()) {
    $user = array(
      "firstname" => $row["firstname"],
      "lastname" => $row["lastname"]
    );
  }

  $reponse->closeCursor();
return $user;
}



function userExistsRegistration($username){
  $mysql=connect();
  $query="SELECT * FROM user WHERE username=:username";
  $reponse=$mysql->prepare($query);
  $data = array(
    "username" => $username,
  );
  execute($reponse, $data);
  $user = null;
    while($row = $reponse->fetch()) {
      $user = array(
        "username"=>$row["username"]
      );
    }
    $reponse->closeCursor();
  return $user;
}


function createUser($username, $password, $firstname, $lastname,
$phone,$email,$gender) {
// Get Database Connection
$mysql = connect();
// Prepare the query
$query = "INSERT INTO
user(username,password,lastname,firstname,phone,email,gender)
VALUES
(:username,:password,:lastname,:firstname,:phone,:email,:gender)";
$request = $mysql->prepare($query);
// The query is prepared in $request
$data = array(
"username" => $username,
"password" => $password,
"lastname"=>$lastname,
"firstname"=>$firstname,
"phone"=>$phone,
"email" => $email,
"gender" => $gender
);
// Execute the query using the execute method in dbUtils.php
execute($request, $data);
$create = getResult($request);
$request->closeCursor();
return $create;
    
}

function logout() {
  session_destroy();
  setcookie("user", $username, 0, "/", "", false, true);
}

function isLoggedIn() {
  if(isset($_SESSION["user"]) || isset($_COOKIE["user"])) {
    $_SESSION["user"] = $_COOKIE["user"];
    return true;
  };

  return false;
}

function login($username) {
  setcookie("user", $username, time() + 3600 * 24 * 7, "/", "", false, true);
  $_SESSION["user"] = $username;
}

function userInfo() {
  $user=array();
  if(!isLoggedIn()) {
    return null;
  }
  $username =  $_SESSION["user"];
  $DB=connect();
  $query="SELECT * FROM user WHERE username=:username";
  $request=$DB->prepare($query);
  $data=array(
    'username'=>$username,
  );
  execute($request,$data);
  $info = getResult($request);
 return $info;
}
?>