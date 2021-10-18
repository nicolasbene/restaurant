<?php

namespace Controllers;

class CategoryController {
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
	}

 	public function display()
	{
	    $model = new \Models\Category();
		$categories = $model -> getAllCategory();
            $template = 'views/category.phtml';
            include 'views/layout_front.phtml';
	}
	
	public function delete()
	{
	    $model = new \Models\Category();
	    $model -> deleteCategory($_GET['id']);
	}
	
 
}
    