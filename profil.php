<?php include 'includes/header.php'; ?>


<?php 

    if (isset($_GET['id'])) {
      if (isset($_GET['dodan']) && $_GET['dodan']=="true") {
        echo '<div class="alert alert-success uspesno-dodana animated ">Komentar uspešno dodan, brez razburjanja!</div>';
      } else {
      }
          echo '
              <div class="col-lg-4 pull-right">
      <div class="panel panel-default">
        <div class="panel-heading">Uporabniki</div>
        <div class="panel-body">
        <ul class="uporabniki">';
    $result = mysqli_query($con, "SELECT * FROM uporabniki");
    while ($uporabnik = mysqli_fetch_assoc($result)) {
      echo '<li clas="col-lg-12">';
      echo '<div class="col-lg-2 col-md-1 col-sm-1 col-xs-1"><img src="' . $uporabnik['slika'] . '"></div>';
      echo '<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11"><a href="' .  $urlStrani . '/profil/' . $uporabnik['id'] . '">' . $uporabnik['ime_priimek'] . ', ' . $uporabnik['razred'] . '</a></div>';
      echo '</li>';
    }

       echo '</ul>
        </div>
      </div>
    </div>

    ';

        $id = $_GET['id'];
        $sql = mysqli_query($con, "SELECT * FROM uporabniki WHERE id='$id'");
        $uporabnik = mysqli_fetch_array($sql);
            $result = mysqli_query($con, "SELECT * FROM ocene WHERE uporabnik_id='$id'");
            $num_rows = mysqli_num_rows($result);
                $enka = mysqli_query($con, "SELECT * FROM ocene WHERE uporabnik_id='$id' AND  ocena=1");
                $negativne = mysqli_num_rows($enka);

        echo '
            <div class="col-lg-8">
                <div class="panel panel-default">
                  <div class="panel-body">
                        <div class="no pull-right">
                          <h3 class="text-muted" style="margin: -5px 0 0 0">#' . $uporabnik['id'] .'</h3>
                        </div>
                        <div class="col-lg-3 no-padding"><a href="' . $uporabnik['slika'] . '" data-lightbox="image-1" title="' . $uporabnik['ime_priimek'] . '"><img width="100%" src="' . $uporabnik['slika'] . '"></a></div>
                        <div class="col-lg-9" style="margin: -20px 0 0 0;">
                            <p><b>Ime</b>: &nbsp;' . $uporabnik['ime_priimek'] . '</p>
                            <p><b>Spol</b>: &nbsp;' . $uporabnik['spol'] . '</p>
                            <p><b>Razred</b>: &nbsp;' . $uporabnik['razred'] . '</p>
                            <p><b>Število vseh ocen</b>: &nbsp;' . $num_rows . '</p>';
                            if ($negativne==0) {
                              echo '<p><b>Število negativnih ocen: </b>' . $negativne .', <b>bravo!</b></p>';
                            } elseif ($negativne>=1) {
                              echo '<p class="text-danger"><b>Število negativnih ocen: </b>' . $negativne . '</p>';
                            }
                            echo '</p>';
                              $resulte = mysqli_query($con, "SELECT ROUND(AVG(ocena), 1) as `povprecje` FROM ocene WHERE uporabnik_id='". $uporabnik['id'] ."'");
                                while ($ocena = mysqli_fetch_assoc($resulte)) {
                                  echo '<p><b>Celoletno povprečje</b>: ' . $ocena['povprecje'] .'</p>';
                                }

                        echo '
                        </div>
                  </div>
                </div>
            </div>
        ';
        echo '
        <div class="col-lg-8">
          <div class="panel panel-default">
          <div class="panel-heading">Dodaj komentar (<b>Anonimno</b>)</div>
          <div class="panel-body">
            <form role="form" action="dodaj-komentar.php?id='. $id . '" method="POST" class="col-lg-12">
              <div class="form-group">
                <textarea class="form-control" name="vsebina" placeholder="Vsebina komentarja..."></textarea>
                <input type="hidden" name="uporabnik" value="' . $id . '">
                <input type="hidden" name="datum" value="">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Dodaj</button>
              </div>
            </form>
           </div>
         </div>
         </div>

        <div class="col-lg-8">
          <div class="panel panel-default">
          <div class="panel-heading">Vsi komentarji (';
              $resulti = mysqli_query($con, "SELECT vsebina, COUNT(id) FROM komentarji WHERE uporabnikid='" . $_GET['id'] . "'");
              while ($komentarji = mysqli_fetch_assoc($resulti)) {
                echo $komentarji['COUNT(id)'];
              } 
            echo ')</div>
            <div class="panel-body">
              ';
              $query = mysqli_query($con, "SELECT * FROM komentarji WHERE  uporabnikid='" . $_GET['id'] . "' ORDER BY datum");
              while ($komentar = mysqli_fetch_array($query)) {
                $idkomentar = $komentar['id'];
              echo '
                <div class="komentar col-lg-12">
                  ';
                  if (isset($_GET['g']) && $_GET['g']=="miha") {
                            echo $izbrisikomentar = '<a href="izbrisi_komentar.php?id=' . $idkomentar . '"><button class="btn btn-danger btn-xs pull-right">Izbriši</button></a>';
                  } else {
                    echo "";
                  }
                  echo '
                  <p class="pull-left"><b>' . $komentar['datum'] . '</b>: &nbsp;</p>
                  <p>' . $komentar['vsebina'] . '</p>
                </div>
            ';
              }
              echo '
             </div>
          </div>
        </div>
          ';

    } else {
        echo "non";
    }

 ?>

<?php include 'includes/footer.php'; ?>
