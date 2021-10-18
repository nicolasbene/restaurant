<?php

namespace Controllers;

class TableauDeBordController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
	}
	
	public function display()
	{
			$model = new \Models\Meal();
			$nb = $model -> CountMeal();
		
		//afficher le formulaire de connexion
		
            $template = 'views/tableauDeBord.phtml';
            include 'views/layout_front.phtml';
	}
}
