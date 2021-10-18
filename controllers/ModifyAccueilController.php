<?php

namespace Controllers;

class ModifyAccueilController {
    
   	
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
	    $model = new \Models\ModifyAccueil();
	    $config = $model -> findAllAccueil();
	  
	  
        $template = 'views/ModifyAccueil.phtml';
        include 'views/layout_front.phtml';
	}
	//traitement du formulaire
	public function submit()
	{
		//préparer les données pour les mettre dans la base de données
		$name = $_POST['name'];
		$content = $_POST['content'];
		$nameImage = $_POST['nameImage'];
	
			if (empty($_FILES['image']['name'])) {
			$image = $_POST['imageBdd'];
		}
		else {
			$image = "img/{$_FILES['image']['name']}";
			move_uploaded_file ($_FILES['image']['tmp_name'], $image );
		}
		
	
		//mettre les datas en bdd
		$model = new \Models\ModifyAccueil();
		$model -> ModifyCategory($name, $content, $nameImage, $image);
		header('location:index.php');
			exit;
	}
}	

    