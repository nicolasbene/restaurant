<?php

namespace Controllers;

class ModifyMenuController {
    
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
	    $model = new \Models\Menu();
	    $menu = $model -> findMenuById($_GET['id']);
	  
		$model = new \Models\Category();
	    $categories = $model -> getAllCategory();
            $template = 'views/modifyMenu.phtml';
            include 'views/layout_front.phtml';
	}
	
	//traitement du formulaire
	public function submit()
	{
			//préparer les données pour les mettre dans la base de données
		$title = $_POST['title'];
		if (empty($_FILES['img']['name'])) {
			$image = $_POST['imgBdd'];
		}
		else {
			$image = "img/{$_FILES['img']['name']}";
			move_uploaded_file ($_FILES['img']['tmp_name'], $image );
		}
		$alt = $_POST['alt'];
		$price = $_POST['price'];
		$id_category = $_POST['category'];
		

			
		//mettre les datas en bdd
		$model = new \Models\Menu();
		$modifyMenu = $model -> ModifyMenuController($_GET['id'], $title, $image, $alt, $price, $id_category);
		header('location:index.php?page=gestionMenu');
			exit;
	}
	
 
}
    