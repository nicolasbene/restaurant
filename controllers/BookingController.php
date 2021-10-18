<?php

namespace Controllers;

class BookingController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotUser();
		//si le formulaire a été soumis
		if(!empty($_POST))
		{
		    $this -> addBooking();
	    }
	}

	public function display()
	{
	    $id = $_SESSION['idUser'];
		$model = new \Models\Booking();
	    $bookings = $model -> getAllBookingsByUser($id);
            $template = 'views/booking.phtml';
            include 'views/layout_front.phtml';
	}
	
	public function addBooking()
	{
		$number = $_POST['nb'];
		$date = $_POST['date'];
		$hour = $_POST['time'];
		$comment = $_POST['comment'];
		if( isset($_POST['modifier'])){
			//récupérer l'id de la réservation 
			$id = $_POST['id'];
			$model = new \Models\Booking();
			$model -> ModifyUserBooking($number, $date, $hour, $comment, $id);
		}
		else
		{
		//préparer les données pour les mettre dans la base de données
	
		$id_user = $_SESSION['idUser'];
		$statut = "En cours";
		
		//mettre les datas en bdd
		$model = new \Models\Booking();
		$model -> AddBooking($number, $id_user, $date, $hour, $statut, $comment);
            
		header('location:index.php?page=booking');
			exit;
		}
	}
	public function showFormModif()
	{
		$model = new \Models\Booking();
	    $userBooking = $model -> FindBookingById($_GET['id']);
	    include "views/modifyUserBooking.phtml";
	}
	
	
/*		public function delete()
	{
	    $model = new \Models\Meal();
	    $model -> deleteMeal($_GET['id']);
	}
	public function displayAdd()
	{
	    $model = new \Models\Category();
	    $categories = $model -> getAllCategory();
            $template = 'views/addMeal.phtml';
            include 'views/layout_front.phtml';
	}
	
	
		public function displayModify()
	{
	    $model = new \Models\Meal();
	    $meal = $model -> findMealById($_GET['id']);
	    $model = new \Models\Category();
	    $categories = $model -> getAllCategory();  
            $template = 'views/modifyMeal.phtml';
            include 'views/layout_front.phtml';
	}
	
	public function ModifySubmit()
	{
		//préparer les données pour les mettre dans la base de données
		$nom = $_POST['name'];
		if (empty($_FILES['img']['name'])) {
			$image = $_POST['imgBdd'];
		}
		else {
			$image = "img/menus/{$_FILES['img']['name']}";
			move_uploaded_file ($_FILES['img']['tmp_name'], $image );
		}
		$alt = $_POST['alt'];
		$id_category = $_POST['category'];
		
		//mettre les datas en bdd
		$model = new \Models\Meal();
		$modifyMeal = $model -> ModifyMeal($_GET['id'], $nom, $image, $alt, $id_category);
            
		header('location:index.php?page=meal');
			exit;
	}
	*/
	

}