<?php BambuTema_header($page); global $root; ?>
 
 <?php 
print ($edit_tabs);
?>

<div class="container" style="background:url(<?php echo $root; ?>/img/Carta_de_ajuste.jpg);">            
  <section class="row ">
    
    <div class="ten columns blogpost white  largepadding  push_one">
      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>
      
	      <?php print render($page['help']); ?>
	      <?php if ($action_links): ?>
	        <ul class="action-links">
	          <?php print render($action_links); ?>
	        </ul>
	      <?php endif; ?>
          <div class="ten columns push_one">
      <?php print render($page['content']); ?>
      </div>
      
    </div>

    
  </section>
</div>    
     
<?php BambuTema_footer($page);?>