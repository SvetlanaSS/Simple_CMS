<?php
  require_once 'includes/session.php';
  require_once 'includes/error.php';
  require_once 'includes/Database.php';
  require_once 'includes/Article.php';
  require_once 'includes/templates/ArticleTemplate.php';

  $database = new Database();
  $articleModel = new Article($database);
  $articleView = new ArticleTemplate();

  // fetch articles from db
  $articleData = $articleModel->getAllArticlesByUser();

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
?>
  <?php if(isset($_GET['addPostSuccess'])):?>
    <div class="alert alert-info">
      <p>Ditt inlägg har lagts till</p>
    </div>
  <?php endif;?>

  <?php if(isset($_GET['editPostSuccess'])):?>
    <div class="alert alert-info">
      <p>Ditt inlägg har redigerats</p>
    </div>
  <?php endif;?>

  <?php if(isset($_GET['deletePostSuccess'])):?>
    <div class="alert alert-info">
      <p>Ditt inlägg togs bort</p>
    </div>
  <?php endif;?>

  <div class="container top_header">
    <form method="post" action="addPost.php">
      <input class="btn btn-primary" type="submit" value="Lägga till post" name="addnewpost"></input>
    </form>
    <h1>Se alla dina livshistorier här</h1>
    <?php
      // print all articles
      echo $articleView->getArticlesListByUser($articleData);
    ?>
  </div>

<?php
  include_once "partials/footer.php";
?>
