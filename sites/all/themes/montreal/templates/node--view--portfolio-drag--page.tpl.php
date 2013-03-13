<?php 
  global $root, $base_url; 
  $tags = render($content['field_portfolio_basic_tags']);
  $tags = str_replace(',', ' /',$tags);
?>
  
<div class="greyvertical midtopmargin item leftpadding rightpadding">
  <?php print render($content['field_portfolio_basic_image']); ?>
  
  <h5 class="whitetext extrabold icon-circle-arrow-right smalltoppadding">&nbsp; <?php print $title; ?></h5>
	<h6 class="whitetext leftpadding"><?php echo $tags; ?></h6><br>

	<?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['taxonomy_forums']);
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    hide($content['field_image']);
    print render($content);
  ?>
	
  <a href="<?php print $node_url;?>" class="whitetext smallfont leftpadding">VIEW PROJECT</a>

</div>