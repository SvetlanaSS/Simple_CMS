<?php
  require_once "dbconfig.php";
  require_once "models/articles.php";

  $link = db_connect();
  $articles = articlesAll($link);

  require_once "includes/Database.php";
  require_once "includes/Posts.php";
  $database = new Database();
  $posts = new Posts( $database );

  var_dump($posts->getAllPosts());

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
  include_once "partials/articles.php";
  include_once "partials/footer.php";
?>
