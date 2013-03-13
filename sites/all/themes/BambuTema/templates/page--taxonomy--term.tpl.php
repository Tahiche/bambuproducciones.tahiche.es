<?php BambuTema_header($page); global $root;?>
     <?php 
print ($edit_tabs);
?>
  <?php print render($page['help']); 

?>
  
<div class="container bigtoppadding bigbottompadding" >
<?php //krumo($page['content']['system_main']['term_heading']); ?>
	<section class="row  bigpadding smallbottommargin"   data-0="opacity: 1;height:20% " data-150="opacity:0; height:0%">
    <div class="six columns"  style="height:100%;" >
  	<h1 class="italic whitetext "><?php print $title; ?></h1>
    
    <div id="tax_description"  class="white blacktext smallsidepadding meta"><?php 
	$page['content']['system_main']['term_heading']['term']['format']='very_simple_html';
	
	$display = array('type' => 'very_simple_html');

    //print check_markup($page['content']['system_main']['term_heading']['term']['description']['#markup'], 'very_simple_html', '', TRUE);
	
	print render($page['content']['system_main']['term_heading']['term']['description']) ; ?></div>
    </div>
  </section> 
        
  <div id="" class="row">
    <div id ="main_content_wrap" class="twelve columns">
      <div id="main_content">
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php
		  hide($page['content']['system_main']['term_heading']);
		 print render($page['content']); ?>
      </div>
    </div>   
  </div>
</div>
  
<?php BambuTema_footer($page);?>