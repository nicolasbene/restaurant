<?php

namespace Controllers;

class ModifyCategoryController {
    
   	
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
	    $model = new \Models\Category();
	    $category = $model -> findCategoryById($_GET['id']);
	    var_dump($category);
            $template = 'views/modifyCategory.phtml';
            include 'views/layout_front.phtml';
	}
	
	//traitement du formulaire
	public function submit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['name'];
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
		$modifCategory = $model -> ModifyCategory($_GET['id'], $nom, $is_dish, $description);
		header('location:index.php?page=category');
			exit;
	}
	
 
}
    