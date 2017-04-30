<?php
  require_once "dbconfig.php";
  require_once "models/articles.php";

  $link = db_connect();
  $articles = articlesAll($link);

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
  include_once "partials/articles.php";
  include_once "partials/footer.php";
?>
