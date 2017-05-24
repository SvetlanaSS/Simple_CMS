<?php
  require_once 'includes/Database.php';

  $database = new Database();

  include_once "partials/head.php";
  include_once "partials/navmenu.php";
?>
  <?php if(isset($_GET['registerSuccess'])):?>
    <div class="container">
      <div class="alert alert-info">
        <p>Du är nu registrerad! Logga in för att posta ditt första inlägg!</p>
      </div>
    </div>
  <?php endif;?>  

<?php
  include_once "partials/login-form.php";

  include_once "partials/footer.php";
?>
