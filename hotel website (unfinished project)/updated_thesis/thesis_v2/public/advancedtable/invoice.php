<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Advanced Table Example</title>
<script src="js/jquery.js" type="text/javascript" language="javascript"></script>
<script src="js/advancedtable.js" type="text/javascript" language="javascript"></script>
<script language="javascript" type="text/javascript">
	$().ready(function() {
		$("#searchtable").show();
		$("#table1").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "images/up.png", descImage: "images/down.png"});
	});
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/advancedtable.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topbanner">
<div class="content"> Advanced Table Example</div>
</div>
<div id="wrapper">
  <div id="maincontent">
    <div class="half left">
     <table width="100%" class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none;">
       <tr>
         <td width="27%"><input name="search" type="text" id="search" style="display:none;" /></td>
         <td width="73%"><div id="loader" style="display:none;"><img src="loader.gif" alt="Laoder" /></div></td>
       </tr>
     </table>
    <table width="100%" id="table1" class="advancedtable" border="0" cellspacing="0" cellpadding="0">
		 <thead>
		   <tr>
			 <th>ID</th>
			 <th>Username</th>
			 <th>Place</th>
			 <th>Print</th>
		   </tr>
		 </thead>
			<?php $guests=Guest::find_all();?>
				<tbody>
				<?php foreach($guests as $guest): ?>
				   <tr>
						 <td><?php echo $guest->id; ?></td>
						 <td><?php echo $guest->first_name; ?></td>
						 <td><?php echo $guest->last_name; ?></td>
						 <td><a href="print_invoice.php?id=<?php echo $guest->id; ?>">Print Invoice</a></td>
				   </tr>
				   <?php endforeach; ?>
				</tbody>
				
     </table>
    </div>
    <div class="half right">
      
  
      <p>&nbsp;</p>
    </div>
    <div class="spacer"><!-- SPACER --></div>
  </div>
</div>
</body></html>