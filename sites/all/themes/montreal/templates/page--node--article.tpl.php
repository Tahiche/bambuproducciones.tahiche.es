<?php montreal_header($page); global $root; ?>
   
<div class="container" style="background:url(<?php echo $root; ?>/img/stripes.png);">            
  <section class="row">
    
    <div class="ten columns blogpost white push_one">
      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>
       <?php if ($tabs = render($tabs)): ?>
			    <div id="drupal_tabs" class="tabs">
			    <?php print render($tabs); ?>
			    </div>
			  <?php endif; ?>
	      <?php print render($page['help']); ?>
	      <?php if ($action_links): ?>
	        <ul class="action-links">
	          <?php print render($action_links); ?>
	        </ul>
	      <?php endif; ?>
      <?php print render($page['content']); ?>
    </div>

    
   
  </section>
</div>    
     
<?php montreal_footer($page);?>