<?php
  require_once "dbconfig.php";
  require_once "models/articles.php";

  $link = db_connect();
  $article = articleGet($link, $_GET["post_id"]);

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
  include_once "partials/article.php";
  include_once "partials/footer.php";
?>
