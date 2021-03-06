<?php BambuTema_header($page); global $root; ?>
   
<div class="container" style="background:url(<?php echo $root; ?>/img/stripes.png);">            
  <section class="row white">
    
    <div class="seven columns blogpost">
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

    <div class="four columns push_one grey sidebar">

    	<?php if ($page['sidebar_first']): ?>
    	<aside id="sidebar-first" role="complementary" >
      <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>
      <?php if ($page['sidebar_second']): ?>
      <aside id="sidebar-second" role="complementary">
      <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>
      
    </div>
   
  </section>
</div>    
     
<?php BambuTema_footer($page);?>