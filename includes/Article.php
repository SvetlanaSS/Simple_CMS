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
}

?>