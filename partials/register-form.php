
        <form class="form-signin" action="admin/register.php" method="POST" name="registerform">
          <div class="form-group <?php if(isset($nameError)) { echo 'has-error'; } ?>">
           <label class="control-label" for="userName">Användarnamn *</label>
           <input type="login" class="form-control" name="userName" required>
           <span id="nameError" class="help-block"><?php if(isset($nameError)) { echo $nameError; } ?></span>
          </div>
          <div class="form-group">
            <label class="control-label" for="userPassword">Lösenord *</label>
            <input type="password" class="form-control" name="userPassword" required>
          </div>
          <div class="form-group <?php if(isset($emailError)) { echo 'has-error'; } ?>">
            <label class="control-label" for="userEmail">Email *</label>
            <input type="text" class="form-control" name="userEmail"  required>
             <span id="emailError" class="help-block"><?php if(isset($emailError)) { echo $emailError; } ?></span>
          </div>
          <div class="form-group">
            <span class="text-muted">Genom att skapa ett konto hos BlogLife godkänner du vårt användaravtal</span>
          </div>
          <hr>
          <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit">Registrera dig</input>
            <span><a href="#">Behöver du hjälp?</a></span>
            <span class="pull-right"><a href="#">En ny registrering</a></span>
          </div>
          <div class="form-group">
            <p class="regtext">Har du redan ett konto? <a href="login.php"> Logga in</a>!</p>
          </div>
        </form>
