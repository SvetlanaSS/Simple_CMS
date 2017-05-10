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
		$id = isset($_POST['post_id']) ? $_POST['post_id'] : '';
		$title = isset($_POST['title']) ? $_POST['title'] : '';
		$date = date('Y-m-d H:i:s');
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		$user_name = 1; // get user_id from session

		$this->pdo->query(
			"UPDATE post SET title = $title, post_date = $date, content = $content, created_by = $user_name WHERE post_id = $id");

		$this->pdo->bind(':title', $title);
		$this->pdo->bind(':content', $content);
		// $this->pdo->bind(':created_by', $user_name);

		$this->pdo->execute();
	}



	/**
  * Вставляем текущий объект статьи в базу данных, устанавливаем его свойства.
  */
  public function insert() {
    // Есть у объекта статьи ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );
    // Вставляем статью
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO articles ( publicationDate, title, summary, content ) VALUES ( FROM_UNIXTIME(:publicationDate), :title, :summary, :content )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


/**
 * Обновляем текущий объект статьи в базе данных
 */
 public function update() {
	 // Есть ли у объекта статьи ID?
	 if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
	 // Обновляем статью
	 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	 $sql = "UPDATE articles SET publicationDate=FROM_UNIXTIME(:publicationDate), title=:title, summary=:summary, content=:content WHERE id = :id";
	 $st = $conn->prepare ( $sql );
	 $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
	 $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
	 $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
	 $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
	 $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
	 $st->execute();
	 $conn = null;
 }


	// delete the article according to the user name
	public function deleteArticleByUser() {

	}

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
