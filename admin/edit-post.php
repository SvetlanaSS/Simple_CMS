





<?php
  require_once '../includes/Database.php';
  require_once '../includes/error.php';
  require_once '../includes/helperFunctions.php';
  require_once '../includes/Article.php';

  $database = new Database();
  $articleModel = new Article($database);

  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\admin');
  $redirect = '';

  $articleModel->editArticleByUser();
  $redirect = 'myPage.php?addPostSuccess=true';
  header("Location: http://$host$uri/$redirect");
?>
