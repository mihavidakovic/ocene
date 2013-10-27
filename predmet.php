<?php include 'includes/header.php'; ?>

<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = mysqli_query($con, "SELECT * FROM ocene WHERE predmet='" . $_GET['id'] . "' LIMIT 1");
	while ($ocena = mysqli_fetch_assoc($sql)) {
	}
}

 ?>


<?php include 'includes/footer.php'; ?>
