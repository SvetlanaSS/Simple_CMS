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
			"SELECT post.post_id, post.title, post.content, post.post_date, user.user_name, post.likes_count
			 FROM post
			 INNER JOIN user
			 ON user.user_id=post.created_by
			 ORDER BY post.post_date DESC");
		return $this->pdo->resultset();
	}

	// get a single article when you click on it
	public function getSingleArticle($post_id)
	{
		$this->pdo->query(
			"SELECT post.post_id, post.title, post.content, post.post_date, user.user_name
			 FROM post
			 INNER JOIN user
			 ON user.user_id=post.created_by
			 WHERE post_id = $post_id");
		return $this->pdo->resultset();
	}

	// add a article
	public function addArticle() {
		$title = isset($_POST['title']) ? $_POST['title'] : '';
		$date = date('Y-m-d H:i:s');
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		$user_name = 1; // get user_id from session

		$this->pdo->query(
			"INSERT INTO post (title, post_date, content, created_by)
			 VALUES ('$title', '$date', '$content', '$user_name')");

		$this->pdo->bind(':title', $title);
		$this->pdo->bind(':content', $content);
		// $this->pdo->bind(':created_by', $user_name);

		$this->pdo->execute();

	}

	// get all the articles according to the user name
	public function getAllArticlesByUser() {
		$this->pdo->query(
			// ADD VALIDATION BY USER NAME
			"SELECT post.post_id, post.title, post.content, post.post_date
			 FROM post
			 ORDER BY post.post_date DESC");
		return $this->pdo->resultset();
	}

	// get a single article when you click on it
	public function getSingleArticleByUser($post_id) {
		$this->pdo->query(
			// ADD VALIDATION BY USER NAME
			"SELECT post.post_id, post.title, post.content, post.post_date
			 FROM post
			 WHERE post_id = $post_id");
		return $this->pdo->resultset();
	}

	// edit the article according to the user name
	public function editArticleByUser() {

	}

	// delete the article according to the user name
	public function deleteArticleByUser() {

	}

}
?>
