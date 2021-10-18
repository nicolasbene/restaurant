<?php

namespace Models;

class ModifyAccueil extends Database
{

		public function ModifyCategory($name, $content, $nameImage, $src)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE config SET name = ?, content = ?, alt = ?, src = ?",[$name, $content, $nameImage, $src]);
	}
		public function findAllAccueil()
	{
		return $this->findOne("SELECT name, content, src, alt FROM config");
	}
}
	