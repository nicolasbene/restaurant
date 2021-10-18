<?php

namespace Controllers;

class SliderController
{
	
		use SessionController;
		private $model;
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
		$this -> model = new \Models\Slider();
	}
	
	public function display()
	{
		
		//appeler la vue 
		$sliders = $this -> model -> getAllSlider();
		$template = "views/slider.phtml";
		include 'views/layout_front.phtml';

	}
	public function deleteImage()
	{
		$this -> model -> deleteSlider($_GET['id']);
	}
}