<?php
session_start();
include_once(__DIR__."/./userUtils.php");

function hasArticleError() {
  return isset($_GET["articleError"]);
}

function getArticleError() {
  return $_GET["articleError"];
}

function hasArticle() {
    return isset($_GET["article"]);
  }
  
  function getArticle() {
    return $_GET["article"];
  }

function getArticles() {
  $key = getArticleKey();

  if(!isset($_COOKIE[$key])) {
    return Array();
  }
  

  return unserialize($_COOKIE[$key]);
}
//var_dump(getArticles());

function getAllArticles() {
    $mysql=connect();
    $query="SELECT title,content,date FROM article ORDER BY article.date DESC limit 5 offset 2";
    $request=$mysql->prepare($query); /* retourne un objet qui est un pointeur
    de notre requête préparé*/
    execute($request);
    $arrayArticle = getResult($request);
    $request->closeCursor();
    return $arrayArticle;
}
function setArticles($articles) {
$key = getArticleKey();
setcookie($key, serialize($articles), time() + 24 * 3600 * 7, "/", "", false, true);
}

function getUserArticle($username) {
    $mysql=connect();
    $query="SELECT title,content,date FROM article JOIN user ON article.user_id = user.id WHERE user.username=:username";
    $request=$mysql->prepare($query); /* retourne un objet qui est un pointeur
    de notre requête préparé*/
    $data = array( 
        "username" => $username
    );
    execute($request,$data);
    $arrayArticle = getResult ($request);
    $request->closeCursor();
    return $arrayArticle;
}

function getArticleKey() {
  $info = userInfo();
  $username = $info["username"];
  $key = "articles_$username";

  return $key;
}

function clearArticles() {
  $key = getArticleKey();
  setArticles([]);
}

// function getUserId($username){
//     $mysql=connect();
//     $query='SELECT id FROM user where username=:username';
//     $request=$mysql->prepare($query);
//     while($donnees = $request->fetchAll()){
//         echo $donnees['id'];
//     }
//     var_dump($donnees['id']);
//     $user=array(
//         "id"=> $userId
//     );
//     array_push($user,$userId);
//     return $userId;
// }
//getUserId('jdoe');

function insertArticle($userId,$titre,$contenu){
    $mysql=connect();
    //$userId = getUserId($username);
    $query='INSERT INTO article(user_id,title,content,date) VALUES (:userId,:titre,:contenu,NOW())';
    $request=$mysql->prepare($query);
    $data=array(    
        'userId' => $userId,
        'titre'=>$titre,
        'contenu'=>$contenu
    );
    execute($request,$data);
    $insert = getResult($request);
    $request->closeCursor();
    return $insert;
}


function deleteArticleUser($userid) {
    $mysql = connect();
    $userid=intval($userid);
    var_dump($userid);
    $query = 'DELETE article WHERE user_id=:id';
    $request = $mysql->prepare($query);
    $data = array(
    "id" => $userid
    );
    execute($request,$data);
    $delete = getResult($request);
        $request->closeCursor();
        return $delete;
    }
    //deleteArticleUser($userid);
?>