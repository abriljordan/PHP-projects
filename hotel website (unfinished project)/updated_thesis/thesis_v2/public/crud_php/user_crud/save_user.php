<?php require_once("../../../includes/initialize.php"); ?>
<?php 
/*
$test = $_POST['test'];
$sql = "INSERT INTO test_table(test) VALUES('$test')";
$result = @mysql_query($sql);
	$id = mysql_insert_id();
	$test2 = $_POST['test2'];
	$sql = "INSERT INTO test_table2(test2) VALUES('$id')";
	$result = @mysql_query($sql);
*/
	

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$nickname = $_POST['nickname'];
	$userlevel_id = $_POST['userlevel_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "INSERT INTO users(first_name,last_name,nickname,userlevel_id,username,password) VALUES('$first_name','$last_name','$nickname','$userlevel_id','$username','$password')";
	$result = @mysql_query($sql);
	$id = mysql_insert_id();

		$test = $_POST['test'];
		$sql = "INSERT INTO test_table(test) VALUES('$id')";
		$result = @mysql_query($sql);
			
		
		
	//mysql_free_result( $result );
	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Some errors occured.'));
	}
	
	
?>

