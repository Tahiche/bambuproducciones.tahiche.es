<?php BambuTema_header($page); global $root; ?>
 
 <?php 
print ($edit_tabs);
?>


<!-- CONTACT CONTAINER // sidesblack -->
<div class="container white">
	<section class="row white  "> 
	<div id="map">
</div>
</section>
<section class="row white ">
	<!-- FORM COLUMN -->
	<div class="seven columns leftpadding bigpadding" data-role="form">
		<h3 class="extrabold blacktext midbottommargin seriftitle"><?php echo t('Contacte con nosotros');?></h3>
		<p class="meta">
			<?php echo t('Rellene el formulario y le responderemos lo mas pronto posible.');?>
		</p>
		  <?php $block = module_invoke('contact_form_blocks', 'block_view', '0'); ?>	
                  <?php print $block['content']; ?>
		<div class="row midpadding" id="success">
		</div>
	</div>
	<!-- SIDEBAR -->
	<div class="four columns push_one  bigpadding">
		<div class="twelve columns smallmargin">
			<h5 class=" smallbottompadding"><?php echo t('Donde Estamos');?></h5>
			<p class="meta ">
				 Avenida de Europa 34B 2ºIzq<br>
				 28023 Madrid<br/><br/>
				<span class="extrabold">Tel:</span>  91 799 25 41<br/>
				<span class="extrabold">email:</span> info@bambuproducciones.com
			</p>
		</div>
		<div class="twelve columns blackhorizontal midmargin">
		</div>
		
	</div>
	</section>
</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script src="<?php echo $themepath;?>/js/maps.js">
</script>
<script type="text/javascript">
//<![CDATA[
    var map;
    jQuery(document).ready(function(){
    prettyPrint();
    map = new GMaps({
    div: '#map',
    lat: 40.445939,
    lng: -3.787483,
    });
    map.addMarker({
    lat: 40.445939,
    lng: -3.787483,
    title: 'Bambu Producciones',
    click: function(e){
    if(console.log)
    console.log(e);
    // alert('You clicked in this marker');
    }
    });
    });
    //]]>
    </script>
     
<?php BambuTema_footer($page);?>