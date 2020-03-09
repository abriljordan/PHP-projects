<?php require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<?php require('fpdf/fpdf.php');

class PDF_receipt extends FPDF{
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin);
		
		$this->SetAutoPageBreak(true, $margin);
	}
	function Header () {
		$this->SetFont('Arial', 'B', 20);
		$this->SetFillColor(36, 96, 84);
		$this->SetTextColor(225);
		$this->Cell(0, 30, "Jampason", 0, 1, 'C', true);
	}
	function Footer () {
		$this->SetFont('Arial', '', 12);
		$this->SetTextColor(0);
		$this->SetXY(40, -60);
		$this->Cell(0, 20, "Thank you", 'T', 0, 'C');
	}
	function PriceTable($products, $prices) {
	$this->SetFont('Arial', 'B', 12);
	$this->SetTextColor(0);
	$this->SetFillColor(36, 140, 129);
	$this->SetLineWidth(1);
	$this->Cell(427, 25, "Item Description", 'LTR', 0, 'C', true);
	$this->Cell(100, 25, "Price", 'LTR', 1, 'C', true);
	 
	$this->SetFont('Arial', '');
	$this->SetFillColor(238);
	$this->SetLineWidth(0.2);
	$fill = false;

	for ($i = 0; $i < count($products); $i++) {
		$this->Cell(427, 20, $products[$i], 1, 0, 'L', $fill);
		$this->Cell(100, 20, '$' . $prices[$i], 1, 1, 'R', $fill);
		$fill = !$fill;	}
	$this->SetX(367);
	$this->Cell(100, 20, "Total", 1);
	$this->Cell(100, 20, '$' . array_sum($prices), 1, 1, 'R');}}
$pdf = new PDF_reciept();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(100);
//header
	$id = $_GET['id'];
	$guests = Guest::find_by_id($id);
	foreach($guests as $guest);
$pdf->Cell(100, 13, "Guest name");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, "$guest->full_name()");
$pdf->SetFont('Arial', 'B');
$pdf->Cell(50, 13, "Date:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, date('F j, Y'), 0, 1);
$pdf->SetFont('Arial', 'I');
$pdf->SetX(140);
$pdf->Cell(200, 15, "$guest->address", 0, 2);
$pdf->Cell(200, 15, "$guest->email_address" ,0, 2);
$pdf->Cell(200, 15, "$guest->phone_number" ,0, 2);
$pdf->Cell(200, 15, "$guest->address", 0, 2);
$pdf->Ln(100);
//Stay info create a stay info class


//content
	$id = $_GET['id'];
	$guests = View_Total_Charges::find_by_id($id);		
	//$products = description
	//$prices = amount
$pdf->PriceTable($_POST['product'], $_POST['price']);
$pdf->Ln(50);
$message = "Thank you.";
$pdf->MultiCell(0, 15, $message);
$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor(1, 162, 232);
$pdf->Write(13, "store@nettuts.com", "mailto:example@example.com");
$pdf->Output('reciept.pdf', 'F');
/*
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,3,"List of Guests");
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',6);
$pdf->Ln();
$pdf->Ln();
	$id = $_GET['id'];
	$guests = View_Total_Charges::find_by_id($id);
	$header = array('Guest Name', 'Room', 'Arrival', 'Departure','Total Charges');
    // Column widths
    $w = array(40, 40, 40, 40, 40);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    foreach($guests as $guest);
        $pdf->Cell($w[0],6,"$guests->guestname");
        $pdf->Cell($w[1],6,"$guests->room");
		$pdf->Cell($w[2],6,"$guests->check_in_date");
        $pdf->Cell($w[3],6,"$guests->check_out_date");
		$pdf->Cell($w[4],6,"$guests->total_charges");
		        $pdf->Ln();
$pdf->Output();
*/
?>
