<?php
$active_PF = "";
$active_PO = "";
$active_VO = "";
$active_CO = "";
$active_TO = "";
if(basename($_SERVER['PHP_SELF'])=='dashboard.php') $active_PF = 'class="active"';
if(basename($_SERVER['PHP_SELF'])=='placeorder.php') $active_PO = 'class="active"';
if(basename($_SERVER['PHP_SELF'])=='vieworders.php') $active_VO = 'class="active"';
if(basename($_SERVER['PHP_SELF'])=='cancelledorders.php') $active_CO = 'class="active"';
if(basename($_SERVER['PHP_SELF'])=='trackorders.php') $active_TO = 'class="active"';
?>
<div class="sidebar">
	<div class="sidebar-widget sidebar-category">
		<ul class="list">
			<?php if($isLoggedIn) { ?>
			<li <?php echo $active_PF;?>><a href="dashboard">Personal Information</a></li>
			<?php } ?>
			<li <?php echo $active_PO;?>><a href="placeorder">Book Repair</a></li>
			<?php if($isLoggedIn) { ?>
			<li <?php echo $active_VO;?>><a href="vieworders">View Orders</a></li>
			<li <?php echo $active_CO;?>><a href="cancelledorders">Cancelled Orders</a></li>
			<?php } ?>
			<li <?php echo $active_TO;?>><a href="trackorders">Track Order</a></li>
		</ul>
	</div>
</div>