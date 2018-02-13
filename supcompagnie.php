<?php
	include('cnx.php');
	$q1 = "DELETE FROM compagnie WHERE id_comp = '".$_GET['id']."'";
	$r1 = $db->query($q1);

	header('location:aff_compagnie.php?sup=1');
?>