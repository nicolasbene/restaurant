<?php

namespace Controllers;

class AddSliderController
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
		$sliders = $model -> getAllSlider();
		$template = "views/addSlider.phtml";
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
		$image = "img/{$_FILES['image']['name']}";
		
		//upload mon image
		move_uploaded_file ($_FILES['image']['tmp_name'], $image );
		
		
		//mettre les datas en bdd
		$model = new \Models\Slider();
		$model -> ajoutSlider($alt,$published,$poids,$image);
		header('location:index.php?page=slider');
			exit;
	}
}