<?php

namespace Controllers;

class MenuController
{
	
	
	public function display()
	{
		

		//appeler la vue 
		$model = new \Models\Category();
		$categories = $model -> getAllCategory();
		
		$model1 = new \Models\Meal();
		$meals = $model1 -> getAllMeals();

		
		$model = new \Models\Menu();
	    $menus = $model -> getAllMenus();

		
		$template = "views/menu.phtml";
		include 'views/layout_front.phtml';

	}
}