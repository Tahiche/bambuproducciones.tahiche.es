<?php 
global $root;
BambuTema_header($page);?>
   <?php 
print ($edit_tabs);
?>
<!-- STRIPES BACKGROUND -->

 
  <div class="container white"  style="background:url(<?php echo $root; ?>/img/bambufondo.jpg) repeat-x white;">      
    <div class="row white">
    <div class="bigpadding"></div>
    
      <div class="<?php if (theme_get_setting('page_layout') == 'sidebar_right') { echo "eight columns"; } else { echo "twelve columns"; } ?>">
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
       	 
       	
	      <?php print render($page['help']); ?>
	      <?php if ($action_links): ?>
	        <ul class="action-links">
	          <?php print render($action_links); ?>
	        </ul>
	      <?php endif; ?>
       	
       	<?php 
		// krumo($node_content);
		print "<h1>".$title."</h1>";
		?>
        <div class="bigpadding largefont">
		<?php print render($node_content['body']);?>
        </div>
        
<!-- THICK STRIPE BORDER -->
<div class="smallpadding" style="background: url('<?php echo $root; ?>/img/Carta_de_ajuste.jpg') 240px 0px;" >
</div>


		<h3 class="bigtoppadding" ><?php echo t('Equipo'); ?></h3>
		<?php
		print render($node_content['field_equipo']);
		/*print render($page['content']);*/ ?>
        
        <h3 class="bigtoppadding" ><?php echo t('Colaboradores'); ?></h3>
		<?php
		print render($node_content['field_colaboradores']);
		
		//print  render($page['content']); ?>
        
    
      </div>
  </div>
  </div>
<?php print $messages; ?>
  
<?php BambuTema_footer($page);?>