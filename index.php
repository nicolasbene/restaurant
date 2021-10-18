<?php

//setcookie('user_id', '1234');
//setcookie('user_pref', 'dark_theme', time()+3600*24*30, '/', '', true, true);

//démarrer le système de session
session_start();

//autoloader

//autoloader
spl_autoload_register(function($class){
	
	include str_replace('\\','/',lcfirst($class)).".php";
	
});

//si je n'ai pas un paramètre page
if(!isset($_GET['page']))
{
	//lancer la page d'accueil
	$controller = new Controllers\AccueilController();
	$controller -> display();
}
else
{
	switch($_GET['page'])
	{
		case 'accueil':
			$controller = new Controllers\AccueilController();
			$controller -> display();
			break;
		case 'modifyAccueil':
			$controller = new Controllers\ModifyAccueilController();
			$controller -> display();
			break;	
		case 'about':
			$controller = new Controllers\AboutController();
			$controller -> display();
			break;
		case 'contact':
			$controller = new Controllers\ContactController();
			$controller -> display();
			break;
		case 'admin':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\AdminController();
			$controller -> display();
			break;
		case 'tableauDeBord':
			//include 'controllers/TableauDeBordController.php';
			$controller = new Controllers\TableauDeBordController();
			$controller -> display();
			break;
		case 'category':
			$controller = new Controllers\CategoryController();
			$controller -> display();
			break;
		case 'createCategory':
			$controller = new Controllers\AddCategoryController();
			$controller -> display();
			break;
		case 'modifCategory':
			$controller = new Controllers\ModifyCategoryController();
			$controller -> display();
			break;
		case 'deleteCategory':
			$controller = new Controllers\CategoryController();
			$controller -> delete();
			break;
		case 'menu':
			$controller = new Controllers\MenuController();
			$controller -> display();
			break;
		case 'gestionMenu':
			$controller = new Controllers\GestionMenuController();
			$controller -> display();
			break;
		case 'createMenu':
			$controller = new Controllers\AddMenuController();
			$controller -> display();
			break;
		case 'modifyMenu':
			$controller = new Controllers\ModifyMenuController();
			$controller -> display();
			break;
		case 'deleteMenu':
			$controller = new Controllers\GestionMenuController();
			$controller -> delete();
			break;
		case 'meal':
			$controller = new Controllers\MealController();
			$controller -> display();
			break;
		case 'createMeal':
			$controller = new Controllers\MealController();
			//si le formulaire a été soumis
			if(!empty($_POST))
			{
				$controller -> AddSubmit();
			}
			else {
				$controller -> displayAdd();	
			}
			break;
		case 'modifyMeal':
			$controller = new Controllers\MealController();
			//si le formulaire a été soumis
			if(!empty($_POST))
			{
				$controller -> ModifySubmit();
			}
			else {
				$controller -> displayModify();	
			}
			break;
		case 'deleteMeal':
			$controller = new Controllers\MealController();
			$controller -> delete();
			break;
		case 'slider':
			$controller = new Controllers\SliderController();
			$controller -> display();
			break;
		case 'createSlider':
			$controller = new Controllers\AddSliderController();
			$controller -> display();
			break;
		case 'modifySlider':
			$controller = new Controllers\ModifySliderController();
			$controller -> display();
			break;
		case 'deleteSlider':
			$controller = new Controllers\SliderController();
			$controller -> deleteImage();
			break;
		case 'connexion':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\ConnexionController();
			$controller -> display();
			break;
		case 'newUser':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\NewUserController();
			$controller -> display();
			break;
		case 'booking':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\BookingController();
			$controller -> display();
			break;
		case 'resa':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\BookingAdminController();
			$controller -> display();
			break;
		case 'modifyUserBooking':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\BookingController();
			$controller -> showFormModif();
			break;
		case 'cookie':
			//include 'controllers/AdminController.php';
			$controller = new Controllers\CookieController();
			$controller -> createCookie();
			break;
	}

}