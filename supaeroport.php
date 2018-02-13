<?php
	include('cnx.php');
	$q1 = "DELETE FROM aeroport WHERE id_aeroport = '".$_GET['id']."'";
	$r1 = $db->query($q1);

	header('location:aff_aeroport.php?sup=1');
?>