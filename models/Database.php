<?php

namespace Models;
//classe mère de tous les models

abstract class Database
{
	protected $bdd;
	
	public function __construct()
	{
		$this -> bdd = new \PDO('mysql:host=db.3wa.io;dbname=anaiscap_freshly;charset=utf8','anaiscap','6f1143afb9e61c5b9f1fb592a63c1bc2');

	}
	
	public function findAll(string $req,array $params = []):array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		return $query -> fetchAll(\PDO::FETCH_ASSOC);
	}
	
	
	public function findOne(string $req,array $params = []):?array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		$result = $query -> fetch(\PDO::FETCH_ASSOC);
			if($result==false){
				return null;
			}
			else {
				return $result;
			}
	}
		public function query(string $req,array $params = [])
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
	}
	
}