        <form class="form-signin" action="admin/new-post.php" method="POST" name="newpostform">
          <div class="form-group">
            <label class="control-label" for="title">Titel *</label>
            <input type="text" class="form-control" name="title" autofocus required>
          </div>
          <div class="form-group">
            <label class="control-label" for="content">Text *</label>
            <textarea class="form-control" name="content" required rows="10"></textarea>
          </div>
          <?php
          if (empty($_SESSION)){    
          }else{
            //print_r($_SESSION);?>
            <input type="hidden" name="user" value="<?php echo $_SESSION['user_id'];?>">   
          <?php  
          }?>
          <div class="form-group">
            <input class="btn btn-success btn-block" type="submit" value="Publicera"></input>
          </div>
        </form>
