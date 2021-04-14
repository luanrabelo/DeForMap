<?php
//Conexão com o Banco de Dados
$bd			= "deformed";
$user 		= "deformed";
$pass	 	= "luan481516";
$host 		= "deformed.mysql.dbaas.com.br";

$mysqli = @mysqli_connect($host, $user, $pass, $bd);
if (mysqli_connect_error()) {
    printf('Erro de conexão: %s', mysqli_connect_error());
    exit;
}

if (!mysqli_set_charset($mysqli, 'utf8')) {
    printf('Error ao usar utf8: %s', mysqli_error($mysqli));
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sem título</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>	
<script src="https://kit.fontawesome.com/7d94912b47.js" crossorigin="anonymous"></script>	
</head>

<body>
<?php
$query 			= "SELECT * FROM `geolocations`";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
?>
<div class="modal fade" id="<?php echo("Info_".$row["id_geo"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title"><img src="img/logo_toad_108.png" width="45" height="45" alt="" loading="lazy"> <i><?php echo($row["Species"]);?></i> | <?php echo($row["Continent"]);?> | <?php echo($row["Country"]);?> | <?php echo($row["State"]);?> | <?php echo($row["City"]);?> | <?php echo($row["Deformity"]);?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<h2>Small Description</h2><br>	
<?php echo($row["SmallDescription"]);?>	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
    </div>
  </div>
</div>
	
<div class="modal fade" id="<?php echo("Map_".$row["id_geo"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title"><img src="img/logo_toad_108.png" width="45" height="45" alt="" loading="lazy"> <i><?php echo($row["Species"]);?></i> | <?php echo($row["Continent"]);?> | <?php echo($row["Country"]);?> | <?php echo($row["State"]);?> | <?php echo($row["City"]);?> | <?php echo($row["Deformity"]);?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<h2>Geolocation</h2><br>	
Latitude:  <?php echo($row["latitude"]);?><br>
Longitude: <?php echo($row["longitude"]);?>	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
    </div>
  </div>
</div>
	
<div class="modal fade" id="<?php echo("Data_".$row["id_geo"]); ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title"><img src="img/logo_toad_108.png" width="45" height="45" alt="" loading="lazy"> <i><?php echo($row["Species"]);?></i> | <?php echo($row["Continent"]);?> | <?php echo($row["Country"]);?> | <?php echo($row["State"]);?> | <?php echo($row["City"]);?> | <?php echo($row["Deformity"]);?></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<h2>Geolocation</h2><br>
	
<form>
	
<div class="form-group">
<label>Title</label>
<input type="text" class="form-control" value="<?php echo($row["Title"]);?>" aria-describedby="Title">
<small class="form-text text-muted"></small>
</div>

<div class="form-group">
<label>Continent</label>
<input type="text" class="form-control" value="<?php echo($row["Continent"]);?>" aria-describedby="Continent">
<small class="form-text text-muted"></small>
</div>
	
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
    </div>
  </div>
</div>		
<?php	
}
?>		
	
	
<table class="table table-striped table-dark table-bordered align-middle text-center text-truncate">
<thead class="thead-dark">
    <tr>
      	<td colspan="2">Options</td>
		<td>Title</td>
      	<td>Continent</td>
		<td>Country</td>
		<td>State</td>
		<td>City</td>
		<td><i class="fas fa-1x fa-map-marked-alt"></i></td>
      	<td>Species</td>
		<td>Deformity</td>
		<td>Resume</td>
		<td>Description</td>
		<td>Photos</td>
      	
   	</tr>
</thead>
<?php
$query 			= "SELECT * FROM `geolocations`";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
?>	
<tr>
<td><a class="btn btn-sm btn-danger" href="#" role="button"><i class="fas fa-1x fa-trash-alt"></i></a></td>
<td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#<?php echo("Data_".$row["id_geo"]); ?>"><i class="fas fa-1x fa-edit"></i></button></td>

<td><?php echo($row["Title"]);?></td>
<td><?php echo($row["Continent"]);?></td>
<td><?php echo($row["Country"]);?></td>	
<td><?php echo($row["State"]);?></td>
<td><?php echo($row["City"]);?></td>
<td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#<?php echo("Map_".$row["id_geo"]); ?>"><i class="fas fa-1x fa-map-marker-alt"></i></button></td>	
<td><i><?php echo($row["Species"]);?></i></td>
<td><?php echo($row["Deformity"]);?></td>
<td><button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#<?php echo("Info_".$row["id_geo"]); ?>"><i class="fas fa-1x fa-info-circle"></i></button></td>
<td></td>
<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#<?php echo("Info_".$row["id_geo"]); ?>"><i class="fas fa-1x fa-images"></i></button></td>	
</tr>
<?php } ?>	
</table>
	
</body>
</html>