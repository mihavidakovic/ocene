<?php include 'includes/header.php'; ?>

<?php 
if (isset($_GET['ime'])) {
	$id = $_GET['ime'];


	$vsiuporabniki = mysqli_query($con, "SELECT * 
										 FROM uporabniki"); 


	while ($uporabniki = mysqli_fetch_assoc($vsiuporabniki)) {
		$vseocene = mysqli_query($con, "SELECT * 
										FROM ocene 
										WHERE predmet='" . $_GET['ime'] . "'  AND uporabnik_id='" . $uporabniki['id'] . "' ORDER BY ocena LIMIT 1"); 



		while ($ocena = mysqli_fetch_assoc($vseocene)) {
				$prikazi = mysqli_query($con, "SELECT ROUND(AVG(ocena), 1) as `povprecje` 
												FROM ocene 
												WHERE predmet='" . $_GET['ime'] . "' AND uporabnik_id='" . $uporabniki['id'] . "'"); 


						while ($top = mysqli_fetch_assoc($prikazi)) {
							$vsiuporabniki = mysqli_query($con, "SELECT * 
										 						FROM uporabniki ORDER BY " . $prikazi['povprecje'] .  ""); 

						}


		}
	}











		// $josip = mysqli_query($con,"SELECT ROUND(AVG(ocena), 1) as `povprecje` FROM ocene WHERE predmet = '". $_GET['ime'] . "' AND uporabnik_id='". $uporabnik['id'] . "'");
		// while ($top = mysqli_fetch_assoc($josip)) {


		// 	$result = mysqli_query($con, "SELECT * FROM uporabniki");
		// 	while ($uporabnik = mysqli_fetch_assoc($result)) {
		// 	echo '<div class="col-lg-3">';
		// 		$predmeti = [$_GET['ime']];
		// 		foreach($predmeti as $imepredmeta) {
		// 			echo '
		// 			<div class="panel panel-default">
		// 				<div class="panel-heading">
		// 					' . $imepredmeta . '
		// 				</div>
		// 				<div class="panel panel-body">
		// 			';
		// 			$ocene = mysqli_query($con,"SELECT ROUND(AVG(ocena), 1) as `povprecje` FROM ocene WHERE predmet = '". $imepredmeta . "' AND uporabnik_id='". $uporabnik['id'] . "'");
		// 			while ($ocena = mysqli_fetch_assoc($ocene)) {
		// 		    echo $ocena['povprecje'];
		// 		    }
		// 		      echo '
		// 		     	 </div>
		// 		     </div>';
		// 		}
		// 		echo '</div>';
		// 	}
		// }
	}





 ?>


<?php include 'includes/footer.php'; ?>
