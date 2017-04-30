<div class="container top_header">
  <h1>Dela sina livshistorier här</h1>
  <div>
    <?php foreach ($articles as $article): ?>
    <div class="article">
      <h3>
        <a href="post.php?post_id=<?=$article["post_id"]?>"><?=$article["title"]?></a>
      </h3>
      <em>Date: <?=$article["date"]?></em>
      <p><?=$article["content"]?></p>
    </div>
  <?php endforeach ?>
  </div>
