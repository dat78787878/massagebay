<?php 
$hook['tech5s_vindex_init'][] = array( 
  'class'    => 'TechSupport',
  'function' => 'initVindex',
  'filename' => 'TechSupport.php',
  'filepath' => 'plugins/tech_support',
);
$hook['tech5s_before_input_echor'][] = array( 
  'class'    => 'TechSupport',
  'function' => 'customEchor',
  'filename' => 'TechSupport.php',
  'filepath' => 'plugins/tech_support',
);
$hook['tech5s_before_imgv2'][] = array( 
  'class'    => 'TechSupport',
  'function' => 'customEchor',
  'filename' => 'TechSupport.php',
  'filepath' => 'plugins/tech_support',
);
$hook['tech5s_before_get_data_detail'][] = array( 
  'class'    => 'TechSupport',
  'function' => 'customBeforeGetDataDetail',
  'filename' => 'TechSupport.php',
  'filepath' => 'plugins/tech_support',
);
$hook['tech5s_after_get_data_detail'][] = array( 
  'class'    => 'TechSupport',
  'function' => 'customAfterGetDataDetail',
  'filename' => 'TechSupport.php',
  'filepath' => 'plugins/tech_support',
);