<?php require_once('../../../includes/initialize.php');
if(!$session->is_logged_in()) {
  redirect_to("login.php");}
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<title>Invoice</title>
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.7.1.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
</head>
<body>
	<div id="page-wrap">
		<textarea id="header">INVOICE</textarea>
		<?php $id=$_GET['id'];
			//$id = 1;
		$guests = Guest::find_by_id($id);?>
		<div id="identity">
            <textarea id="address">
<?php foreach ($guests as $guest); ?>
<?php echo $guests->full_name();?>

<?php echo $guests->email_address;?>

<?php echo $guests->phone_number;?>

<?php echo $guests->address;?>
			</textarea>
            <div id="logo">
              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>
              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		</div>
		<div style="clear:both"></div>
		<div id="customer">
            <textarea id="customer-title">Jampason Resort
Jasaan, Mis Or</textarea>
            <table id="meta">
                
                <tr>
                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr><?php $balances = BalanceDue::find_by_id($id);?>
					<?php foreach($balances as $balance); ?>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><?php echo $balances->Balance_due; ?></div></td>
                </tr>
            </table>
		</div>
		<table id="items">
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th colspan="5">Amount</th>
			<?php 
					$id = $_GET['id'];
					$sql = "SELECT * FROM tmp_transact_charges_tbl ";
					$sql .= "WHERE guest_id={$id}";
					$charges = TransactCharges::find_by_sql($sql);
			?>
		  </tr>	
				<?php foreach($charges as $charge): ?>
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><?php echo $charge->description; ?><textarea></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea><?php echo $charge->description; ?></textarea></td>
			  <td><span class="price"><?php echo $charge->amount; ?></span></td>			
		  </tr>		<?php endforeach; ?>
		  
		  <?php 
					$id = $_GET['id'];
					$sql = "SELECT * FROM balance_due ";
					$sql .= "WHERE id={$id}";
					$balances = BalanceDue::find_by_sql($sql);
			?>
		  		<?php foreach($balances as $balance): ?>
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea>Room Charges</textarea></td>
			  <td><span class="price"><?php echo $balance->Room_charge; ?></span></td>			
		  </tr>		<?php endforeach; ?>
		  
		  
		
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row"></a></td>
		  </tr>
			<?php $id = $_GET['id']; ?>
			<?php $balances = BalanceDue::find_by_id($id);?>
			<?php foreach($balances as $balance); ?>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"><?php echo $balances->Amount_due;?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>
		      <td class="total-value"><textarea id="paid"><?php echo $balances->Payments; ?></textarea></td>
		  </tr>
		  <tr><?php $balances = BalanceDue::find_by_id($id);?>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"><?php echo $balances->Balance_due; ?></div></td>
		  </tr>
		</table>
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	</div>
</body>
</html>