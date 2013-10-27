<?php include 'includes/header.php'; ?>


<?php 
	if (isset($_GET['predmet'])) {
		$predmet = $_GET['predmet'];
		$ocena = $_GET['ocena'];
		$sql = mysqli_query($con, "INSERT INTO ocene (ocena, predmet, uporabnik_id, datum) VALUES ('$_GET[ocena]', '$_GET[predmet]', '$_GET[uporabnik]', '".date('Y-m-d H:i:s')."')");
		echo "<h3>Ocena dodana</h3>";
		 header("Location: dodaj-oceno.php?dodana=true");
	} else {
		echo "ni dodano";
	}
 ?>


 <?php include 'includes/footer.php'; ?>
