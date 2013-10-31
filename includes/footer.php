	</div>
</div>
<footer id="footer">
	<div class="container">
		<p>Copyrights by Miha Vidakovič.</p>
	</div>
</footer>
<script src="<?php echo $urlStrani; ?>/js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $urlStrani; ?>/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src='<?php echo $urlStrani; ?>/js/nprogress.js'></script>
	<script src='<?php echo $urlStrani; ?>/js/lightbox.min.js'></script>
	<script type="text/javascript" charset="utf-8">
NProgress.start();
NProgress.set(0.4);
//Increment 
var interval = setInterval(function() { NProgress.inc(); }, 1000);
$(document).ready(function(){
    NProgress.done();
    clearInterval(interval);
});

	</script>
 <script  type="text/javascript">
$( document ).ready(function() {
	$(".alert").addClass("fadeIn").delay(2500).queue(function(next){
	    $(this).addClass("fadeOut");
	    next();
	});
});
 </script>
</body>
</html>