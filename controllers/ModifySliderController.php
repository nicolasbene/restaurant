<?php

namespace Controllers;

class ModifySliderController
{
	
		use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
			if(!empty($_POST))
			{
				$this -> submit();
			}
	}
		
	public function display()
	{
		$model = new \Models\Slider();
		$slider = $model -> findSliderById($_GET['id']);
		$template = "views/modifySlider.phtml";
		include 'views/layout_front.phtml';
	}
	public function submit()
	{
		$alt = $_POST['alt'];
			if(isset ($_POST['published']))
			{
			    $published = 1;
			}
			else 
			{
			   $published = 0; 
			}
		$poids = $_POST['poids'];
		
		if (empty($_FILES['image']['name'])) {
			$image = $_POST['imageBdd'];
		} 
		else {
			$image = "img/{$_FILES['image']['name']}";
			move_uploaded_file ($_FILES['image']['tmp_name'], $image );
		}
		
		//mettre les datas en bdd
		$model = new \Models\Slider();
		$model -> ModifySlider([$alt,$image,$published,$poids,$_GET['id']]);
		header('location:index.php?page=slider');
			exit;
		
	}
}