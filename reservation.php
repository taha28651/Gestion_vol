
<?php

include('cnx.php');	
if(isset($_POST['enregistrer']))
{
	
						
if($_POST['datea']=='' || $_POST['dated']=='')
	{
		 header('location:aff_reservation.php?error=1&id='.$_POST['cin'].'');
		
	
	}else 
	{

						$dated = new DateTime($_POST['dated']);					
						$datea = new DateTime($_POST['datea']);					
						if ($dated >= $datea )					
						{
						header('location:aff_reservation.php?date=1&id='.$_POST['cin'].'');
						}else
						{
							$q1 ='INSERT INTO reservation(cin,id_vol,aeroport_d,aeroport_a,date_d,date_a) values ("'.$_GET['id'].'","'.$_POST['vol'].'","'.$_POST['aerd'].'","'.$_POST['aera'].'","'.$_POST['dated'].'","'.$_POST['datea'].'")' ;
								$r1= $db->query($q1);
								header('location:aff_reservation.php?val=1&id='.$_POST['cin'].'');
						}
	}
}
?>	
<br><br><br>
<div class="panel panel-default" align="center">
			<?php
if (isset($_GET['error']))
{
		echo '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Remplir tous les champs<a  class="pull-right" aria-hidden="true"></a>
				</div>';

}
if (isset ($_GET['val']))
{
	echo '<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bien Enregistrer <a href="#" class="pull-right"></a>
				</div>';
}

?>
					<div class="panel-heading">
					<em class="text-center " align ="center">Ajouter Réservation</em>
					</div>
<form  method="POST" enctype="multipart/form-data"  name="f" onsubmit="return valid(this);" >
					<div class="panel-body">
					
			<div class="col-md-6">
							
							<div class="col-md-12">
							<br>
								<div class="form-group">
								<div class="col-md-3">	<label><br>C I N :</label></div>
									<div class="col-md-9">	<input class="form-control" name="cin" type="text" value="<?php echo $_GET['id'];?>" onkeyup="verifcptbud(this)" ></div>
								</div>
							</div>
							
							<div class="col-md-12">
							<br>
								<div class="form-group">
								<div class="col-md-3">	<label> <br>Aéroport Départ :</label></div>
									<div class="col-md-9">				
									<select class="form-control" name="aerd" type="text">
										  <?php
                                             $q1="select * from aeroport ";
                                             $r1= $db->query($q1);
                                             while($c = $r1->fetch())
                                               {   
                                 echo "<option value=".$c['id_aeroport'].">".$c['libelle']."</option>";
                                                }                                                           
                                             ?>
									</select>
									
									</div>
								</div>
							</div>
						<div class="col-md-12">

							<br>
								<div class="form-group">
								<div class="col-md-3">	<label> <br>Date Départ :</label></div>
									<div class="col-md-9">	<input class="form-control" name="dated" type="date"></div>
								</div>
							</div>
						
			</div>							
					<div class="col-md-6">	
					
						<div class="col-md-12">
							<br>
								<div class="form-group">
								<div class="col-md-3">	<label> <br>Libelle Vol:</label></div>
									<div class="col-md-9">
									<select class="form-control" name="vol" type="text">
										  <?php
                                             $q1="select * from vol ";
                                             $r1= $db->query($q1);
                                             while($c = $r1->fetch())
                                               {   
                                 echo "<option value=".$c['id_vol'].">".$c['libelle']."</option>";
                                                }                                                           
                                             ?>
									</select>
									</div>
								</div>
							</div>
								<div class="col-md-12">
							<br>
								<div class="form-group">
								<div class="col-md-3">	<label> <br>Aéroport Arriver :</label></div>
									<div class="col-md-9">	
									<select class="form-control" name="aera" type="text">
										  <?php
                                             $q1="select * from aeroport ";
                                             $r1= $db->query($q1);
                                             while($c = $r1->fetch())
                                               {   
                                 echo "<option value=".$c['id_aeroport'].">".$c['libelle']."</option>";
                                                }                                                           
                                             ?>
									</select></div>
								</div>
							</div>
						<div class="col-md-12">

							<br>
								<div class="form-group">
								<div class="col-md-3">	<label> <br>Date Arriver :</label></div>
									<div class="col-md-9">	<input class="form-control" name="datea" type="date"></div>
								</div>
							</div>
						
							
					</div>
								<div class="col-md-12 center">
								<br><br><br>
								<div class="form-group" align="center">
								<button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer</button>
								</div>
								</div>
	</form>
						
</div>
