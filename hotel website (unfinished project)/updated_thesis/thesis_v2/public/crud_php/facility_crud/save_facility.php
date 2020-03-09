<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$name = $_POST['name'];
$description = $_POST['description'];
$sql = "INSERT INTO facility(name,description) VALUES('$name','$description')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>

