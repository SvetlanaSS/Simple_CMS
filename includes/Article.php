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
		$date = isset($_POST['date']) ? $_POST['date'] : '';
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		$userName = isset($_POST['userName']) ? $_POST['userName'] : '';

		$this->pdo->query('INSERT INTO post (title, date, content, created_by) VALUES (:title, :date, :content, :created_by)');

		$this->pdo->bind(':title', $title);
		$this->pdo->bind(':date', $date);
		$this->pdo->bind(':content', $content);
		$this->pdo->bind(':created_by', $userName);

		$this->pdo->execute();

	}
	
}


?>
