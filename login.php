<?php
  require_once 'includes/Database.php';

  $database = new Database();

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
?>
  <?php if(isset($_GET['registerSuccess'])):?>
    <div class="alert alert-info">
      <p>Registration was successful! Log in to start blogging!</p>
    </div>
  <?php endif;?>  

<?php
  include_once "partials/login.php";

  include_once "partials/footer.php";
?>
