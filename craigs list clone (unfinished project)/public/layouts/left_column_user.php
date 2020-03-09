<?php //user left column ?>

<div class="left_sidebar">
		<div class="inner box">
			Today is
		<?php echo strftime("%Y-%m-%d",time());?>	
     	
            <div class="table" style="margin:5px;">
            <ul>
			<!--
			<li class="title">Navigation</li>
              <li class="even"><a href="./index.php">Home</li></a>
                <li class="odd"><a href="#">Categories</a></li>
                <li class="even"><a href="#">Advertisements</a></li>
           -->
<h2>Ad Management</h2>
	<ul>
	<li><a href="ad_list.php">List of Ads	</a></li>
	<li><a href="create_ad.php">Create Ads</a></li>
	<li><a href="#">Home</a></li>	
	<li><a href="logout.php">Logout</a></li>
	</ul>
		   </ul>
            </div>
       

	</div>
	</div>