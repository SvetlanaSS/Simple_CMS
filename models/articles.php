<?php

  // En funktion som tar emot alla posts från databasen
  function articlesAll($link) {
    // Skapa ett anrop till databasen
    $query = "SELECT * FROM post ORDER BY post_id DESC";
    $result = mysqli_query($link, $query);

    // Om ett fel uppstått, ska anporet stoppas
    if(!$result) {
      die(mysqli_error($link));
    };

    // Om inget fell finns, ska vi ta emot information. Man skapar ett antal rader ($number) som returneras från databasen
    $number = mysqli_num_rows($result);
    $articles = array();

    // Lägga till informationen (som vi fick från databasen) till array
    for ($i = 0; $i < $number; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;
  }


  // En funktion som får en post som man klickas på
  function articleGet($link, $id_article) {
    $query = sprintf("SELECT * FROM post WHERE post_id=%d", (int)$id_article);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $article = mysqli_fetch_assoc($result);

    return $article;
  }




  function articleNew($title, $date, $content) {

  }

  function articleEdit($id, $title, $date, $content) {

  }

  function articleDelete($id) {

  }

?>
