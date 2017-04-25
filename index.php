<?php
  //require_once 'includes/session.php';
  require_once 'includes/error.php';
  require_once 'includes/Database.php';
  require_once 'includes/Article.php';
  require_once 'includes/templates/ArticleTemplate.php';

  $database = new Database();
  $articleModel = new Article( $database );
  $articleView = new ArticleTemplate();

  // fetch articles from db
  $articleData = $articleModel->getAllArticlesWithUserNames();

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
?>

  <div class="container top_header">
    <h1>Dela dina livshistorier här</h1>
    <div class="row">
      <?php
        // print all articles
        echo $articleView->getArticleList($articleData, $articleModel);
      ?>
    </div>
  </div>

<?php
  include_once "partials/footer.php";
?>
