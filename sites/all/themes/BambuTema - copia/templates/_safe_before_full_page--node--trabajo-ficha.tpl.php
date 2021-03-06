<?php 
	global $root; 
	BambuTema_header($page);
	
?>

<?php 
/* si no hay banner */
if (isset($node->field_portfolio_stripe_banner['und'][0]) == "") : ?>
<div id="basic_banner" class="container bigtoppadding midtoppadding" style="background:url(<?php echo $root; ?>/img/stripes.png);">
  <section class="row midbottompadding bigtoppadding">
	  <h2 class="black whitetext bold leftpadding rightpadding"><?php print $title; ?></h2>
      
      <?php if (isset($node->field_detalles_ficha) != "") : ?>
<div id="ficha_tec" class="two columns push_six whitetext">
 <?php  //krumo($node);  
 print render(field_view_field('node', $node, 'field_detalles_ficha','default'));
  ?>  
</div>
<?php endif; ?>

	</section>
</div>   
<?php endif; ?>

<?php if (isset($node->field_portfolio_stripe_banner['und'][0]) != "") : ?>
<div class="container bigpadding" style="background:url(<?php echo file_create_url($node->field_portfolio_stripe_banner['und'][0]['uri']);  ?>);background-position:center;">
  <section class="row largetoppadding bigbottompadding">
  
  <?php if (isset($node->field_detalles_ficha) != "") : ?>
<div id="ficha_tec" class="two columns push_six whitetext">
 <?php  //krumo($node);  
 print render(field_view_field('node', $node, 'field_detalles_ficha','default'));
  ?>  
</div>
<?php endif; ?>


    <h2 class="whitetext bold midbottommargin center"><?php print $title; ?></h2>
    <div class="five columns alpha centered whitehorizontal"></div>
  </section>
</div>
<?php endif; ?>






<?php if ($tabs = render($tabs)): ?>
  <div class="container white midpadding">
    <div class="row">
	    <div id="drupal_tabs" class="tabs midtoppadding">
	      <?php 
		   print render($tabs); ?>
	    </div>
    </div>
  </div>
<?php endif; ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?>
  <ul class="action-links">
    <?php print render($action_links); ?>
  </ul>
<?php endif; ?>

<div class="container white bigpadding trabajocontent content" <?php print $content_attributes; ?>>
  <section class="row">   


	  <?php print render($title_prefix); ?>
	  <?php print render($title_suffix); ?>
	  <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      
      
       
	  <?php print render($page['content']); ?>
	  
  </section>
</div>
	          
<?php BambuTema_footer($page);?>