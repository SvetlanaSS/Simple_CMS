<?php
require_once 'includes/error.php';
require_once 'includes/formValidation.php';

include_once "partials/head.php";
include_once "partials/navmenu.php";

$nameError = isset($_GET['nameError']) ? $_GET['nameError'] : '';
$emailError = isset($_GET['emailError']) ? $_GET['emailError'] : '';
//$emailVal = isset($_GET['emailValMsg']) ? $_GET['emailValMsg'] : '';

?>
<div class="container top_header">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <h1 class="text-center login-title">Registrera dig för att posta inlägg</h1>
      <hr>
      <div class="account-wall">     
      	<?php include_once "partials/register-form.php";?>   
      </div>
    </div>
  </div>
</div>

<?php
  include_once "partials/footer.php";
?>