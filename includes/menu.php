<nav class="navbar navbar-fixed-top navbar-default animated fadeInDownBig" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $urlStrani; ?>/index.lol"><?php echo $imestrani; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo $urlStrani; ?>">Ocene</a></li>
        <li><a href="povprecje.lol">Povprečje</a></li>
        <li><a href="changelog.lol">Changelog</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="dodaj-oceno.php" style="padding: 7px 0 0 0;"><div class="btn btn-primary">Dodaj oceno</div></a></li>
        </ul>
    </div>
  </div>
</nav>
