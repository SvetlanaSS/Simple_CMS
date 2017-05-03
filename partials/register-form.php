<div class="container top_header">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <h1 class="text-center login-title">Registrera dig för att posta inlägg</h1>
      <hr>
      <div class="account-wall">
        <form class="form-signin" action="admin/register.php" method="POST" name="registerform">
          <div class="form-group">
            <input type="login" class="form-control" name="userName" placeholder="Användarnamn" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="userPassword" placeholder="Lösenord" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="userEmail" placeholder="Email adress" required autofocus>
          </div>
          <div class="form-group">
            <span>Genom att skapa ett konto hos BlogLife godkänner du vårt användaravtal</span>
          </div>
          <hr>
          <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit">Registrera sig</input>
            <span><a href="#">Behöver du hjälp?</a></span>
            <span class="pull-right"><a href="#">En ny registrering</a></span>
          </div>
          <div class="form-group">
            <p class="regtext">Har du redan ett konto? <a href="login.php"> Logga in</a>!</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
