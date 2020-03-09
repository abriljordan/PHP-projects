<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link type="text/css" href="javascripts/jquery-ui-1.8/themes/base/jquery.ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="javascripts/jquery-easyui-1.2.5/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $("input[name$='group_name']").click(function(){
		  var radio_value = $(this).val();
		  if(radio_value=='Yes') {
			$("#yes_box").show("slow");
			 $("#no_box").hide();
		  }
		  else if(radio_value=='No') {
		   $("#no_box").show("slow");
			$("#yes_box").hide();
		   }
		  });
		  $("#yes_box").hide();
		  $("#no_box").hide();
		 
		});
	</script>
	 </head>
<body>
				<input type="radio" name="group_name" value="Yes" id="group_name_0"/>Yes
				<input type="radio" name="group_name" value="No" id="group_name_1"/>No
					<div id="yes_box" style="width: 200px; background: white; color: black; border: 1px solid; padding: 5px;">
					Content of Div 1
					</div>
					<div id="no_box" style="width: 200px; background: white; color: black; border: 1px solid; padding: 5px;">
					Content of Div 2
					</div>	
</body>
</html>
