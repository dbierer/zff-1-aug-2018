<?php
namespace Market\Traits;

trait CategoriesTrait
{
	protected $categories;
	public function setCategories($categories)
	{
		$this->categories = $categories;
	}
}
