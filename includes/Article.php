<?php

class Article
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllArticles()
	{
		$this->pdo->query('SELECT * FROM post');
		return $this->pdo->resultset();
	}

	public function getSingleArticle($post_id)
	{
		$this->pdo->query("SELECT * FROM post WHERE post_id = $post_id");
		return $this->pdo->resultset();
	}	
}

?>