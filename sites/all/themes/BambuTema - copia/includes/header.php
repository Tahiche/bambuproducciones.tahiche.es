<?php 
  function BambuTema_header($page){
  global $root; 
?>

  <header>
    <div class="container">     
      <section class="row">  
        
      	<div class="eight columns"> 
          <div id="nav">
            <!-- begin menu -->
            <nav id="navigationmain">
            
		          <?php print theme('links__system_main_menu', array(
		            'attributes' => array(
		              'id' => 'main-menu-links',
		              'class' => array('links', 'clearfix'),
		            ),
		            'heading' => array(
		              'text' => t('Main menu'),
		              'level' => 'h2',
		              'class' => array('element-invisible'),
		            ),
		          )); 
		          ?>
            
            </nav>
				  </div>    
				</div> 
                
      <div class="four columns branding" >
          <?php
		 		  
		   if (theme_get_setting('branding_type') == 'logo'): ?>
            <a id="imglogo" href="<?php print base_path();?>"><img src="sites/default/logobambu.gif
			<?php 
			//print file_create_url(theme_get_setting('bg_path')); 
			?>" /></a>
          <?php endif; ?>
          <?php if (theme_get_setting('branding_type') == 'textXXXX'): ?>
            <a href="<?php print base_path();?>">
              <h1 id="main_title_text"><?php print variable_get('site_name'); ?></h1>
              <h2 id="main_title_slogan"><?php print variable_get('site_slogan'); ?></h2>
            </a>
            
            <a href="<?php print base_path();?>">
              <h5 id="main_title_text" class="whitetext"><?php print variable_get('site_name'); ?></h5>
             
            </a>
            
          <?php endif; ?>
          
          
            
            
        </div>
				 
      <!-- end menu -->   
      </section> 
    </div>
    <!-- end main span2 -->            
  </header> 
 
<?php }
?>