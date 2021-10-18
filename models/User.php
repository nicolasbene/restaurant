<?php

namespace Models;

class User extends Database
{

	public function getAllUsers():array
	{
	
		return $this -> findAll("SELECT email, password, firstname, lastname, phone FROM user
		");
				
	}
	
		public function AddUser($email, $pw, $firstName, $lastName, $phone)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO user(email, password, firstname, lastname, phone) VALUES (?,?,?,?,?)",[$email, $pw, $firstName, $lastName, $phone]);
	}
	public function getUserByEmail($email):?array
	{
		return $this -> findOne("SELECT id, email, password, firstname, lastname, phone FROM user
		 WHERE email = ?",[$email]);
	}
}