<?php 
namespace BaseWebsite\Traits;
trait Nullable{
	public function isNull(){
		return count($this->getData()) ==0;
	}
}