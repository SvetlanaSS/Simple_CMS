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

  if(isset($_POST['submit'])){
    $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : '';
    // $title = isset($_POST['title']) ? $_POST['title'] : '';
    // $content = isset($_POST['content']) ? $_POST['content'] : '';
    $articleModel->deleteArticleByUser($post_id);
    $redirect = 'myPage.php?deletePostSuccess=true';
    header("Location: http://$host$uri/$redirect");
  } else {
    echo "Error bla bla!";
  }
?>
