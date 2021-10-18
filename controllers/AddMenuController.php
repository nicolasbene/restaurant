<?php

namespace Controllers;

class AddMenuController {
    
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
	    $categories = $model -> getAllCategory();
		 $template = 'views/addMenu.phtml';
		 include 'views/layout_front.phtml';
	}
	
	//traitement du formulaire
	public function submit()
	{
			//préparer les données pour les mettre dans la base de données
		$title = $_POST['title'];
		$image = "img/menus/{$_FILES['img']['name']}";
		$alt = $_POST['alt'];
		$price = $_POST['price'];
		$id_category = $_POST['category'];
		
		//upload mon image
		move_uploaded_file ($_FILES['img']['tmp_name'], $image );
		
		
		
		//mettre les datas en bdd
		$model = new \Models\Menu();
		$model -> AddMenuController($title, $image, $alt, $price, $id_category);
		header('location:index.php?page=gestionMenu');
			exit;
	}
	
 
}
    