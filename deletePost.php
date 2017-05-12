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
      <h3 class="text-center login-title">Ta bort inlägg</h3>
      <p>Ditt inlägg kommer att tas bort. Är du säkert på att du vill ta bort inlägget?</p>
      <div class="text-center login-title">
        <form method="post" action="admin/delete-post.php">
          <a class="btn btn-info" href="admin/delete-post.php">ok</a>
          <a class="btn btn-info" href="myPage.php">cancel</a>
          <!-- <input class="btn btn-info" type="submit" value="Ja, ta bort" name="deletepost" onclick="if(confirm) return true"></input> -->
          <!-- <input class="btn btn-info" type="submit" value="Nej" name="cancel" onclick="if(confirm) return false"></input> -->
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  include_once "partials/footer.php";
?>
