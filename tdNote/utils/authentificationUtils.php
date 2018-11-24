<?php

function hasAuthenticationError()
{
  return isset($_GET["authError"]);
}

function getAuthenticationError()
{
  return $_GET["authError"];
}

?>