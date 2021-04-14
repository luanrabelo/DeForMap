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

$iphone 		= strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad 			= strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android 		= strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre		= strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry 			= strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod			= strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian 		= strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
$windowsphone 	= strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");
 
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) 
{$dispositivo = "Mobile";} else { $dispositivo = "PC";}


function Country($mysqli) {  
$output 	= '';  
$sql 		= "SELECT DISTINCT Country FROM `geolocations` ORDER BY Country ASC";  
$result 	= mysqli_query($mysqli, $sql);  
while($row = mysqli_fetch_array($result)){  
$output .= '<option value="'.$row["Country"].'">'.$row["Country"].'</option>';  
}  
return $output;  
}  
function Species($mysqli) {  
$Species 		= '';  
$sqlSP 			= "SELECT DISTINCT Species FROM `geolocations` ORDER BY Species ASC";  
$resultSP 		= mysqli_query($mysqli, $sqlSP);  
while($rowSP 	= mysqli_fetch_array($resultSP)){  
$Species 	.= '<option value="'.$rowSP["Species"].'">'.$rowSP["Species"].'</option>';  
}  
return $Species;  
} 



?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta property="og:title" content="DeFrogMap - Deformed Frogs Map">
<meta property="og:description" content="DeFrogMap foi desenvolvido pelo Rhinella Lab (Colocar mais alguma infomação aqui).">
<meta property="og:image" content="img/logo_toad_108.png">
<meta property="og:url" content="https://luanrabelo.bio.br/DeFrogMap">	
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="	anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://kit.fontawesome.com/7d94912b47.js" crossorigin="anonymous"></script>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 	
<link rel="stylesheet" href="css/style.css"/>	
<title>DeFrogMap - Deformed Frogs Map</title>
<link rel="shortcut icon" href="img/logo_toad_108.png" />	
</head>

<body class="text-monospace text-center text-white bg-dark">
<div class="container-fluid w-100 mt-0 ml-0 mr-0 mb-0 min-vh-100">
<div class="row text-center">
<?php
if($dispositivo == "PC"){
echo("<figure class='figure'>");
echo("<div class='col'><a href='index.php'><img src='img/logo_toad_108.png' width='42' height='42' alt=''></a></div>");
echo("<figcaption style='margin-left: 20px;' class='figure-caption text-center text-monospace text-white'>DeFrogMap - Deformed Frogs Map</figcaption>");	
echo("</figure>");	
}
?>	
<div class="col"><span class="align-middle"><a href="index.php"><i class="fas fa-home"></i> Home</span></a></div>
<div class="col"><span class="align-middle"><a href="index.php?p=database"><i class="fas fa-database"></i> Database</span></a></div>
<div class="col"><span class="align-middle"><i class="fas fa-address-card"></i> About</span></div>
<div class="col"><span class="align-middle"><i class="fas fa-user"></i> User</span></div>	
</div>	
<?php
$pagina['database']	= "database.php";
$pagina['cds_user'] = "op_user.php";	
if (isset($_GET["p"])){
$link = $_GET["p"];
if (file_exists($pagina[$link])){
include_once $pagina[$link];
} else {
        //die (include_once '../includes/pagina_erro.php');
}}
else 
{
include("home.php");
}	
?>		
</div>	
</body>
</html>