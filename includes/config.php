<?php 
$con = mysqli_connect("localhost", "root", "", "ocene2") or die(mysqli_error());


// GLAVNE NASTAVITVE

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = mysqli_query($con, "SELECT * FROM ocene WHERE predmet='" . $_GET['id'] . "' LIMIT 1");
	while ($ocena = mysqli_fetch_assoc($sql)) {
		$imepredmeta = $ocena['predmet'];
	}
}

$imestrani = "Ocene v2";
$predmet1 = "slo";
$predmet2 = "mat";
$predmet3 = "nubp";
$predmet4 = "vos";
$predmet5 = "npa";
$predmet6 = "nsa";
$predmet7 = "soc";
$predmet8 = "anj";
$predmet9 = "oos";
$predmet10 = "fiz";
$predmet11 = "sap";
$predmet12 = "npap";

 ?>