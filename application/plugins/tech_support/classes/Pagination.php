<?php 
namespace TechSupport\Classes;
class Pagination{
    private $items;
    private $pages;
    private $total;
    


	/**
	 * Get the value of items
	 *
	 * @return  mixed
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * Set the value of items
	 *
	 * @param   mixed  $items  
	 *
	 * @return  self
	 */
	public function setItems($items)
	{
		$this->items = $items;
	}

	/**
	 * Get the value of total
	 *
	 * @return  mixed
	 */
	public function getTotal()
	{
		return $this->total;
	}

	/**
	 * Set the value of total
	 *
	 * @param   mixed  $total  
	 *
	 * @return  self
	 */
	public function setTotal($total)
	{
		$this->total = $total;
    }
    

	/**
	 * Get the value of pages
	 *
	 * @return  mixed
	 */
	public function getPages()
	{
		return $this->pages;
	}

	/**
	 * Set the value of pages
	 *
	 * @param   mixed  $pages  
	 *
	 * @return  self
	 */
	public function setPages($pages)
	{
		$this->pages = $pages;
    }
    public function __construct($items,$total,$pages){
        $this->items = $items;
        $this->total = $total;
        $this->pages = $pages;
    }
}