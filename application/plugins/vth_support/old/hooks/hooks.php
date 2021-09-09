<?php 
$hook['tech5s_vindex_init'][] = array( 
  'class'    => 'VthSupport',
  'function' => 'initVindex',
  'filename' => 'VthSupport.php',
  'filepath' => 'plugins/vth_support',
);
$hook['tech5s_techsystem_init'][] = array( 
  'class'    => 'VthSupport',
  'function' => 'initVindex',
  'filename' => 'VthSupport.php',
  'prevent_progress' => true,
  'filepath' => 'plugins/vth_support',
);