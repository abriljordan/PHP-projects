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
	$guests = Guest::find_all();
	$header = array('ID', 'First Name', 'Last Name', 'E-mail','Phone#', 'Address');
    // Column widths
    $w = array(30, 30, 30, 30, 30, 30);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    foreach($guests as $guest):
        $pdf->Cell($w[0],6,"$guest->id");
        $pdf->Cell($w[1],6,"$guest->first_name");
        $pdf->Cell($w[2],6,"$guest->last_name");
		$pdf->Cell($w[3],6,"$guest->email_address");
        $pdf->Cell($w[4],6,"$guest->phone_number");
		$pdf->Cell($w[5],6,"$guest->address");
		        $pdf->Ln();
        	endforeach;
$pdf->Output();
?>
