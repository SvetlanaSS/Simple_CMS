/*jshint esversion: 6 */
console.log('---View');

/**
 * The main view.
 * Revealing Module Pattern
 * 
 */
var view = (function() {

	var _currentPost;
	var _apiUrl;

	/**
	 * Init function
	 */ 
	var init = function(){
		_addPageLinkHandlers();
		setApiUrl(apiParams.ajaxUrl);		
	};

	/**
	 * Add event handlers to links
	 */ 
	var _addPageLinkHandlers = function(){
		Array.prototype.slice.call(document.querySelectorAll('.likes-link'))
		.forEach(function(link){
			link.addEventListener('click', likesLinkOnClick, false);
		});		
	};	

	var likesLinkOnClick = function(e){
		e.preventDefault();
		setCurrentPost(this.dataset.id);
		getLikeCount(this.dataset.id);
		//console.log(getCurrentPost());
	};

	/**
	 * 
	 */ 
	var setApiUrl = function(apiUrl){
		 _apiUrl = apiUrl;
	};

	/**
	 * 
	 */ 
	var getApiUrl= function(){
		return _apiUrl;
	};	

	/**
	 * 
	 */ 
	var setCurrentPost = function(post){
		_currentPost = post;
	};

	/**
	 * 
	 */ 
	var getCurrentPost = function(){
		return _currentPost;
	};		

	/**
	 * 
	 */ 
	var getLikeCount = function(postId) {
		var requestOptions = {
			'post_id': postId
		}; 					
		ajaxFetch.getDataFromApi('http://' + getApiUrl() + 'admin/like-post.php?', ajaxFetch.jsonToURI(requestOptions), handlePostLike, false);		
	};	

	/**
	 * 
	 */ 
	var handlePostLike = function(result) {
		console.log(getCurrentPost());
		$(`a[data-id="${getCurrentPost()}"]`).closest('.meta').find('span.like-count').html(result.likes_count);
	};	

	/**
	 * Show error alert box
	 */
	var showErrorAlert = function(error){
		document.querySelector('.ajax-error-container').classList.remove('hidden');
		document.querySelector('.ajax-error-container .container').innerHTML = alertBox(`<strong>Oh snap!</strong> There was an error when fetching the content. Please try again later. <small><em>${error}</em></small>`);
	};	

	/**
	 * Hide error alert box
	 */
	var closeErrorAlert = function(){
		document.querySelector('.ajax-error-container').classList.add('hidden');
		if(document.querySelector('.ajax-error-container .alert-warning') || ''){
			document.querySelector('.ajax-error-container .alert-warning').alert('close');
		}
	};		

	/**
	 * Show spinner icon
	 */
	var showLoadingSpinner = function(){
		document.querySelector('.ajax-load-indicator-container').classList.remove('hidden');
	};

	/**
	 * Hide spinner icon
	 */
	var hideLoadingSpinner = function(){
		document.querySelector('.ajax-load-indicator-container').classList.add('hidden');
	};	

	/**
	 * Template for alertbox
	 * {String} message - the alert message
	 * {String} alertClass - classname of the alert
	 */
	var alertBox = (message, alertClass="alert-warning") =>{
		return `
		  <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      <span aria-hidden="true">&times;</span>
		    </button>      
		    <div class="alert-message">${message}</div>
		  </div> 
		`;
	};	

	/**
	 * Delays the fadeInContent function
	 * {String} className - className to element to fade
	 */
	var delayFadeInContent = function(className) {
	  	//window.setTimeout(FadeInAlbums, 200);
		window.setTimeout(function() {
		    fadeInContent(className);
		}, 200);	  
	};

	/**
	 * Fade in element by adding show class. 
	 * {String} className - className to element to fade
	 */	
	 var fadeInContent = function(className){
		Array.prototype.slice.call(document.querySelectorAll(className))
		.forEach(function(album){
			album.classList.add('show');
		});	
	};	


    // Reveal public pointers to
    // private functions and properties
    return {
		init: init(),
		getCurrentPost: getCurrentPost,
		setCurrentPost: getCurrentPost,
		showErrorAlert: showErrorAlert,
		closeErrorAlert: closeErrorAlert,
		alertBox: alertBox,
		showLoadingSpinner: showLoadingSpinner,
		hideLoadingSpinner: hideLoadingSpinner,
		delayFadeInContent: delayFadeInContent,
		fadeInContent: fadeInContent,
		getLikeCount: getLikeCount,
		setApiUrl: setApiUrl,
		getApiUrl: getApiUrl,		
    };	
})();


(function( root, $, undefined ) {
	'use strict';

	$(function () {
		// DOM ready, take it away
		console.log('Document Ready');


	});
} ( this, jQuery ));