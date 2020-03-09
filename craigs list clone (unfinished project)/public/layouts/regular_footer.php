<!--regular footer-->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheets/index_style.css" />
	</head>
	<div id="footer">
<div id="footercontent">
<?php echo date("Y", time()); ?>, Pixai
</div>
</div>
<?php if(isset($database)) { $database->close_connection(); } ?>