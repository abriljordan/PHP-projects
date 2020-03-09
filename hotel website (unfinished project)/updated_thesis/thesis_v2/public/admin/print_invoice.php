<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<?php require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,3,"List of Guests");
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',6);
$pdf->Ln();
$pdf->Ln();
	/*find by sql
	$id = $_POST['$id'];
	$sql = "select * from guests where check_in_date  => {'$start'} AND check_out_date <= {'$end'}";	
	*/
	
	$id = $_GET['$id'];
	$sql = "select * from view_total_charges_v2 where id='{$id}'";
	
	$guests = View_Total_Charges::find_by_sql($sql);
	$header = array('Guest Name', 'Room', 'Arrival', 'Departure','Total Charges');
    // Column widths
    $w = array(40, 40, 40, 40, 40);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    foreach($guests as $guest):
        $pdf->Cell($w[0],6,"$guests->id");
        $pdf->Cell($w[1],6,"$guests->guestname");
        $pdf->Cell($w[2],6,"$guests->room");
		$pdf->Cell($w[3],6,"$guests->check_in_date");
        $pdf->Cell($w[4],6,"$guests->check_out_date");
		$pdf->Cell($w[5],6,"$guests->total_charges");
		        $pdf->Ln();
    endforeach;
$pdf->Output();
?>
