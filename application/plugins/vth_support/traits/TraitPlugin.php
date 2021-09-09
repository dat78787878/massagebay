<?php
namespace VthSupport\Traits;
use TechSupport\Helpers\StringHelper;
trait TraitPlugin
{
    public function install()
	{
        $this->addMultiRoutes();
        $this->publishFiles();
	}
	public function uninstall(){
		$this->removeMultiRoutes();
		$this->removeFile();
    }
    public function publishFiles(){
        if(!isset($this->files)) return;
        foreach ($this->files as $k => $file) {
            $this->publishFile($file);
        }
    }
    
    public function addMultiRoutes(){
        if(!isset($this->routes)) return;
        foreach ($this->routes as $fnc => $url) {
            $this->addRoutes('Vindex/'.$fnc,$url);
        }
    }
    public function removeMultiRoutes(){
        if(!isset($this->routes)) return;
        $routes = array_values($this->routes);
        foreach ($routes as $k => $url) {
            $this->removeRoutes($url);
        }
    }
    public function initVindex(){
		$vindex = &get_instance();
        $current = $this;
        foreach ($this->routes as $fnc => $url) {
            $vindex::macro($fnc, function($item) use ($current,$fnc) {
                $current->$fnc($item);
            });
        }
	}
}