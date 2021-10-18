<?php

namespace Controllers;

class BookingAdminController {
    
    public function __construct()
    {
        if(!empty($_POST))
		{
		    $this -> submit();
		
	    }
    }
    
	public function display()
	{
		//afficher le formulaire de connexion
		$model = new \Models\Booking();
		$bookings = $model -> getAllBookings();
            $template = 'views/bookingAdmin.phtml';
            include 'views/layout_front.phtml';
	}
	
	
	
}