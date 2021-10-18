<?php

namespace Controllers;

class ContactController
{

	public function display()
	{
	  
		//appeler la vue 
		
		$template = "views/contact.phtml";
		include 'views/layout_front.phtml';



	}
}