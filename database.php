<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sem título</title> 	
</head>

<body>
<div class="card bg-dark">
<div class="card-header">Gerador de CSV</div>
<div class="card-body">
<div class="row">
	
<div class="col form-group">
<label>Country</label>
<select name="Country" class="form-control form-control custom-select" id="Country">
</select>
<input name="Countrybtn" type="button" class="botao" id="Countrybtn" value="Carregar Pais"/>		
</div>
	
<div class="col form-group">
<label>State</label>	
<select class="form-control form-control custom-select" name="State" id="State">
</select>
</div>

<div class="col form-group">
<label>City</label>	
<select class="form-control form-control custom-select" name="City" id="City">	
</select>
</div>	
<div class="col form-group">
<label>Species</label>	
<select class="form-control form-control custom-select">
<?php
$query 			= "SELECT DISTINCT Species FROM `geolocations` ORDER BY Species ASC";
$result 		= $mysqli->query($query);
while ($row 	= $result->fetch_assoc()) {	
$Species		= 	$row["Species"];
echo("<option value='$Species'>$Species</option>");
}
?>	
</select>
</div>
<div class="col form-group">
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
</div>	
	
<table width="100%" class="table table-sm table-dark table-striped table-bordered table-hover" id="Table">
<caption>Exemplo de CSV</caption>	
<tr>
<td>Country</td>
<td>State</td>
<td>City</td>
<td>Latitude</td>
<td>Longitude</td>
<td>Species</td>
<td>Deformity</td>	
</tr>
<tbody id="Show_Country">		
</tbody>
</table>
<a class="btn btn-primary btn-lg btn-block" href="#" role="button">Download CSV</a>
	
</div>	
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#Countrybtn').click(function(e){
$.getJSON('load_data.php?opcao=Country', function (dados){
if (dados.length > 0){
var option = '<option>Country</option>';
$.each(dados, function(i, obj){
option += '<option value="'+obj.Country+'">'+obj.Country+'</option>';
})
$('#Country').html(option).show();
}else{
Reset();
}
})
})
$('#Country').change(function(e){
var Country = $('#Country').val();
$.getJSON('load_data.php?opcao=State&valor='+Country,
function (dados){
if (dados.length > 0){
var option = '<option>Selecione o Estado</option>';
var table = '<tr><td></td></tr>'	
$.each(dados, function(i, obj){
option 	+= '<option value="'+obj.State+'">'+obj.State+'</option>';
table 	+= '<tr><td>'+obj.State+'</td></tr>'	
})
}else{
Reset();
}
$('#State').html(option).show();
$('#Table').html(table).show();	
})
})
$('#State').change(function(e){
var State = $('#State').val();
$.getJSON('load_data.php?opcao=City&valor='+State,
function (dados){
if (dados.length > 0){
var option = '<option>Selecione a Cidade</option>';
var table = '<tr><td></td></tr>'	
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
