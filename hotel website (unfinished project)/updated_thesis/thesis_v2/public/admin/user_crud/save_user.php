<?php require_once("../../../includes/initialize.php"); ?>?>
<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$sql = "INSERT INTO employee(username,password,nickname,first_name,last_name) VALUES('$username','$password','$nickname','$first_name','$last_name')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

