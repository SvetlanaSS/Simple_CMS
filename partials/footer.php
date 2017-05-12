    <footer>
      <p>Skapad av BlogLife<br>Copyright &copy; 2017</p>
    </footer>
  </div>
  <!-- jQuery plugin -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <!-- A flexible loading overlay jQuery Plugin -->
  <script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.loadingoverlay/latest/loadingoverlay_progress.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <?php
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\admin');
	$ajaxUrl = $host . '/' . $uri . '/';
	$ajaxParamsObject = array(
	    'ajaxUrl' => $ajaxUrl
	);	
  ?>
  <script type="text/javascript">
  	var apiParams = <?php echo json_encode($ajaxParamsObject);?> ;	
  </script>
  <script src="js/ajax-fetch.js"></script>
  <script src="js/main.js"></script>  
</body>
</html>
