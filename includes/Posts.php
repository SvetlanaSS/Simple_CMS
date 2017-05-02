<?php

class Posts
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllPosts()
	{
		$this->pdo->query('SELECT title, content, date FROM post');
		return $this->pdo->resultset();
	}
}

?>