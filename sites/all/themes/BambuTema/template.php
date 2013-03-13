<?php
/* Define $root as a global variable */
global $root;
$root = base_path() . path_to_theme();
//echo "<h1>$root</h1>";
// aqui se incluye funciones de header, footer...
include_once(drupal_get_path('theme', 'BambuTema').'/includes/init.php');



function BambuTema_preprocess_page(&$vars, $hook) {
 // node vars available to page for render
 $vars['themepath']=drupal_get_path('theme',$GLOBALS['theme']);
  $nid = arg(1);
  if (arg(0) == 'node' && is_numeric($nid)) {
    if (isset($vars['page']['content']['system_main']['nodes'][$nid])) {
	  //echo "<h1>".arg(1)."</h1>";
      $vars['node_content'] = & $vars['page']['content']['system_main']['nodes'][$nid];
    }
  }
  
  if (isset($vars['node'])) {
    $suggest = "page__node__{$vars['node']->type}";
    $vars['theme_hook_suggestions'][] = $suggest;
	 }
  //krumo($vars);
  $status = drupal_get_http_header("status");  
  if($status == "404 Not Found") {      
    $vars['theme_hook_suggestions'][] = 'page__404';
  }
  
  //krumo($vars);
  // krumo($vars['node']);
  
  // añadir inline edit
  $inlineedit=edit_trigger_link();
  $vars['edit_tabs']="";
  if($vars['is_admin']) {
  array_unshift($vars['tabs']['#primary'], $inlineedit );
  $vars['edit_tabs']='<div id="edit_tabs">';
  $vars['edit_tabs'].=theme(
	  'ctools_collapsible',
	  array(
		'handle' => t('Editar'), 
		'content' => render($vars['tabs']), 
		'collapsed' => TRUE
	  )
	);
 $vars['edit_tabs'].="</div>";
  }

  
   if (isset($vars['node'])) {
   if($vars['node']->type=="trabajo_ficha"){
	   $vars['detalles_ficha']=render(field_view_field('node',$vars['node'], 'field_detalles_ficha','default'));
	   $vars['logotipo']=render(field_view_field('node', $vars['node'], 'field_logotipo','default'));
	   $vars['texto_promo']=render(field_view_field('node', $vars['node'], 'field_texto_promo','default'));
	   }
	  
	if($vars['front_page']){
		//$vars['slide_imgs']=array();
		} 
   } // fin isset($vars['node'
   
  // krumo($vars['tabs']['#primary']); 
}

function BambuTema_preprocess_node(&$vars, $hook) {
 // echo "<h1>BambuTema_preprocess_page</h1>";
	//template suggestions for nodes in teaser view
//more granular control
  if(drupal_is_front_page ()){ 
        $vars['theme_hook_suggestions'][] = 'node__front';
    }
// Add template suggestion for node teasers
if($vars['teaser']) {
	$vars['theme_hook_suggestions'][] = 'node__teaser';
    $vars['theme_hook_suggestions'][] = 'node__'.$vars['node']->type.'_teaser';   
    $vars['theme_hook_suggestions'][] = 'node__'.$vars['node']->nid.'_teaser';
  }
  //dsm($vars);
//krumo($vars);
}

/*function BambuTema_menu_tree($variables) {
 // return '<nav class="menu">' . $variables['tree'] . '</nav>';
 return $variables;
}*/


/* Assign top level menu list items an ascending class of menu_$number  */
function BambuTema_menu_link(array $variables) {
  unset($variables['element']['#attributes']['class']);
  $element = $variables['element'];
  static $item_id = 0;
  if( isset($element['#original_link']) ){
  $menu_name = $element['#original_link']['menu_name'];
  
  //krumo($element);
  //$element['#attributes']['class'][] = 
    $item_id++;
$element['#attributes']['class'][] = "item". $item_id;
$element['#attributes']['class'][] ="mid".$element ['#original_link']['mlid'];
}

  if ($element['#below']) {
    $element['#attributes']['class'][] = 'dropdown';
  }
  
  if ($element['#href'] == '<front>' && drupal_is_front_page()) {
    $element['#attributes']['class'][] = 'active-trail';
  }
  
  $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';
  $output = l(t($element['#title']), $element['#href'], $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
}

/* Allow sub-menu items to be displayed */
function BambuTema_links($variables) {

  if (array_key_exists('id', $variables['attributes']) && $variables['attributes']['id'] == 'main-menu-links') {
  	$pid = variable_get('menu_main_links_source', 'menu-menu-principal');
	$tree = menu_tree($pid);
	//krumo($tree);
	return drupal_render($tree);
  }
 if (array_key_exists('class', $variables['attributes']) && $variables['attributes']['class'][0]=="language-switcher-locale-session") {
	 //krumo($variables);
	 return BambuTema_links__locale_block($variables);
	 }
  return theme_links($variables);
}
// THEME_links__locale_block

function BambuTema_links__locale_block(&$vars) {
	//krumo($vars);
  foreach($vars['links'] as $language => $langInfo) {
    /*$abbr = $langInfo['language']->language;
    $name = $langInfo['title'];
    //$vars['links'][$language]['title'] = '<abbr title="' . $name . '">' . $abbr . '</abbr>';
	$vars['links'][$language]['title'] =  $abbr;
	 //$vars['links'][$language]['alt'] =$name;
	 $vars['links'][$language]['attributes']['alt']=$name;
	 $vars['links'][$language]['attributes']['title']=$name;
    $vars['links'][$language]['html'] = TRUE;*/
	$vars['links'][$language]['title']=$language;
  }
  $content = theme_links($vars);
  return $content; 
}

/*function  BambuTema_field__field_tags__article($variables){
	return "lalalal";
	}

function  BambuTema_field__field_tags($variables) {
	krumo($variables);
	$output="";
	foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(' / ', $rendered_tags);
	return $output;
}*/
/* Add a comma delimiter between field tags*/
function __NO__BambuTema_field($variables) {
 
  $output = '';
 
  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    
  }
 
  // Render the items.
 

  if ($variables['element']['#field_name'] == 'field_tags') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(' / ', $rendered_tags);
  }
  return $output;
 /* elseif ($variables['element']['#field_name'] == 'field_image') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_second_image') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }

  
  elseif ($variables['element']['#field_name'] == 'field_basic_portfolio_categories') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_portfolio_image') {

    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
   
  else {
    // Default rendering taken from theme_field().
    foreach ($variables['items'] as $delta => $item) {
      $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
      $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
    }
	
  }
  */
  // Render the top-level DIV.
   
  return;
}

