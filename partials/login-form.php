<div class="container top_header">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <h1 class="text-center login-title">Logga in</h1>
      <hr>
      <div class="account-wall">
        <form class="form-signin" action="./admin/login-logic.php" method="post" name="registerform">
          <div class="form-group <?php if(isset($_GET['error_message']) && $_GET['error_message'] == 'nouser') { echo 'has-error'; } ?>">
            <input name="username" type="login" class="form-control" placeholder="Användarnamn" required autofocus>
             <span id="nameError" class="help-block"><?php if(isset($_GET['error_message']) && $_GET['error_message'] == 'nouser') { echo 'Ingen användare med det namnet finns. Försök igen.'; } ?></span>
          </div>
          <div class="form-group <?php if(isset($_GET['error_message']) && $_GET['error_message'] == 'passinvalid') { echo 'has-error'; } ?>">
            <input name="password" type="password" class="form-control" placeholder="Lösenord" required autofocus>
            <span id="emailError" class="help-block"><?php if(isset($_GET['error_message']) && $_GET['error_message'] == 'passinvalid') { echo 'Lösenordet du angett är fel. Vänligen försök igen.'; } ?></span>            
          </div>
          <hr>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="submit">Logga in</button>
          </div>
          <div class="form-group">
            <p class="regtext">Har du inget konto? <a href="register.php"> Registrera dig</a>!</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>