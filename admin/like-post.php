<?php
require_once '../includes/session.php';
require_once '../includes/error.php';
require_once '../includes/helperFunctions.php';
require_once '../includes/Database.php';
require_once '../includes/Article.php';

$database = new Database();
$articleModel = new Article( $database );

$post_id = isset($_GET['post_id']) ? $_GET['post_id'] : '';;
$page_from = isset($_GET['page_from']) ? $_GET['page_from'] : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if($post_id !== ''){
	// If user has liked the post unlike, else add like
	if(empty($articleModel->getLikesForPost($post_id, $user_id))){
		$articleModel->addLikeToPost($post_id , $user_id );
	} else {
		$articleModel->removeLikeFromPost($post_id , $user_id );
	}


	$likes_count = 0;
	// get updated value from post table and echo out
	if(! empty($articleModel->getLikesCountForPost($post_id))){
		$likes_count = $articleModel->getLikesCountForPost($post_id)[0]['likes_count'];
	}

	$request_options = array(
	    'likes_count' => $likes_count,
	    'user_id' => $user_id,
	    'post_id' => $post_id  
	); 

	//header('content-type:application/json');
	$json = json_encode($request_options);
	echo $json;
}

/*
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\admin');
$redirect = isset($_GET['page_from']) && $_GET['page_from'] == 'hej' ? 'post.php?post_id=' . $post_id : 'index.php';
header("Location: http://$host$uri/$redirect");
*/
?>