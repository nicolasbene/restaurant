<?php

namespace Models;

class Menu extends Database
{

	public function getAllMenus():array
	{
	
		return $this -> findAll("SELECT id_category, menu.id, title, src, alt, price, category.name AS categoryName FROM menu
		INNER JOIN category ON category.id = menu.id_category ");
				
	}
	
		public function AddMenuController($title, $src, $alt, $price, $id_category)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO menu(title, src, alt, price, id_category) VALUES (?,?,?,?,?)",[$title, $src, $alt, $price, $id_category]);
	}
	
	public function ModifyMenuController($id, $title, $src, $alt, $price, $id_category)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE menu 
		SET title = ?, src = ?, alt = ?, price = ?, id_category = ?
		WHERE id = ?",[$title, $src, $alt, $price,$id_category, $id]);
	}
	
	public function findMenuById($id):?array
	{
		return $this -> findOne("SELECT menu.id, title, src, alt, price, category.name AS categoryName, category.id AS categoryId  FROM menu
		INNER JOIN category ON category.id = menu.id_category  WHERE menu.id = ?",[$id]);
	}
	
	public function deleteMenu($id)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("DELETE FROM menu WHERE id = ? ",[$id]);
	}
	

}

 