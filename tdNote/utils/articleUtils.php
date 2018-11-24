<?php
session_start();
include_once(__DIR__ . "/./userUtils.php");

function hasArticleError()
{
  return isset($_GET["articleError"]);
}

function getArticleError()
{
  return $_GET["articleError"];
}

function hasArticle()
{
  return isset($_GET["article"]);
}

function getArticle()
{
  return $_GET["article"];
}

function getArticles()
{
  $key = getArticleKey();

  if (!isset($_COOKIE[$key])) {
    return array();
  }


  return unserialize($_COOKIE[$key]);
}


function getAllArticles()
{
  $mysql = connect();

  $query = "SELECT title,content,date,username,article.id FROM article LEFT JOIN user ON user.id=article.user_id ORDER BY article.date DESC limit 5 offset 0";
  $request = $mysql->prepare($query); /* retourne un objet qui est un pointeur
    de notre requête préparé*/
  execute($request);
  $arrayArticle = getResult($request);
  $request->closeCursor();
  return $arrayArticle;
}
getAllArticles();


function setArticles($articles)
{
  $key = getArticleKey();
  setcookie($key, serialize($articles), time() + 24 * 3600 * 7, "/", "", false, true);
}

function getUserArticle($username)
{
  $mysql = connect();
  $query = "SELECT title,content,date,username FROM article JOIN user ON article.user_id = user.id WHERE user.username=:username";
  $request = $mysql->prepare($query); /* retourne un objet qui est un pointeur
    de notre requête préparé*/
  $data = array(
    "username" => $username
  );
  execute($request, $data);
  $arrayArticle = getResult($request);
  $request->closeCursor();
  return $arrayArticle;
}

function getArticleKey()
{
  $info = userInfo();
  $username = $info["username"];
  $key = "articles_$username";

  return $key;
}

function clearArticles()
{
  $key = getArticleKey();
  setArticles([]);
}

function insertArticle($userId, $titre, $contenu)
{
  $mysql = connect();
  $query = 'INSERT INTO article(user_id,title,content,date) VALUES (:userId,:titre,:contenu,NOW())';
  $request = $mysql->prepare($query);
  $data = array(
    'userId' => $userId,
    'titre' => $titre,
    'contenu' => $contenu
  );
  execute($request, $data);
  $insert = getResult($request);
  $request->closeCursor();
  return $insert;
}

function deleteArticleUser($userid)
{
  $mysql = connect();
  $userid = intval($userid);
  $query = 'DELETE FROM article WHERE id=:id';
  $request = $mysql->prepare($query);
  $data = array(
    "id" => $userid
  );
  execute($request, $data);
  $delete = getResult($request);
  $request->closeCursor();
  return $delete;
}

?>