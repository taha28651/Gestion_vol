<?php
	include('cnx.php');
	$q1 = "DELETE FROM vol WHERE id_vol = '".$_GET['id']."'";
	$r1 = $db->query($q1);

	header('location:aff_vol.php?sup=1');
?>