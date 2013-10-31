<?php include 'includes/header.php'; ?>
		<?php 

		$result = mysqli_query($con, "SELECT * FROM uporabniki");
		while ($uporabnik = mysqli_fetch_assoc($result)) {
			$predmeti = [$predmet1, $predmet2, $predmet3, $predmet4, $predmet5, $predmet6, $predmet7, $predmet8, $predmet9, $predmet10, $predmet11, $predmet12];
			echo '<div class="col-lg-6">';
			echo '<div class="o-uporabniku col-lg-12">';
			echo '<div class="col-lg-1 slika">';
			echo '<img class="pull-left" src="' . $uporabnik['slika'] . '">';
			echo '</div>';
			echo '<div class="col-lg-11 col-md-11 ime"><h2><a href="' .  $urlStrani . '/profil/' . $uporabnik['id'] . '">' . $uporabnik['ime_priimek'] . ', ' . $uporabnik['razred'] .'</a></h2></div>';
			echo '</div>';
			echo '
				<table class="table table-bordered table-hover">
				        <thead>
				          <tr>
				            <th>' . $uporabnik['ime_priimek'] . '</th>
				            <th>1. konferenca</th>
				            <th>2. konferenca</th>
				            <th>Povprečje</th>
				          </tr>
				        </thead>
				        <tbody>';
			foreach($predmeti as $imepredmeta) {

			
				echo '<tr>
			            <td class="predmet"><a href="predmet.php?ime=' . $imepredmeta . '">' . $imepredmeta. '</a></td>';
			    echo '<td>';
 $ocene = mysqli_query($con, "SELECT * FROM ocene WHERE predmet='". $imepredmeta ."' AND uporabnik_id='". $uporabnik['id'] . "'");
				while ($ocena = mysqli_fetch_assoc($ocene)) {
			    echo $ocena['ocena'] . ", ";
			      }
			 	echo '</td>';
			 	echo '<td></td>';
			 	echo '<td>';
				$ocene = mysqli_query($con,"SELECT ROUND(AVG(ocena), 1) as `povprecje` FROM ocene WHERE predmet = '". $imepredmeta . "' AND uporabnik_id='". $uporabnik['id'] . "'");
				while ($ocena = mysqli_fetch_assoc($ocene)) {
			    echo $ocena['povprecje'];
			      }

			 	echo '</td>';
			 	echo '</tr>';
			}
			echo '</tbody>
		      </table>
		      ';
		      echo "</div>";
		}
		 ?>


<?php include 'includes/footer.php'; ?>