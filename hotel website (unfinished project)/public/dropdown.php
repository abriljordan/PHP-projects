<?php require_once("../includes/initialize.php"); ?>
<head>
<title>Ajax Tutorial: Dynamic Loading of ComboBox using jQuery and Ajax in PHP</title>
<script type="text/javascript" src="javascripts/jquery-ui-1.8/jquery-1.4.2.js"></script>
<script type="text/javascript" src="jquery.livequery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
			//$('#loader').hide();
			$('.parent').livequery('change', function() {
				$(this).nextAll('.parent').remove();
				$(this).nextAll('label').remove();
				$('#show_sub_categories');
					$.post("get_chid_categories.php", {
							roomtype_id: $(this).val(),
						}, function(response){
					setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
					});
					
				return false;
				});
			});
			
			function finishAjax(id, response){
			  $('#loader').remove();
			  $('#'+id).append(unescape(response));
			} 
</script>
<style>
.both h4{ font-family:Arial, Helvetica, sans-serif; margin:0px; font-size:14px;}
#search_category_id{ padding:3px; width:200px;}
.parent{ padding:3px; width:150px; float:left; margin-right:12px;}
.both{ float:left; margin:0 0px 0 0; padding:0px;}
</style>
</head>
<body>
<div style="padding-left:30px; height:710px;">
	<br clear="all" /><br clear="all" />
	<label>Room Types: </label> 
	<div id="show_sub_categories">
		<?php $roomtypes = RoomType::find_all(); ?>
		<select name="id" class="parent">
			<option value="" selected="selected">-- Categories --</option>
			<?php foreach($roomtypes as $roomtype): ?>
			<option value="<?php echo $roomtype->id;?>"><?php echo $roomtype->roomtype;?></option>
					<?php endforeach;?>
		</select>	
	</div>
	<br clear="all" /><br clear="all" />
</div>
</body>
</html>