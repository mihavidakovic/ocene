<?php include 'includes/header.php'; ?>

<?php 
if (isset($_GET['ime'])) {
	$id = $_GET['ime'];
		$result = mysqli_query($con, "SELECT * FROM uporabniki");
		echo '
			<div class="page-header">
			  <h1>Povprečje vseh učencev <small>pri predmetu <span style="text-transform: uppercase">' . $_GET['ime'] . '</span></small></h1>
			</div>

		';
		while ($uporabnik = mysqli_fetch_assoc($result)) {
		echo '<div class="col-lg-3">';
			$predmeti = [$_GET['ime']];
			foreach($predmeti as $imepredmeta) {
				echo '
				<div class="panel panel-default">
					<div class="panel-heading">
						' . $uporabnik['ime_priimek'] . '
					</div>
					<div class="panel panel-body">
				';
				$ocene = mysqli_query($con,"SELECT ROUND(AVG(ocena), 1) as `povprecje` FROM ocene WHERE predmet = '". $imepredmeta . "' AND uporabnik_id='". $uporabnik['id'] . "'");
				while ($ocena = mysqli_fetch_assoc($ocene)) {
					  echo $ocena['povprecje'];
					  }
					    echo '
					     </div>
					   </div>';
			}
			echo '</div>';
		}
			
}






 ?>


<?php include 'includes/footer.php'; ?>
