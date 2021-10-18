<?php

namespace Controllers;

class AboutController
{

	public function display()
	{
	  
		//appeler la vue 
		
		$template = "views/about.phtml";
		include 'views/layout_front.phtml';



	}
}