<?php
include 'my_files_loader.php';

?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="CSSNubESCOM/css/my_files.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/jsbn.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/random.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/hash.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/rsa.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/aes.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/api.js"></script>
	<script> var nombre_sesion = "<?php echo $estado ?>";</script>
	<script src="js/my_files.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/aesb.js"></script>
    <script src="js/base64ArrayBuffer.js"></script>
    <script src="js/sjcl.js"></script>
    <script src="js/hash_functions.js"></script>
    <script src="js/bytes_functions.js"></script>

    <!--Para el "modal" (pop up que recibe valores(?) )--
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	-->
</head>
<body>
	<div>
		<a href="pagina.php" class="w3-btn w3-round-xxlarge w3-xlarge w3-highway-green w3-hover-deep-purple fas fa-angle-left" target="_self"> Back</a>
	</div>
	<div>
		<a href="shared_files.php" >Files shared with me</a>
	</div>

	<div> 
		<h1>My files:</h1>
		<ul><?php echo $thelist; ?></ul>
		<div>
			<ul class="menu">
	        	<li class="menu-item" id="download">Download</li>
	        	<li class="menu-item" id="share">Share</li>
	        	<li class="menu-item" id="delete">Delete</li>
	    	</ul>
    	</div>
	</div>

	<h3 id="status"></h3>

	<div>
		<div id="download-ui-container">
			<div id="start-download">Starting Download..</div>
			<div id="download-progress-container">
				<div id="download-progress"></div>
			</div>
			<a id="save-file">Save File</a>
		</div>
	</div>

	<!-- Modal. Podría utilizarse
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">    
	      <div class="modal-content">
	        <div class="modal-header" style="padding:35px 50px;">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4><span class="glyphicon glyphicon-lock"></span>Who are you sending this file?</h4>
	        </div>
	        <div class="modal-body" style="padding:40px 50px;">
	          <form role="form">
	            <div class="form-group">
	              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
	              <input type="text" class="form-control" id="usrname" placeholder="Enter user">
	            </div>
	              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Send!</button>
	          </form>
	        </div>
	        <div class="modal-footer">
	          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
	        </div>
	      </div>      
	    </div>
	  </div>
	-->

</body>

</body>
</html>

