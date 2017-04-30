<?php

  ini_set("display_errors", 1);
  ini_set("display_startup_errors", 1);
  error_reporting(E_ALL);

  date_default_timezone_set( "Europe/Stockholm" );

  define("db_host", "localhost"); //local server name default localhost
  define("db_user", "root"); //mysql username default is root
  define("db_password", "root"); //mysql password default is root
  define("db_name", "simple_cms"); //database name which we created

  function db_connect(){
      $link = mysqli_connect(db_host, db_user, db_password, db_name)
          or die ("Connection Failed. Please try later".mysqli_error($link));
      if (!mysqli_set_charset($link, "utf8")){
          printf("Connection Failed. Please try later".mysqli_error($link));}
      return $link;
  }

?>
