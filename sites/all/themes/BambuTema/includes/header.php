<?php 
  function BambuTema_header($page){
  global $root; 
?>

  <header data-0="top:40px;" data-top-top="top:0px;" class="boxshadow">
    <div class="container">     
      <section class="row">  
        
      	<div class="seven columns"> 
          <div id="nav">
            <!-- begin menu -->
            <nav id="navigationmain">
            
		          <?php 
				  //print theme('links__system_main_menu'
				 /* print theme('links__system_menu_menu_principal', array(
		            'attributes' => array(
		              'id' => 'main-menu-links',
		              'class' => array('links', 'clearfix'),
		            ),
		            'heading' => array(
		              'text' => t('Main menu'),
		              'level' => 'h2',
		              'class' => array('element-invisible'),
		            ),
		          )); */
				  
				  print theme('links', array(
				  'links' => menu_navigation_links('menu-menu-principal'),
				  'attributes' => array(
		              'id' => 'main-menu-links',
		              'class' => array('links', 'clearfix'),
		            ),
				  ));
		          ?>
            
            </nav>
				  </div>    
				</div> 
                
      <div class="five columns branding" >
          
		 	
		 
            <a id="logoheader" href="<?php print base_path();?>"><img id="logo_b" src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/img/logobambu.gif" />
            <img id="osoimg" data-0="height:82px" data-top-top="height:0px" src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/img/oso.png" />
            </a>
            
            <div id="language_select"><?php  
 $block = module_invoke('locale', 'block_view', 'language_content');
print render ($block['content']);
?></div>	  
         
          
          
            
            
        </div>
			 
      <!-- end menu -->   
      </section> 
    </div>
    <!-- end main span2 -->            
  </header> 
 

<?php 
 
}

?>