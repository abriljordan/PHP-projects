<?php require_once("../includes/initialize.php"); ?>
<?php require_once("/layouts/forms.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Jampason Resort</title>
	<link href="stylesheets/thrColLiqHdr.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="stylesheets/jquery.ad-gallery.css">
	<link type="text/css" href="javascripts/jquery-ui-1.8/themes/base/jquery.ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="javascripts/jquery.ad-gallery.js"></script>
    <script type="text/javascript" src="javascripts/jquery-ui-1.8/ui/jquery.ui.tabs.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var pickerOpts = {
			minDate: new Date(),
			maxDate: "+10",
			changeMonth: true,
			changeYear: true,
			dateFormat: $.datepicker.ATOM
			};
			$("#checkindatepicker").datepicker(pickerOpts);
			$("#checkoutdatepicker").datepicker(pickerOpts);
		});
	//function for image gallery
	$(function() {
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });

	<!--boundary -->
	$(function() {
		$("#tabs").tabs();
	});
	
	</script>
	  <style type="text/css">
	  * {
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Arial, sans-serif;
	color: #333;
	line-height: normal;
  }
  select, input, textarea {
    font-size: 1em;
  }
  body {
    font-size: 70%;
  }
 h2 {
    margin-top: 1.2em;
    margin-bottom: 0;
    padding: 0;
    border-bottom: 1px dotted #dedede;
  }
  h3 {
    margin-top: 1.2em;
    margin-bottom: 0;
    padding: 0;
  }
  .example {
    border: 1px solid #CCC;
    background: #f2f2f2;
    padding: 10px;
  }
  ul {
    list-style-image:url(list-style.gif);
  }
  pre {
    font-family: "Lucida Console", "Courier New", Verdana;
    border: 1px solid #CCC;
    background: #f2f2f2;
    padding: 10px;
  }
  code {
    font-family: "Lucida Console", "Courier New", Verdana;
    margin: 0;
    padding: 0;
  }

  #gallery {
	padding: 5px;
	background: #e1eef5;
  }
  #descriptions {
    position: relative;
    height: 50px;
    background: #EEE;
    margin-top: 10px;
    width: 640px;
    padding: 10px;
    overflow: hidden;
  }
    #descriptions .ad-image-description {
      position: absolute;
    }
      #descriptions .ad-image-description .ad-description-title {
        display: block;
      }
	 </style>
</head>
<body>
<?php 
//Find all the room types
$rooms = RoomType::find_all();
?>
<div class="container">
  <div class="header">
<img src="" alt="Jampason Resort"name="Insert_logo"width="20%" height="90" id="Insert_logo" style="background: #8090AB; display:block;" />
	<!--put this in sidebar form -->
	
	<div class="sidebar1">
	<form method="post" name="form1" id="form1" action="room_availability.php">
   <h2>Reservation</h2><br/>    
	<p>
		Check in date:<input type="text" id="checkindatepicker" value="<?php $checkindatepicker; ?>"><br/>
		Check out date:<input type="text" id="checkoutdatepicker" value="<?php $checkoutdatepicker; ?>"><br/>
	  <label for="room">Type of Room: </label>
	  <select name="room">
	    <option>Select One</option>
	    <?php foreach($rooms as $room):?>
	    <option value="<?php echo $room->id;?>"><?php echo $room->roomtype; ?></option>
	    <?php endforeach;?>
	    </select></p>
	<label for="#ofguests">Guests per room:</label>
							<select name="#ofguests">
							<option>Select One</option>
							<option>1</option>
    						</select><br/>
	<label for="#ofrooms">No. of Rooms:</label>
							<select name="#ofrooms">
							<option>Select One</option>
							<option>1</option>
    						</select>
	<div id="message"></div>
	<!--Button for checking availability-->
		<input type="button" id="button1" name="button1" value="submit" />		
    </form>	
	</div>	
</div>
    
<div class="content">
<div class="demo">
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Home</a></li>
				<li><a href="#tabs-2">Rooms & Services</a></li>
				<li><a href="#tabs-3">Photo Gallery</a></li>
				<li><a href="#tabs-4">Contacts</a></li>
				<li><a href="#tabs-5">About Us</a></li>
			</ul>
			<div id="tabs-1">home</div>
			<div id="tabs-2">services</div>
			<!--TAB 3-->
			<div id="tabs-3">
			<div id="gallery" class="ad-gallery">
			  <div class="ad-image-wrapper"></div>
			  <div class="ad-controls"></div>
			  <div class="ad-nav">
				<div class="ad-thumbs">
				  <ul class="ad-thumb-list">
	<li><a href="images/1.jpg"><img src="images/thumbs/t1.jpg" class="image0"></a></li>
		 <li><a href="images/10.jpg"><img src="images/thumbs/t10.jpg" title="A title for 10.jpg" alt="Description here." class="image1"></a></li>
					<li><a href="images/11.jpg">
						<img src="images/thumbs/t11.jpg" title="A title for 11.jpg" alt="Hello world." class="image2">
					</a></li>
					<li><a href="images/12.jpg">
						<img src="images/thumbs/t12.jpg" title="A title for 12.jpg" alt="Hello world." class="image3">
					</a></li>
					<li><a href="images/13.jpg">
						<img src="images/thumbs/t13.jpg" title="A title for 13.jpg" alt="Description here." class="image4">
					</a></li>
					<li>
					  <a href="images/14.jpg">
						<img src="images/thumbs/t14.jpg" title="A title for 14.jpg" alt="Description here." class="image5">
					</a></li>
					<li><a href="images/2.jpg">
						<img src="images/thumbs/t2.jpg" title="A title for 2.jpg" alt="Description here." class="image6">
					</a></li>
					<li><a href="images/3.jpg">
						<img src="images/thumbs/t3.jpg" title="A title for 3.jpg" alt="Description here." class="image7">
					</a></li>
					<li><a href="images/4.jpg">
						<img src="images/thumbs/t4.jpg" title="A title for 4.jpg" alt="Description here." class="image8">
					  </a></li>
					<li><a href="images/5.jpg">
						<img src="images/thumbs/t5.jpg" title="A title for 5.jpg" alt="Description here." class="image9">
					</a></li>
					<li><a href="images/6.jpg">
						<img src="images/thumbs/t6.jpg" title="A title for 6.jpg" alt="Description here." class="image10">
					</a></li>
					<li><a href="images/7.jpg">
						<img src="images/thumbs/t7.jpg" title="A title for 7.jpg" alt="Description here." class="image11">
					</a></li>
					<li><a href="images/8.jpg">
						<img src="images/thumbs/t8.jpg" title="A title for 8.jpg" alt="Description here." class="image12">
					</a></li>
					<li><a href="images/9.jpg">
						<img src="images/thumbs/t9.jpg" title="A title for 9.jpg" alt="Description here." class="image13">
					</a></li>
				  </ul>
				</div>
			  </div>
			</div>	
			</div>
			<div id="tabs-4">Contact Us</div>
			<div id="tabs-5">About Us</div>
		</div>

</div></div>
<!--
 <div class="sidebar2">
    <h4>Backgrounds</h4>
    <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
    end .sidebar2 	</div>-->
  <div class="footer">
    <p>This .footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the .footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
