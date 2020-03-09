<?php
	$link = mysql_connect('localhost', 'root', '');
	@mysql_select_db('dates',$link);	
			$start = $_POST['start'];
			$end = $_POST['end'];
			$sql  = "SELECT * FROM  dates ";
			$sql .= "WHERE start = '{$start}' ";
			$sql .= "AND end = '{$end}' ";
			$sql .= "LIMIT 1";
		    	$result = mysql_query($sql);
				if(mysql_num_rows($result)>0){
					echo "success";
				}else{
					echo "failed";
				}
?>