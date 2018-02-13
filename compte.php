
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Clients</div>
					<?php
if(isset($_POST['enregistrer']))
{
	
							
							
if($_POST['nom']=='' || $_POST['cin']==''  || $_POST['prenom']=='')
	{
		 header('location:aff_compte.php?error=1');
	}
	else
	{	

	
		$q1 ='INSERT INTO client(cin,nom,prenom) values ("'.$_POST['cin'].'","'.$_POST['nom'].'","'.$_POST['prenom'].'")' ;
		$r1= $db->query($q1);
		header('location:aff_compte.php?val=1');
	}
}
?>
<div class="panel panel-default">
			<?php
if (isset($_GET['error']))
{
		echo '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Remplir tous les Information<a  class="pull-right" aria-hidden="true"></a>
				</div>';

}
if (isset($_GET['sup']))
{
		echo '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Client Supprimer<a  class="pull-right" aria-hidden="true"></a>
				</div>';

}
if (isset ($_GET['val']))
{
	echo '<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bien Enregistrer <a href="#" class="pull-right"></a>
				</div>';
}

?>
<div class="panel-body">
<div class="col-md-12">

<form  method="POST" enctype="multipart/form-data"  >
<div class="col-md-4">
	<div class="form-group">
								<div class="col-md-12" align ="center">	<label> CIN</label></div>
									<div class="col-md-12">		<input class="form-control" name="cin" type="text"  >	</div>
								</div>	
	
	
</div>
<div class="col-md-4">
<div class="form-group">
								<div class="col-md-12" align ="center">	<label>Nom</label></div>
									<div class="col-md-12">	<input class="form-control" name="nom" type="text"  onblur="verifname(this)"></div>
								</div>		
</div>
<div class="col-md-4">
<div class="form-group">
								<div class="col-md-12" align ="center">	<label> Prenom</label></div>
									<div class="col-md-12">	<input class="form-control" name="prenom" type="text"  onblur="verifname(this)"></div>
								</div>		
</div>
<br>
<div class="col-md-12 center">
								<br>
								<div class="form-group" align="center">
								<button type="submit" class="btn btn-primary" name="enregistrer">Ajouter</button>
								</div>
			</div>	
</form>			
</div>

					<div class="panel-body">
						<table data-toggle="table"   data-search="true"  data-pagination="true"  >
						    <thead>
						    <tr>
						       
						        <th  data-sortable="true">CIN</th>
						        <th   data-sortable="true">Nom Complet</th>
								<th  data-sortable="true">Réserver</th>
								<th  data-sortable="true">Historique</th>
							

								<th  data-sortable="true">Action</th>
							</tr>
						    </thead>
							<tbody>
							<?php 
							$q =  "select * from client";
							$r = $db -> query($q) ;
							while ($c = $r -> fetch())
							{
							?>
							<tr>
							<td> 
							<?php echo $c['cin'] ; ?>
							</td>
							<td> 
							<?php echo $c['nom']." ".$c['prenom'] ; ?>
							</td>
							
							<td style = "text-align:center;">
							<?php 
						echo "<a href=\"aff_reservation.php?id=".$c['cin']."\" class=\"btn btn-primary\">Ajouter</span>" ;
							?>
							</td>
							<td style = "text-align:center;">
							<?php 
						echo "<a href=\"#\" class=\"btn btn-warning\">Afficher</span>" ;
							?>
							</td>
						
							<td style = "text-align:center;"> 
							<?php 
			
	
			echo "<a href=\"sup_com.php?id=".$c['cin']."\" class=\"btn btn-danger\">Supprimer</span>" ;
		
		
							?>
							</td>
							</tr>	
							<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>