<?php
function Conectar(){
try{
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$con = new PDO("mysql:host=deformed.mysql.dbaas.com.br; dbname=deformed;", "deformed", "luan481516", $opcoes);
return $con;
} catch (Exception $e){
echo 'Erro: '.$e->getMessage();
return null;
}
}


$opcao = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';

if (! empty($opcao)){
switch ($opcao)
{
case 'Country':
{
echo Country();
break;
}
case 'State':
{
echo State($valor);
break;
}
case 'City':
{
echo City($valor);
break;
}
case 'Luan':
{
echo Luan();
break;
}
}
}

function Country(){
$pdo = Conectar();
$sql = 'SELECT DISTINCT Country FROM `geolocations` ORDER BY Country ASC';
$stm = $pdo->prepare($sql);
$stm->execute();
sleep(1);
echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
$pdo = null;
}

function State($pais){
$pdo = Conectar();
$sql = 'SELECT DISTINCT State FROM `geolocations` WHERE Country = ? ORDER BY State ASC';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $pais);
$stm->execute();
sleep(1);
echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
$pdo = null;
}

function City($estado){
	$pdo = Conectar();
	$sql = 'SELECT DISTINCT City FROM `geolocations` WHERE State = ? ORDER BY City ASC';
	$stm = $pdo->prepare($sql);
	$stm->bindValue(1, $estado);
	$stm->execute();
	sleep(1);
	echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	$pdo = null;
}
function Luan(){
$Title 		= 	$_GET["Title"];
$Species 	= 	$_GET["Species"];
$Deformity 	= 	$_GET["Deformity"];	
$User	=	"luanrabelo@outlook.com";	
$pdo 	= 	Conectar();
$sql 	= 	"INSERT INTO `geolocations`(`Title`, `Species`, `Deformity`, `UserEmail`) VALUES ('$Title', '$Species', '$Deformity', '$User')"; 
$stm 	= 	$pdo->prepare($sql);
$stm->execute();
sleep(1);	
$pdo = null;	
}
?>  
