(function( root, $, undefined ) {
	'use strict';

	$(function () {
		// DOM ready, take it away
		console.log('Document Ready');
		var currentpost;

		$('.likes-link').on('click', function(event) {
			event.preventDefault();
			setCurrentPost($(this).data('id'));
			getLikeCount($(this).data('id'));
		});

		/**
		 * 
		 */ 
		var setCurrentPost = function(post){
			currentpost = post;
		};

		/**
		 * 
		 */ 
		var getCurrrentPost = function(){
			return currentpost;
		};		

		/**
		 * 
		 */ 
		var getLikeCount = function(postId) {
			var requestOptions = {
				'post_id': postId
			}; 					
			ajaxFetch.getDataFromApi('http://localhost:8888/simple-cms-group/Simple_CMS/admin/like-post.php?', ajaxFetch.jsonToURI(requestOptions), handlePostLike, false);		
		};	

		/**
		 * 
		 */ 
		var handlePostLike = function(result) {
			$(`a[data-id="${getCurrrentPost()}"]`).closest('.meta').find('span.like-count').html(result.likes_count);
		};	


	});
} ( this, jQuery ));