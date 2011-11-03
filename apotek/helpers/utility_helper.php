<?php
/**
 * utility_helper.php
 *
 * Provide general helper functions.
 */

/**
 * css_directory()
 * Return url of css directory.
 * @return string 
 */
function css_directory() {
  return get_directory('css');
}

/**
 * script_directory()
 * Return script directory url.
 * @return string
 */
function script_directory() {
  return get_directory('script');
}

/**
 * Return directory relative to app base path.
 * Should not be used directly.
 * @see css_directory(), script_directory()
 */
function get_directory($what = '') {
  $ci =& get_instance();
  $ci->load->library('config');
  if (empty($what) || $what == '') {
    return false;
  }
  
  return $ci->config->item('base_url').'resources/'.$what;
}

/**
 * Load css
 */
function load_css($what = '') {
  if (empty($what) || $what == '') {
    return false;
  }
  $url = css_directory().'/'.$what.'.css';
  $out = '<link rel="stylesheet" type="text/css" href="';
  $out .= $url.'" />';
  print $out;
}

/**
 * Load javascript
 */
function load_javascript($what = '') {
  if (empty($what) || $what == '') {
    return false;
  }
  $url = script_directory().'/'.$what.'.js';
  $out = '<script type="text/javascript" src="';
  $out .= $url.'"></script>';
  print $out;
}
