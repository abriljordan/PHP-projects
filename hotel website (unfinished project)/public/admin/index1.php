<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Control Panel</title>
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/themes/default/easyui.css">
    
	<link rel="stylesheet" type="text/css" href="..javascripts/jquery-easyui-1.2.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../javascripts/jquery-easyui-1.2.5/demo.css">
    
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="../javascripts/jquery-easyui-1.2.5/jquery.easyui.min.js"></script>
	<script>
		$(function(){
			var p = $('body').layout('panel','west').panel({
			});
		});
	</script>
</head>
<body class="easyui-layout">
	<div region="north" border="false" style="height:60px;background:#B3DFDA;padding:10px">Admin Area</div>
	
    <div region="west"  title="Navigation" style="width:200px;padding:10px;">
    	<!--Navigation buttons-->
        <div style="padding:5px; background:#fafafa; width:150px;">
		<a href="#" class="easyui-linkbutton">text button</a>
		</div>
        <div style="padding:5px; background:#fafafa; width:150px;">
		<a href="#" class="easyui-linkbutton">text button</a>
		</div>
</div>
    
    
<div region="east"  title="East" style="width:150px;padding:10px;">east region</div>
	<div region="south" border="false" style="height:50px;background:#A9FACD;padding:10px;">Footer</div>
	<div region="center" title="Main Title">
	</div>
</body>
</html>