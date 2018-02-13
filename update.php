<?php
 include('cnx.php');
if(isset($_POST['btn1']))
{

  if(empty($_POST['dated']))
 {
 header('location:donne.php?ref1=1');
 }else
 {
	
      $q2 = 'update deplacement set dated = "'.$_POST['dated'].'" where id_d = "'.$_GET['id'].'" ';
      $r2 = $db ->query($q2); 
 header('location:donne.php?val1=1');	  
 } 
}
 
 
 ?>