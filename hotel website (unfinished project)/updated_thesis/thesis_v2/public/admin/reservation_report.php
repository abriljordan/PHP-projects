<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<?php require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,3,"Reservations");
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',6);
$pdf->Ln();

/*
	// Get data records from table.
	$result=mysql_query("select * from card_type order by id");
	while($row=mysql_fetch_array($result))
	{
		$pdf->Cell(10,5,"{$row['id']}");
		$pdf->MultiCell(350,5,"{$row['card_type']}");
	}
*/
	$pdf->Ln();
	
	/*find by sql
	$start = $_POST['$start'];
	$end = $_POST['end'];
	$sql = "select * from guests where check_in_date  => {'$start'} AND check_out_date <= {'$end'}";	
	*/
	
	$guests = View_ReservationLists::find_all();
	$header = array('Arrival','Departure', 'Guest Name', 'Room','Type');
    // Column widths
    $w = array( 40, 40,40,40,40);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    foreach($guests as $guest):
        $pdf->Cell($w[0],6,"$guest->arrival");
        $pdf->Cell($w[1],6,"$guest->dept");
        $pdf->Cell($w[2],6,"$guest->guestname");
		$pdf->Cell($w[3],6,"$guest->room_number");
        $pdf->Cell($w[4],6,"$guest->roomtype");
	
		        $pdf->Ln();
        	endforeach;
$pdf->Output();
?>
