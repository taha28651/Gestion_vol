

<!DOCTYPE html>
<?php
	
	include('cnx.php');
?>
<html>
<head>
	<?php include('inccss.php'); ?>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<?php include('header.php'); ?>
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
<br><br>
<ul class="nav menu">
			<li>  <a href="acceuil.php"> <div ><img width="300" height="100" src=".\vol.jpg" ></div></a></li> <br><br>
			
			<li><a href="aff_compte.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window">
				</use></svg> Gestion Client</a></li>
			<li><a href="aff_compagnie.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Compagnie</a></li>
			<li class="active"><a href="aff_aeroport.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Aéoroport</a></li>
			<li><a href="aff_vol.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Vols</a></li>

			
			
			<li role="presentation" class="divider"></li>
			<li><a href="deconnect.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<br><br>
<?php
if(isset($_POST['enregistrer']))
{
	
							
							
if($_POST['nomr']=='')
	{
		 header('location:aff_aeroport.php?error=1');
	}
	else
	{	

	
		$q1 ='INSERT INTO aeroport(libelle) values ("'.$_POST['nomr'].'")' ;
		$r1= $db->query($q1);
		header('location:aff_aeroport.php?val=1');
	}
}
?>
<div class="panel panel-default">
			<?php
if (isset($_GET['error']))
{
		echo '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Entré le nom de Aéroport<a  class="pull-right" aria-hidden="true"></a>
				</div>';

}
if (isset ($_GET['val']))
{
	echo '<div class="alert bg-success" role="alert">
					<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Bien Enregistrer <a href="#" class="pull-right"></a>
				</div>';
}

if (isset($_GET['sup']))
{
		echo '<div class="alert bg-danger" role="alert">
					<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Aéroport supprimer<a  class="pull-right" aria-hidden="true"></a>
				</div>';

}

?>
<div class="panel-body">
<div class="panel-heading">Gestion Aéroport</div>
<br>
<div class="col-md-12">

<form  method="POST" enctype="multipart/form-data"  >
<div class="col-md-6">
	<div class="form-group">
								<div class="col-md-12" align ="center">	<label> Nom Aéroport</label></div>
									<div class="col-md-12">		<input class="form-control" name="nomr" type="text"  >	</div>
								</div>	
	
	
</div>
<div class="col-md-6">
<div class="form-group">
								<div class="form-group" align="center">
								<br>
								<button type="submit" class="btn btn-primary" name="enregistrer">Ajouter Aéroport</button>
								</div>	
</div>
</form>			
</div>
<br><br><br><br>
<div class="row">
<div class="col-lg-1">
</div>
			<div class="col-lg-10">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<table data-toggle="table" data-search="true" data-pagination="true">
						    <thead>
						    <tr>
						       
						        <th  data-sortable="true">Numero Aéroport</th>
						        <th   data-sortable="true">Nom Aéroport</th>
						     
								<th  data-sortable="true">Action</th>
							</tr>
						    </thead>
							<tbody>
							<?php 
							
				
							$q =  "select * from aeroport ";
							$r = $db -> query($q) ;
							while ($c = $r -> fetch())
							{
							?>
							<tr>
								
							<td> 
							<?php echo $c['id_aeroport'] ; ?>
							</td>
							<td> 
							<?php 
							
							echo $c['libelle']; 
							?>
							</td>
							
						
							<td> 
							
							<a href="supaeroport.php?id=<?php echo $c['id_aeroport'] ; ?>" class="btn btn-danger">Supprimer</button>
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
					
</div>

	<?php include('incjs.php'); ?>
</body>
</html>

	