<?php 
namespace TechSupport\Models;
use Exception;
use TechSupport\Databases\Builder;
use TechSupport\Helpers\StringHelper;
class BaseModel{
	private $data = [];
	private $dataMethods = [];
	private $CI;
	protected $primaryKey = 'id';
	protected $cached = true;
	protected $table;
	public function getData(){
		return $this->data;
	}
	
	/**
	 * Set the value of data
	 *
	 * @param   mixed  $data  
	 *
	 * @return  self
	 */
	public function setData($data,$force = false)
	{
		if($force){
			$this->data = $data;
		}
		else{
			$this->data = $data+$this->data;
		}
	}
	public function getDataMethods(){
		return $this->dataMethods;
	}
	public function setDataMethods($dataMethods){
		$this->dataMethods = $dataMethods;
	}
	private function getShortClassName(){
		return (new \ReflectionClass($this))->getShortName();
	}
	public function getTable(){
		return $this->table ?$this->table: StringHelper::plural(StringHelper::snakeCase($this->getShortClassName()));
	}
	public function setTable($table){
		$this->table = $table;
	}
	/**
	 * Get the value of primaryKey
	 *
	 * @return  mixed
	 */
	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}
	public function setPrimaryKey($primaryKey){
		$this->primaryKey = $primaryKey;
	}
	/**
	 * Get the value of cached
	 *
	 * @return  mixed
	 */
	public function getCached()
	{
		return $this->cached;
	}
	public function setCached($cached){
		$this->cached = $cached;
	}
	public function __construct($data = []){
		$this->data = $data;
		$this->CI = &get_instance();
	}
	
	public static function __callStatic($name, $arguments){
		if(method_exists(Builder::class,$name)){
			$builder = new Builder;
			$builder->setModel(static::class);
			return call_user_func_array(array($builder,$name),$arguments);
		}
		else{
			throw new \BadMethodCallException("No Method ".$name);
		}
	}
	public function __call($name, $arguments){
		$key = substr($name, 3);
		$key = StringHelper::snakeCase($key);
		if(array_key_exists($key, $this->data)){
			if(StringHelper::startsWith($name,'get')){
				return $this->data[$key];
			}
			elseif(StringHelper::startsWith($name,'set')){
				$this->data[$key] = $arguments[0];	
			}
		}
		else{
			if(method_exists(Builder::class,$name)){
				$builder = new Builder;
				$builder->setModel($this);
				return call_user_func_array(array($builder,$name),$arguments);
			}
			else{
				throw new \BadMethodCallException("No Method ".$name);
			}
		}
	}
	public function __get($name)
	{
	
		if(array_key_exists($name,$this->data)){
			
			return $this->data[$name];
		}
		else if(array_key_exists($name,$this->dataMethods)){
			
			return $this->dataMethods[$name];
		}
		else if(method_exists($this,$name)){
			$this->dataMethods[$name] = $this->{$name}();
			return $this->dataMethods[$name];
		}
		else{
			throw new Exception(sprintf('No attribute %s !',$name));
		}
	}
	public function __set($name, $value)
	{
		$this->data[$name] = $value;	
	}
	public function hasMany($classMap,$localKey,$foreignKey){
		$fnc = 'get'.ucfirst($localKey);
		$value = $this->$fnc();
		return $classMap::where([[$foreignKey,'=',$value]]);
	}
	public function hasOne($classMap,$localKey,$foreignKey){
		$fnc = 'get'.ucfirst($localKey);
		$value = $this->$fnc();
		return $classMap::findBy($foreignKey,$value);
	}
	public function __isset($name){
		return array_key_exists($name, $this->data) || array_key_exists($name, $this->dataMethods) ||method_exists($this,$name);
	}
	public function __unset($name){
		if(array_key_exists($name, $this->data)){
			unset($this->data[$name]);
		}
		if(array_key_exists($name, $this->dataMethods)){
			unset($this->dataMethods[$name]);
		}
	}
	public function save(){
		$updateDatas  = $this->getData();
		if(isset($updateDatas[$this->primaryKey])){
			$id = $updateDatas[$this->primaryKey];
			unset($updateDatas[$this->primaryKey]);
        	return $this->CI->Dindex->updateDataFull($this->getTable(),$updateDatas,[$this->primaryKey=>$id]);
		}
		else{
			return $this->CI->Dindex->insertData1($this->getData(),$this->getTable());
		}
	}
	public function delete(){
		if(isset($this->data[$this->primaryKey])){
			$id = $this->data[$this->primaryKey];
			return $this->CI->Dindex->deleteData($this->getTable(),[$this->getPrimaryKey()=>$id]);
		}
		return false;
	}
	
	public function isEmpty(){
		return count($this->data) == 0;
	}
}