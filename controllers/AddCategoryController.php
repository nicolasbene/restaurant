<?php

namespace Controllers;

class AddCategoryController {
    
   	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotAdmin();
		
		//si le formulaire a été soumis
		if(!empty($_POST))
		{
			$this -> submit();
		}
	}

 	public function display()
	{
            $template = 'views/addCategory.phtml';
            include 'views/layout_front.phtml';
	}
	
	//traitement du formulaire
	public function submit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['nom'];
		if(isset ($_POST['is_dish']))
		{
		    $is_dish = 1;
		}
		else 
		{
		   $is_dish = 0; 
		}
		$description = $_POST['description'];
		
		//mettre les datas en bdd
		$model = new \Models\Category();
		$model -> AddCategory($nom, $is_dish, $description);
		header('location:index.php?page=category');
			exit;
	}
	
 
}
    