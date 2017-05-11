<header>
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <span>BlogLife</span>
        </a>
      </div>
      <div id="navbarCollapse" class="collapse navbar-collapse">

      <?php // if logged in
      if (empty($_SESSION)){ ?>

        <ul class="nav navbar-nav navbar-right my-link">
          <li><a href="login.php" title="Login">Logga in</a></li>
          <li><a href="register.php" title="Reg">Registrera</a></li>
        </ul>     

      <?php // if not logged in
      }else{
        $user_name = isset($_SESSION['username']) ? $_SESSION['username'] : '';  ?>

        <ul class="nav navbar-nav navbar-right my-link">
          <li><a href="addPost.php" title="Nytt inlägg">Nytt inlägg</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $user_name;?>
            </a><span class="sr-only"></span>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <li><a href="myPage.php" title="Min Sida">Min sida</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="admin/logout-logic.php" title="Logga ut">Logga ut</a></li>
            </ul>
          </li>        
        </ul>

      <?php // end else
      }?>
      </div>
    </div>
  </div>
</header>