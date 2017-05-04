<?php
  require_once 'includes/Database.php';
  require_once 'includes/Article.php';
  require_once 'includes/templates/ArticleTemplate.php';

  $database = new Database();
  $articleModel = new Article( $database );
  $articleView = new ArticleTemplate();

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
?>
  <?php if(isset($_GET['addPostSuccess'])):?>
    <div class="alert alert-info">
      <p>Ditt inlägg har lagts</p>
    </div>
  <?php endif;?>

<?php

  include_once "partials/footer.php";
?>
