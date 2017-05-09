<?php
class ArticleTemplate
{
	public function getArticleList($articles)
	{
		$postList = '';
	    foreach ($articles as $article):
				$postList .= '<div class="article">' .
					'<h3>' . $article['user_name'] . '</h3>' .
					'<h5>' .
		        '<a href="post.php?post_id=' . $article["post_id"] . '">' . $article["title"] . '</a>' .
		      '</h5>' .
		      '<em>Date: ' . $article["post_date"] . '</em>' .
		      '<p>' . $article["content"] . '</p>' .
					'<hr>' .
		    '</div>';
		 endforeach;
		 $postList .= '</div>';

		 return $postList;
	}

	public function getArticle($article)
	{
		$article = $article[0];
		$chunk = '';
		$chunk .= '<div class="article">' .
					'<h3>' . $article['user_name'] . '</h3>' .
					'<h5>' . $article["title"] . '</h5>' .
		      '<em>Date:' . $article["post_date"] . '</em>' .
		      '<p>' .  $article["content"] . '</p>' .
		    '</div>';
		return $chunk;
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

}

?>
