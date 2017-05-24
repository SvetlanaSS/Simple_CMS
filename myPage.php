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
  $user_id= $_SESSION['user_id'];
  //print_r($_SESSION);
  $articleData = $articleModel->getAllArticlesByUser($user_id);

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
?>
  <div class="container">
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
   </div> 

  <div class="container top_header">
    <form method="post" action="addPost.php">
      <input class="btn btn-success" type="submit" value="Nytt Inlägg" name="addnewpost"></input>
    </form>
    <h1>Min Sida</h1>
      <div class="row">
      <?php
        // print all articles
        echo $articleView->getArticlesListByUser($articleData, $articleModel);
      ?>
      </div>
  </div>

<?php
  include_once "partials/footer.php";
?>