/* Put Breadcrumbs in a ul li structure and add descending z-index style to each <a href> tag */
function BambuTema_breadcrumb($variables) {
  $count = '100';
  $breadcrumb = $variables['breadcrumb'];
  $crumbs = '';

  if (!empty($breadcrumb)) {
   
    foreach($breadcrumb as $value) {
      $count = $count - 1;
      $style = ' style="z-index:'.$count.';"';
      $pos = strpos( $value, ">"); 
      $temp1=substr($value,0,$pos);
      $temp2=substr($value,$pos,$pos);
      $crumbs = $value.'/ ';
    }
  
  }
  return $crumbs;
}

/* Add various META tags to HTML head. */
function BambuTema_preprocess_html(&$vars){
  global $root;
  $meta_title = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#weight' => 1,
    '#attributes' => array(
      'name' => 'title',
      'content' => theme_get_setting('seo_title')
    )
  );
  $meta_description = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#weight' => 2,
    '#attributes' => array(
      'name' => 'description',
      'content' => theme_get_setting('seo_description')
    )
  );
  $meta_keywords = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#weight' => 3,
    '#attributes' => array(
      'name' => 'keywords',
      'content' => theme_get_setting('seo_keywords')
    )
  );
  /* Commenting out for now
  $meta_ie_render_engine = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#weight' => 0,
    '#attributes' => array(
      'content' =>  'IE=edge,chrome=1',
      'http-equiv' => 'X-UA-Compatible',
    )
  );
  */
  $font = array(
    '#tag' => 'link', 
    '#weight' => 4,
    '#attributes' => array( 
      'href' => 'http://fonts.googleapis.com/css?family=Open+Sans', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
    ),
  );
  $condensed= array(
    '#tag' => 'link', 
    '#weight' => 5,
    '#attributes' => array( 
      'href' => 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
    ),
  );
  $ui = array(
    '#tag' => 'link', 
    '#weight' => 6,
    '#attributes' => array( 
      'href' => ''.$root.'/css/ui.css', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'media' => 'screen',
    ),
  );
  $gumby = array(
    '#tag' => 'link', 
    '#weight' => 7,
    '#attributes' => array( 
      'href' => ''.$root.'/css/gumby.css', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'media' => 'screen',
    ),
  );
  $style = array(
    '#tag' => 'link', 
    '#weight' => 8,
    '#attributes' => array( 
      'href' => ''.$root.'/css/style.css', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'media' => 'screen',
    ),
  );
  $color = array(
    '#tag' => 'link', 
    '#weight' => 9,
    '#attributes' => array( 
      'href' => ''.$root.'/css/colors/'.theme_get_setting('color_scheme').'.css', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'media' => 'screen',
    ),
  );
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#weight' => 10,
    '#attributes' => array(
      'name' => 'viewport',
      'content' =>  'width=device-width, initial-scale=1',
    )
  );
  $font_family = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>body {font-family:".theme_get_setting('font_family')." !important;}</style> ",
    '#weight' => 11,
  );
  $headings = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>h1 {font-size:".theme_get_setting('h1').";} h2 {font-size:".theme_get_setting('h2').";} h3 {font-size:".theme_get_setting('h3').";} h4 {font-size:".theme_get_setting('h4').";} h5 {font-size:".theme_get_setting('h5').";} h6 {font-size:".theme_get_setting('h6').";}</style> ",
    '#weight' => 12,
  );
  
  
  if (theme_get_setting('seo_title') != "") {
    drupal_add_html_head( $meta_title, 'meta_title' );
  }
   if (theme_get_setting('seo_description') != "") {
    drupal_add_html_head( $meta_description, 'meta_description' );
  }
  if (theme_get_setting('seo_keywords') != "") {
    drupal_add_html_head( $meta_keywords, 'meta_keywords' );
  }
  
  if (theme_get_setting('enable_boxed_layout') == "1") {
    drupal_add_html_head( $box_layout, 'box_layout' );
  }

  drupal_add_html_head( $font, 'google_font_open_sans' );
  drupal_add_html_head( $condensed, 'google_font_condensed' );
  drupal_add_html_head( $ui, 'ui_style' );
  drupal_add_html_head( $gumby, 'gumby_style' );
  drupal_add_html_head( $style, 'main_style' );
  drupal_add_html_head( $viewport, 'meta_viewport' );
  drupal_add_html_head( $font_family, 'font_family');
  drupal_add_html_head( $headings, 'headings');
    
}

/* Separate from montreal_preprocess_html so function can be called directly before </head> tag. */
function BambuTema_user_css() {
  echo "<!-- User defined CSS -->";
  echo "<style type='text/css'>";
  echo theme_get_setting('user_css');
  echo "</style>";
  echo "<!-- End user defined CSS -->";	
}

?>