<?php
$hook['tech5s_vindex_init'][] = array( 
  'class'    => 'Search',
  'function' => 'initVindex',
  'filename' => 'Search.php',
  'filepath' => 'plugins/search',
);
$hook['tech5s_before_footer'][] = array( 
  'class'    => 'Search',
  'function' => 'insertScript',
  'filename' => 'Search.php',
  'filepath' => 'plugins/search',
);
$hook['tech5s_before_header'][] = array( 
  'class'    => 'Search',
  'function' => 'insertStyle',
  'filename' => 'Search.php',
  'filepath' => 'plugins/search',
);