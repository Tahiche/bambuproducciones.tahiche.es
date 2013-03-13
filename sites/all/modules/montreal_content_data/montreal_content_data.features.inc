<?php
/**
 * @file
 * montreal_content_data.features.inc
 */

/**
 * Implements hook_views_api().
 */
function montreal_content_data_views_api() {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function montreal_content_data_node_info() {
  $items = array(
    'blank_page' => array(
      'name' => t('Blank page'),
      'base' => 'node_content',
      'description' => t('Ideal for using full HTML and PHP markup in your page content. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'portfolio_basic' => array(
      'name' => t('Portfolio Basic'),
      'base' => 'node_content',
      'description' => t('Basic portfolio item used in standard block views. Images should be 700 wide by 500 tall. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'portfolio_stripe' => array(
      'name' => t('Portfolio Stripe'),
      'base' => 'node_content',
      'description' => t('Use this content type for the Portfolio Stripe view template. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'stripe_page' => array(
      'name' => t('Stripe page'),
      'base' => 'node_content',
      'description' => t('Boxed page with striped background. '),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
