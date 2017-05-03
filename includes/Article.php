<?php

class Article
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	// public function getAllArticles()
	// {
	// 	$this->pdo->query('SELECT * FROM post');
	// 	return $this->pdo->resultset();
	// }


	// get all posts combined with user names
	public function getAllArticlesWithUserNames()
	{
		$this->pdo->query(
			"SELECT post.post_id, post.title, post.content, post.date, user.name
			 FROM post
			 INNER JOIN user
			 ON user.user_id=post.created_by");
		return $this->pdo->resultset();
	}

	public function getSingleArticle($post_id)
	{
		$this->pdo->query(
			"SELECT post.post_id, post.title, post.content, post.date, user.name
			 FROM post
			 INNER JOIN user
			 ON user.user_id=post.created_by
			 WHERE post_id = $post_id");
		return $this->pdo->resultset();
	}
}

?>
