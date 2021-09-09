<?php 
class VthSupport extends IPlugin
{
    public function __construct()
    {
        parent::__construct();
        spl_autoload_register(array(
            $this,
            "_autoload"
        ));
    }
    public function install()
    {
    }
    public function uninstall()
    {
    }
    public function initVindex()
    {
    }
    private function _camelToUnderscore($string, $us = "_")
    {
        return strtolower(preg_replace('/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/', $us, $string));
    }
    private function _autoload($classname)
    {
        $class = substr(strrchr($classname, "\\") , 1);
        $namespace = $this->_camelToUnderscore(implode("\\",array_slice(explode("\\", $classname) , 0, -1) ));
        $file = PLUGIN_PATH . '/' . str_replace("\\", "/", trim($namespace, "\\")) . "/" . $class . ".php";
        if (file_exists($file))
        {
            require_once ($file);
        }
        if ($classname == 'Container')
        {
            $file = APPPATH . 'modules/Techsystem/controllers/Container.php';
            require_once ($file);
        }
    }
}

