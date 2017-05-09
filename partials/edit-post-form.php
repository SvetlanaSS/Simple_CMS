      <form class="form-signin" action="admin/edit-post.php" method="POST" name="editpostform">
        <div class="form-group">
          <label class="control-label" for="title">Titel *</label>
          <input type="text" class="form-control" name="title" autofocus required value="<?php
            echo htmlspecialchars ($article['title'])?>">
        </div>
        <div class="form-group">
          <label class="control-label" for="content">Text *</label>
          <textarea class="form-control" name="content" required value="<?php
            echo $article['content'];?>"></textarea>
        </div>
        <div class="form-group">
          <input class="btn btn-primary btn-block" type="submit" value="Redigera post"></input>
        </div>
      </form>
