
<!DOCTYPE html>
<?php
	//session_start();
	include('cnx.php');
?>
<html>
<head>
	<?php include('inccss.php'); ?>
	
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<script src="js/lumino.glyphs.js"></script>

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
			<li><a href="aff_aeroport.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Aéoroport</a></li>
			<li><a href="aff_vol.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Vols</a></li>

			
			
			<li role="presentation" class="divider"></li>
			<li><a href="deconnect.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>
</div>
				
						
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	

		<br>
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<?php
						$q =  "select count(*) as nbr from compagnie ";
							$r = $db -> query($q) ;
							$c = $r -> fetch();
							$nb = $c['nbr'];
						?>
							<div class="large"><?php echo $nb; ?></div>
							<div class="text-muted">N_Compagnie</div>
						</div>
					</div>
				</div></div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<?php
						$q =  "select count(*) as nbr from aeroport ";
							$r = $db -> query($q) ;
							$c = $r -> fetch();
							$nb = $c['nbr'];
						?>
							<div class="large"><?php echo $nb; ?></div>
							<div class="text-muted">N_Aéoroport</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<?php
						$q =  "select count(*) as nbr from vol ";
							$r = $db -> query($q) ;
							$c = $r -> fetch();
							$nb = $c['nbr'];
						?>
							<div class="large"><?php echo $nb; ?></div>
							<div class="text-muted">Nombre de Vol</div>
						</div>
					</div>
				</div>
			</div>
		
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<?php
						$q =  "select count(*) as nbr from client ";
							$r = $db -> query($q) ;
							$c = $r -> fetch();
							$nb = $c['nbr'];
						?>
							<div class="large"><?php echo $nb; ?></div>
							<div class="text-muted">Client</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
				<div class="row">
<div class="col-lg-1">
</div>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Liste des Reservation </div>
					<div class="panel-body">
						<table data-toggle="table" data-search="true" data-pagination="true" >
						    <thead>
						    <tr>
						       
						        <th  data-sortable="true">Cin</th>
								<th   data-sortable="true">Nom Complet</th>
						        <th   data-sortable="true">Libelle Vol</th>
						        <th data-sortable="true">Lieu de départ</th>
								<th data-sortable="true">Lieu d'arriver</th>
							
							</tr>
						    </thead>
							<tbody>
							<?php 
							
				
							$q =  "select * from reservation";
							$r = $db -> query($q) ;
							while ($c = $r -> fetch())
							{
							?>
							<tr>
								
							<td> 
							<?php echo $c['cin'] ; ?>
							</td>
							<td> 
							<?php 
							$q3 =  "select * from client where cin = '".$c['cin']."' ";
							$r3 = $db -> query($q3) ;
							$c3 = $r3 -> fetch();
							echo $c3['nom'].' '.$c3['prenom'] ; 
							?>
							</td>
							
							<td> 
							<?php 
							$q3 =  "select * from vol where id_vol = '".$c['id_vol']."' ";
							$r3 = $db -> query($q3) ;
							$c3 = $r3 -> fetch();
							echo $c3['libelle'] ; 
							?>
							</td>
							<td> 
							<?php 
							$q3 =  "select * from aeroport where id_aeroport = '".$c['aeroport_d']."' ";
							$r3 = $db -> query($q3) ;
							$c3 = $r3 -> fetch();
							echo $c3['libelle'] ; 
							?>
							</td>
							<td> 
							<?php 
							$q3 =  "select * from aeroport where id_aeroport = '".$c['aeroport_a']."' ";
							$r3 = $db -> query($q3) ;
							$c3 = $r3 -> fetch();
							echo $c3['libelle'] ; 
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
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
	<?php include('incjs.php'); ?>
</body>
</html>

	