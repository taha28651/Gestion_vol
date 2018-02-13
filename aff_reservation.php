
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
			
			<li class="active"><a href="aff_compte.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window">
				</use></svg> Gestion Client</a></li>
			<li><a href="aff_compagnie.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Compagnie</a></li>
			<li><a href="aff_aeroport.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Aéoroport</a></li>
			<li><a href="aff_vol.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Gestion Vols</a></li>

			
			
			<li role="presentation" class="divider"></li>
			<li><a href="deconnect.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
<?php include('reservation.php'); ?>
					
</div>

	<?php include('incjs.php'); ?>
</body>
</html>

	