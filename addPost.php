<?php
require_once 'includes/error.php';

include_once "partials/head.php";
include_once "partials/navmenu.php";

?>
<div class="container top_header">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <h1 class="text-center login-title">Lägga till post</h1>
      <hr>
      <div class="account-wall">
      	<?php include_once "partials/add-post-form.php";?>
      </div>
    </div>
  </div>
</div>

<?php
  include_once "partials/footer.php";
?>
