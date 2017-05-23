<?php
  require_once 'includes/session.php';
  require_once 'includes/error.php';
  require_once 'includes/Database.php';
  require_once 'includes/Article.php';
  require_once 'includes/templates/ArticleTemplate.php';

  $database = new Database();
  $articleModel = new Article($database);
  $articleView = new ArticleTemplate();

  $post_id = $_GET['post_id'];

  $articleData = $articleModel->getSingleArticleByUser($post_id);

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
  ?>
  <div class="container top_header">
      <a href="myPage.php">Till alla inlägg</a>
      <h1>Se alla dina livshistorier här</h1>
      <div class="row">
        <?php
          echo $articleView->getOneArticleByUser($articleData);
        ?>
    </div>
  </div>

  <?php
  include_once "partials/footer.php";
?>
