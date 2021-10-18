<?php

namespace Models;

class Admin extends Database
{

	public function getAdminByLogin(string $login):?array
	{
	
		return $this -> findOne("SELECT login, password, prenom, nom FROM admin WHERE login = ?", [$login]);
		
	}
	
}

