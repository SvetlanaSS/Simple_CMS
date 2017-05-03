<?php
class ArticleTemplate
{
	public function getArticleList($articles)
	{
		$postList = '';
	    foreach ($articles as $article):

				$postList .= '<div class="article">' .
					'<h3>' . $article['name'] . '</h3>' .
					'<h5>' .
		        '<a href="post.php?post_id=' . $article["post_id"] . '">' . $article["title"] . '</a>' .
		      '</h5>' .
		      '<em>Date: ' . $article["date"] . '</em>' .
		      '<p>' . $article["content"] . '</p>';
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
					'<h3>' . $article['name'] . '</h3>' .
					'<h5>' . $article["title"] . '</h5>' .
		      '<em>Date:' . $article["date"] . '</em>' .
		      ' <p>' .  $article["content"] . '</p>' .
		    '</div>';
		return $chunk;
	}
}

?>
