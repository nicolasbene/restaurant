<?php

	
namespace Models;


class Booking extends Database
{
    
public function AddBooking($number, $id_user, $date, $hour, $statut, $comment)
	{
		//requêtes sql qui permet l'ajout de la résa
		$this -> query("INSERT INTO booking(number, id_user, date, hour, statut, comment) 
		VALUES (?,?,?,?,?,?)",[$number, $id_user, $date, $hour, $statut, $comment]);
	}

public function getAllBookingsByUser($id):array
	{
		return $this -> findAll("
		SELECT id, number, id_user, date, hour, statut, comment 
		FROM booking
		WHERE id_user = ? ",[$id]);
		
	}
public function getAllBookings():array
	{
	
		return $this -> findAll("
		SELECT firstname, lastname, number, id_user, date, hour, statut, comment 
		FROM booking
		INNER JOIN user ON user.id = booking.id_user
		");
	}

public function FindBookingById($id):?array
{
	return $this -> findOne("SELECT id, number, id_user, date, hour, statut, comment FROM booking WHERE id = ?",[$id]);
}	

public function ModifyUserBooking($number, $date, $hour, $comment, $id)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE booking 
		SET number = ?, date = ?, hour = ?, comment = ?
		WHERE id = ?",[$number, $date, $hour,$comment, $id]);
	}

	
}