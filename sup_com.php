<?php
	include('cnx.php');
	$q1 = "DELETE FROM client WHERE cin = '".$_GET['id']."'";
	$r1 = $db->query($q1);

	header('location:aff_compte.php?sup=1');
?>