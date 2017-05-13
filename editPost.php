<?php
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
  include_once "partials/navmenuLoggedIn.php";
?>

	<div class="container top_header">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-md-offset-3">
        <a href="myPage.php">Till alla inlägg</a>
	      <h1 class="text-center login-title">Redigera post</h1>
        <hr>
        <div class="account-wall">
          <?php
            echo $articleView->getDataPost($articleData);
          ?>
        </div>
      </div>
    </div>
  </div>

<?php
  include_once "partials/footer.php";
?>
