<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sem título</title>
</head>
<body>
	
<div class="modal fade" id="Login" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content">
<div style="letter-spacing: 1px" class="modal-header text-white text-monospace bg-dark">
<div class="modal-title"></div>
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">	
<div class="text-justify">
<h2>Small Description</h2><br>	
</div>
</div>
<div class="modal-footer bg-dark">
<button type="button" class="btn btn-danger btn-lg text-monospace" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
	
<div class="row">
<div class="col-2">
<form>
	
<div class="form-group">
<label>Country</label>	
<select class="form-control form-control custom-select" name="Country" id="Country">	
<?php 
echo(Country($mysqli));?>	
</select>	
</div>
	
<div class="form-group">
<label>State</label>	
<select class="form-control form-control custom-select" name="State" id="State">	
</select>
</div>
	
<div class="form-group">
<label>City</label>	
<select class="form-control form-control custom-select" name="City" id="City">	
</select>
</div>
	
<div class="form-group">
<label>Species</label>	
<select class="form-control form-control custom-select" name="Species" id="Species">
<?php echo(Species($mysqli));?>	
</select>
</div>	
<div class="form-group">
<label>Deformity</label>	
<select class="form-control form-control custom-select">
<?php
$query 			= "SELECT DISTINCT Deformity FROM `geolocations` ORDER BY Deformity ASC";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
$Deformity		= 	$row["Deformity"];
echo("<option value='$Deformity'>$Deformity</option>");
}
?>	
</select>
</div>		
<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-running"></i> Run</button>	
<br>		
</form>
<button class="btn btn-success btn-block" data-toggle="modal" data-target="#Login"><i class="fas fa-sign-in-alt"></i> Login</button>	
</div>
 
<div class="col-10" style="min-height: 540px;"><div style="width: 100%; height: 100%" id="map"></div></div>
</div>		
	
<script>
var mymap = L.map('map').setView([0, 0], 1.5);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
maxZoom: 18,
id: 'mapbox/light-v9',
tileSize: 512,
zoomOffset: -1
}).addTo(mymap);
	
<?php
if(isset($_GET["Country"])) {
$Country = 	$_GET["Country"];
$query = ("SELECT * FROM `geolocations` WHERE Country = $Country");
} else {
$query = "SELECT * FROM `geolocations` ORDER BY RAND() LIMIT 200";	
}	
$qry 			= $query;
$result 		= $mysqli->query($qry);
while ($row 	= $result->fetch_assoc()) {	
	$Latitude	=	$row["latitude"];
	$Longitude	=	$row["longitude"];
?>
L.marker([<?php echo($Latitude); ?>, <?php echo($Longitude); ?>])
	.bindPopup("<b><?php echo($row["Title"]); ?></b><br><?php echo($row["longitude"]); ?><br><hr><div style='margin: 0 auto;' class='row'><div class='col'><img src='http://deformedfrogs.org/img/lightbox-9.jpg' class='rounded' alt='...' width='300' height='300'></div><div class='col'><div class='text-justify'><?php echo($row['SmallDescription']); ?></div></div></div><br><hr><button type='button' class='btn btn-secondary btn-sm btn-block' data-toggle='modal' data-target='#<?php echo("Info_".$row["id_geo"]); ?>'>Info</button>", {maxWidth: 750, maxHeight: 350})
	.addTo(mymap);	
<?php	
}
?>
</script>
	
	
<script type="text/javascript">
$(document).ready(function(){
$('#Country').change(function(e){
var Country = $('#Country').val();
$.getJSON('load_data.php?opcao=State&valor='+Country,
function (dados){
if (dados.length > 0){
var option = "<option value='All_States'>All States</option>";	
$.each(dados, function(i, obj){
option 	+= '<option value="'+obj.State+'">'+obj.State+'</option>';	
})
}else{
Reset();
}
$('#State').html(option).show();	
})
})
$('#State').change(function(e){
var State = $('#State').val();
$.getJSON('load_data.php?opcao=City&valor='+State,
function (dados){
if (dados.length > 0){
var option = "<option value='All_Citys'>All Citys</option>";	
$.each(dados, function(i, obj){
option 	+= '<option value="'+obj.City+'">'+obj.City+'</option>';	
})
}else{
Reset();
}
$('#City').html(option).show();
})
})	
function Reset(){
$('#cmbPais').empty().append('<option>Carregar Países</option>>');
$('#cmbEstado').empty().append('<option>Carregar Estados</option>>');
$('#cmbCidade').empty().append('<option>Carregar Cidades</option>');
}
}); 
</script>	
</body>
</html>