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
			"SELECT post.post_id, post.title, post.content, DATE_FORMAT(post.post_date, '%Y %m %d') AS 'post_date', user.user_name, post.likes_count, user.user_id
			 FROM post
			 INNER JOIN user
			 ON user.user_id=post.created_by
			 ORDER BY post.post_date DESC");
		return $this->pdo->resultset();
	}

	// Returns a single post
	public function getSingleArticle($post_id)
	{
		$this->pdo->query(
			"SELECT post.post_id, post.title, post.content, DATE_FORMAT(post.post_date, '%Y %m %d') AS 'post_date', user.user_name, post.likes_count
			 FROM post
			 INNER JOIN user
			 ON user.user_id=post.created_by
			 WHERE post_id = $post_id");
		return $this->pdo->resultset();
	}

	// adds a article to the database
	public function addArticle() {
		$title = isset($_POST['title']) ? $_POST['title'] : '';
		$date = date('Y-m-d H:i:s');
		$content = isset($_POST['content']) ? $_POST['content'] : '';
	 	$user_id = isset($_POST['user']) ? $_POST['user'] : '';
		//$user_id = 1; // get user_id from session

		$this->pdo->query(
			"INSERT INTO post (title, post_date, content, created_by)
			 VALUES ('$title', '$date', '$content', '$user_id')");

		$this->pdo->bind(':title', $title);
		$this->pdo->bind(':content', $content);
		$this->pdo->bind(':created_by', $user_id);

		$this->pdo->execute();
	}

	// get all the articles according to the user name
	public function getAllArticlesByUser($user_id) {
		$this->pdo->query(
			// ADD VALIDATION BY USER NAME
			"SELECT post.post_id, post.title, post.content, DATE_FORMAT(post.post_date, '%Y %m %d') AS 'post_date', post.likes_count
			 FROM post
			 WHERE post.created_by = $user_id
			 ORDER BY post.post_date DESC");
		return $this->pdo->resultset();
	}

	// get a single article when you click on it
	public function getSingleArticleByUser($post_id) {
		$this->pdo->query(
			// ADD VALIDATION BY USER NAME
			"SELECT post.post_id, post.title, post.content, DATE_FORMAT(post.post_date, '%Y %m %d') AS 'post_date', post.likes_count
			 FROM post
			 WHERE post_id = $post_id");
		return $this->pdo->resultset();
	}

	// edit the article according to the user name
	public function editArticleByUser($post_id, $title, $content) {
		$date = date('Y-m-d H:i:s');
		$this->pdo->query("UPDATE post SET title='$title', post_date='$date', content='$content' WHERE post_id='$post_id'");
		$this->pdo->execute();
	}

	// delete the article according to the user name
	public function deleteArticleByUser($post_id) {
		// $date = date('Y-m-d H:i:s');
		$this->pdo->query("DELETE FROM post WHERE post_id='$post_id'");

		$this->pdo->execute();
	}

	// ( "DELETE FROM articles WHERE id = :id LIMIT 1" )
	//
	// ("DELETE FROM articles WHERE id='%d'", $id)



	// gets likes for a post filtered by user id
	public function getLikesForPost($post_id, $user_id){
		$this->pdo->query(
			"SELECT user.user_name, post.likes_count, post.title
			FROM post
			INNER JOIN like_count
			ON post.post_id = like_count.post_id
			INNER JOIN user
			ON user.user_id = like_count.user_id
			WHERE user.user_id = $user_id
			AND post.post_id = $post_id");
		return $this->pdo->resultset();
	}

	public function getLikesCountForPost($post_id){
		$this->pdo->query(
			"SELECT post.likes_count
			FROM post
			WHERE post.post_id = $post_id
			");
		return $this->pdo->resultset();
	}

	// adds a like to a post and increments like_count in post table
	public function addLikeToPost($post_id, $user_id){
		$this->pdo->query(
			"INSERT INTO like_count(post_id, user_id)
			VALUES($post_id, $user_id)");

			$this->pdo->bind(':post_id', $post_id);
			$this->pdo->bind(':user_id', $user_id);

			$this->pdo->execute();

			$this->pdo->query(
				"UPDATE post
				SET post.likes_count = post.likes_count + 1
				WHERE post.post_id = $post_id"
			);
			$this->pdo->execute();
	}

	// removes a like from the database and decreases like_count in post table
	public function removeLikeFromPost($post_id, $user_id){
		$this->pdo->query(
			"DELETE FROM like_count
			WHERE like_count.post_id = $post_id AND like_count.user_id = $user_id
			");

			$this->pdo->execute();

			$this->pdo->query(
				"UPDATE post
				SET post.likes_count = post.likes_count - 1
				WHERE post.post_id = $post_id"
			);

			$this->pdo->execute();
	}
}
?>
