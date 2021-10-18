<?php

namespace Controllers;

class GestionMenuController {
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
	}

 	public function display()
	{
	    $model = new \Models\Menu();
		$menus = $model -> getAllMenus();
            $template = 'views/gestionMenu.phtml';
            include 'views/layout_front.phtml';
	}
	
		public function delete()
	{
	    $model = new \Models\Menu();
	    $model -> deleteMenu($_GET['id']);
	}
}