<?php
$UserEmail = "luanrabelo@outlook.com";

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

$fileHandle = fopen("csv/FieldScope_Table.csv", "r");
 

while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
if($row[1] != "Station Name"){
$sql = ("INSERT INTO `geolocations`(`Title`, `Deformity`, `latitude`, `longitude`, `Country`, `State`, `City`, `UserEmail`) VALUES ('$row[2]', '$row[15]', '$row[3]', '$row[4]', '$row[11]', '$row[10]', '$row[9]', '$UserEmail')");
$querry 	= mysqli_query($mysqli, $sql) or die ("Fudeu");		
    //echo 'Latitude: ' . $row[3] . '<br>';
    //echo 'Longitude: ' . $row[4] . '<br>';
    //echo 'Title: ' . $row[2] . '<br>';
	//echo 'Data: ' . $row[6] . '<br>';
	//echo 'City: ' . $row[9] . '<br>';
	//echo 'State: ' . $row[10] . '<br>';
	//echo 'Country: ' . $row[11] . '<br>';
	//echo 'Malformation: ' . $row[15] . '<br>';
    //echo '<br>';
}}
?>