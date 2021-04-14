<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sem título</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 	
	
<script>
$(document).on("keyup", "#Title", function () {
            var caracteresRestantes = 50;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;
			$(".caracteres").text(caracteresRestantes);
			if (caracteresRestantes < 0){
			var div = document.getElementById("Title");	
			div.classList.add("bg-danger");
			div.classList.add("text-white");	
			}
			if (caracteresRestantes > 0){
			var div = document.getElementById("Title");		
			div.classList.add("bg-success");
			div.classList.add("text-white");	
			}
			if (caracteresRestantes < 0){
			var div = document.getElementById("Title");	
			div.classList.add("bg-danger");
			div.classList.add("text-white");	
			}
        });	
</script>	
</head>

<body>
<form>
<div style="margin: 0 auto;" class="form-group w-75">
<br>	
<label>Title</label>
<input name="Title" type="text" class="form-control form-control-lg" id="Title">
<small class="form-text text-muted"><span class="caracteres" id="remaining">100</span> Restantes</small>

<br>
	
<label>Species</label>
<input name="Species" type="text" class="form-control form-control-lg" id="Species">

<br>	

<label>Deformity</label>
<input name="Deformity" type="text" class="form-control form-control-lg" id="Deformity">

<br><br>	
	
<div>	
<div  class="form-group">
<label>Geolocation</label>	
<div class="row">
<div class="col">
<label>Latitude<sup>*</sup></label>	
<input type="text" class="form-control" placeholder="" name="Latitude" id="Latitude">
<small class="form-text text-muted">Ex. -0.9681</small>	
</div>
<div class="col">
<label>Longitude<sup>*</sup></label>	
<input type="text" class="form-control" placeholder="" name="Longitude" id="Longitude">
<small class="form-text text-muted">Ex. -46.7338</small>	
</div>
</div>	
</div>
<div class="form-group">	
<div class="row">
<div class="col">
<label>Continent<sup>*</sup></label>	
<input type="text" class="form-control" placeholder="">	
</div>
	
<div class="col">
<label>Country<sup>*</sup></label>	
<input name="Country" type="text" class="form-control" id="Country" placeholder="" autocomplete="on">
</div>
	
<div class="col">
<label>State<sup>*</sup></label>	
<input type="text" class="form-control" placeholder="">
</div>	
<div class="col">
<label>City<sup>*</sup></label>	
<input type="text" class="form-control" placeholder="">
</div>		
</div>	
</div>	
</div>
<small>* Obrigatório</small>	
<br><br>	
	
<div>
<label>Small Description</label>
<textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
<div class="invalid-feedback">Pequena descrição, até XX caracteres</div>
</div>
<br><br>
<div>
<label>Full Description</label>
<textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
<div class="invalid-feedback"></div>
</div>
<br><br>	
<label>Photos</label>	
<input type="file" class="form-control-file" id="exampleFormControlFile1">	
</div>	
<input name="cds" type="button" id="cds">	
</form>
<script type="text/javascript">
$(document).ready(function(){
$('#cds').click(function(e){
var Title 		= $('#Title').val();
var Species 	= $('#Species').val();
var Deformity 	= $('#Deformity').val();
var Latitude 	= $('#Latitude').val();
var Longitude 	= $('#Longitude').val();	
	
$.getJSON('load_data.php?opcao=Luan&Title='+Title+'&Species='+Species+'&Deformity='+Deformity+'&Latitude='+Latitude+'&Longitude'+Longitude, function (dados){
})
function Reset(){
$('#cmbPais').empty().append('<option>Carregar Países</option>>');
$('#cmbEstado').empty().append('<option>Carregar Estados</option>>');
$('#cmbCidade').empty().append('<option>Carregar Cidades</option>');
}
})});
</script>	
<br><br>	
</body>
</html>