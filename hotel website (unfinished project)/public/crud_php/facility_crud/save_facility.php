<?php require_once("../../../includes/initialize.php"); ?>
<?php 
$facility = new Facility();
	$facility->name = $_POST['name'];
	$facility->description = $_POST['description'];
			if($facility->save()){
			echo json_encode(array('success'=>true));
			} else {
				echo json_encode(array('msg'=>'Some errors occured.'));
			}
?>

