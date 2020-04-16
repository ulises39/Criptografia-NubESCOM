<?php
include 'shared_files_loader.php';

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
    <script language="JavaScript" type="text/javascript" src="js/aesb.js"></script>
	<script src="js/shared_files.js"></script>
    <script src="js/base64ArrayBuffer.js"></script>
    <script src="js/sjcl.js"></script>
    <script src="js/hash_functions.js"></script>
    <script src="js/bytes_functions.js"></script>

</head>
<body>
	<div>
		<a href="my_files.php" class="w3-btn w3-round-xxlarge w3-xlarge w3-highway-green w3-hover-deep-purple fas fa-angle-left" target="_self"> Back</a>
	</div>

	<div> 
		<h1>Files shared with me:</h1>
		<ul><?php echo $thelist; ?></ul>

		<div>
			<ul class="menu">
	        	<li class="menu-item" id="download">Download</li>
	        	<li class="menu-item" id="acc">Accept File</li>
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
</body>
</html>