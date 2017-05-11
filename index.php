<?php
require_once 'includes/session.php';
require_once 'includes/error.php';
require_once 'includes/Database.php';
require_once 'includes/Article.php';
require_once 'includes/templates/ArticleTemplate.php';

$database = new Database();
$articleModel = new Article( $database );
$articleView = new ArticleTemplate();

// fetch articles from db
$articleData = $articleModel->getAllArticlesWithUserNames();

$user_welcome_message = '';
if (empty($_SESSION)){    
}else{
  //print_r($_SESSION);
  $user_name = isset($_SESSION['username']) ? $_SESSION['username'] : '';
  $user_welcome_message = isset($_SESSION['loggedIn']) ? '<h5>Välkommen ' .  $user_name . '</h5>' : '';    
}
?>
  <?php include_once "partials/head.php";?>
  <?php include_once "partials/navmenu.php"; ?> 

  <div class="container top_header">
    <?php echo  $user_welcome_message;?>
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