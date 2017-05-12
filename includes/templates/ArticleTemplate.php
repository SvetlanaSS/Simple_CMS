<?php
class ArticleTemplate
{
	public function getArticleList($articles, $model)
	{
		$postList = '';
	    foreach ($articles as $article):
			$like_button ='';
			if(isset($_SESSION['loggedIn'])){
				$like_button = '<a class="likes-link" href="admin/like-post.php?post_id=' . $article["post_id"] . '" data-id="' . $article["post_id"] .'">' .
			      		'<span class="likes"><i class="fa fa-heart"></i></span>' .
			      	'</a>';
			}else{
				$like_button = '<span class="likes"><i class="fa fa-heart"></i></span>';
			}

			$postList .= '<div class="article col-md-7" data-id="' . $article["post_id"] . '">' .
				'<h2 class="article-title">' .
	       		'<a href="post.php?post_id=' . $article["post_id"] . '">' . $article["title"] . '</a>' .
	     		'</h2>' .
			    '<div class="meta">' .
			      '<a class="author-link" href="#"><span class="article-author">' . $article['user_name'] .'</span></a>' .
			      '<span class="article-date">' . $article["post_date"] . '</span>' .
			      '<span class="article-author">' . $like_button . '</span>' .
			      '<span class="like-count">' . $article["likes_count"] . '</span>' .
			    '</div>' .
		      	'<div class="article-content">' .
			      	'<p>' . $article["content"] . '</p>' .
		  		'</div>' .
	    	'</div>';
		 endforeach;

		 return $postList;
	}

	public function getArticle($article)
	{
		$article = $article[0];

		if(isset($_SESSION['loggedIn'])){
				$like_button = '<a class="likes-link" href="admin/like-post.php?post_id=' . $article["post_id"] . '" data-id="' . $article["post_id"] .'">' .
			      		'<span class="likes"><i class="fa fa-heart"></i></span>' .
			      	'</a>';
		}else{
			$like_button = '<span class="likes"><i class="fa fa-heart"></i></span>';
		}

		$postList = '<div class="article col-md-7" data-id="' .$article["post_id"] . '">' .
		'<h2 class="article-title">' .
        	'<a href="post.php?post_id=' . $article["post_id"] . '">' . $article["title"] . '</a>' .
      	'</h2>' .
	      '<div class="meta">' .
	      	'<a class="author-link" href="#"><span class="article-author">' . $article['user_name'] .'</span></a>' .
	      	'<span class="article-date">' . $article["post_date"] . '</span>' .
	      	'<span class="article-author">' .
	      	$like_button .
	      	'<span class="like-count">' . $article["likes_count"] . '</span>' .
	      '</div>' .
  		'<div class="article-content">' .
      	'<p>' . $article["content"] . '</p>' .
		'</div>' .
    	'</div></div>';

		 return $postList;
	}

	public function getArticlesListByUser($articles) {
		$postList = '';
			foreach ($articles as $article):
				// ADD VALIDATION BY USER NAME
				$postList .= '<div class="article">' .
					'<h5>' .
						'<a href="myPagePost.php?post_id=' . $article["post_id"] . '">' . $article["title"] . '</a>' .
					'</h5>' .
					'<em>Date: ' . $article["post_date"] . '</em>' .
					'<p>' . mb_strimwidth($article["content"], 0, 250, "...") . '</p>' .
					'<div class="container">' .
						'<div class="row">' .
							'<a href="myPagePost.php?post_id=' . $article["post_id"] . '">' . 'Läs mer' . '</a>' . '&nbsp&nbsp&nbsp&nbsp&nbsp' .
							'<a href="editPost.php?post_id=' . $article["post_id"] . '">' . 'Redigera' . '</a>' . '&nbsp&nbsp&nbsp&nbsp&nbsp' .
							'<a>' . 'Ta bort' . '</a>' .
						'</div>' .
					'</div>' .
					'<hr>' .
				'</div>';
		 endforeach;
		 $postList .= '</div>';

		 return $postList;
	}

	public function getOneArticleByUser($article) {
		// ADD VALIDATION BY USER NAME
		$article = $article[0];
		$chunk = '';
		$chunk .= '<div class="article">' .
					'<h5>' . $article["title"] . '</h5>' .
		      '<em>Date:' . $article["post_date"] . '</em>' .
		      '<p>' .  $article["content"] . '</p>' .
					'<div class="container">' .
						'<div class="row">' .
							'<a>' . 'Redigera' . '</a>' . '&nbsp&nbsp&nbsp&nbsp&nbsp' .
							'<a>' . 'Ta bort' . '</a>' .
						'</div>' .
					'</div>' .
		    '</div>';
		return $chunk;
	}

	public function getDataPost($article) {
		$article = $article[0];
		$postData =
			'<form class="form-signin" action="admin/edit-post.php" method="POST" name="editpostform">' .
				'<div class="form-group">' .
					'<label class="control-label" for="title">Titel *</label>' .
					'<input type="text" class="form-control" name="title" autofocus required value="' . $article["title"] . '"' . '</input>' .
				'</div>' .
				'<div class="form-group">' .
					'<label class="control-label" for="content">Text *</label>' .
					'<textarea class="form-control" name="content" required>' . $article["content"] . '</textarea>' .
				'</div>' .
				'<div class="form-group">' .
					'<input class="btn btn-primary btn-block" type="submit" value="Redigera post"></input>' .
				'</div>' .
			'</form>';

		return $postData;
	}

}
?>
