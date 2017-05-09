<?php
require_once '../includes/error.php';
require_once '../includes/Database.php';
require_once '../includes/Article.php';

$database = new Database();
$articleModel = new Article( $database );

$post_id = isset($_GET['post_id']) ? $_GET['post_id'] : '';;
$page_from = isset($_GET['page_from']) ? $_GET['page_from'] : '';
$user_id = 5;

//echo 'like-post page';

if(empty($articleModel->getLikesForPost($post_id, $user_id))){
	$articleModel->addLikeToPost($post_id , $user_id );
	//echo 'You successfully liked this post.';
} else {
	$articleModel->removeLikeFromPost($post_id , $user_id );
	//echo 'You have already liked this post.';
}

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\admin');
$redirect = isset($_GET['page_from']) && $_GET['page_from'] == 'hej' ? 'post.php?post_id=' . $post_id : 'index.php';
//echo $host . '/' . $uri . '/' . $redirect ;
header("Location: http://$host$uri/$redirect");


?>