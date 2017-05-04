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

	public function addArticle() {
		$title = isset($_POST['title']) ? $_POST['title'] : '';
		$date = date('Y-m-d H:i:s');
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		$user_name = 1; // get user_id from session

		$this->pdo->query(
			"INSERT INTO post (title, date, content, created_by)
			 VALUES ('$title', '$date', '$content', '$user_name')");

		$this->pdo->bind(':title', $title);
		$this->pdo->bind(':content', $content);
		// $this->pdo->bind(':created_by', $user_name);

		$this->pdo->execute();

	}

}


?>
