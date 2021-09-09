<?php
$hook['tech5s_vindex_init'][] = array( 
  'class'    => 'BaseWebsite',
  'function' => 'initVindex',
  'filename' => 'BaseWebsite.php',
  'filepath' => 'plugins/base_website',
);
$hook['tech5s_techsystem_init'][] = array( 
  'class'    => 'BaseWebsite',
  'function' => 'initTechsystem',
  'filename' => 'BaseWebsite.php',
  'prevent_progress' => true,
  'filepath' => 'plugins/base_website',
);
$hook['tech5s_before_update_1'][] = array( 
  'class'    => 'BaseWebsite',
  'function' => 'convertNotDuplicateLink',
  'filename' => 'BaseWebsite.php',
  'filepath' => 'plugins/base_website'
);
$hook['tech5s_before_insert'][] = array( 
  'class'    => 'BaseWebsite',
  'function' => 'changeSlugTolink',
  'filename' => 'BaseWebsite.php',
  'filepath' => 'plugins/base_website'
);