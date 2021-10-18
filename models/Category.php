<?php

namespace Models;

class Category extends Database
{

	public function getAllCategory():array
	{
	
		return $this -> findAll("SELECT id, name, is_dish, description FROM category");
		
	}
	
		public function AddCategory($nom, $is_dish, $description)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("INSERT INTO category(name, is_dish, description) VALUES (?,?,?)",[$nom, $is_dish, $description]);
	}
	
	public function ModifyCategory($id, $nom, $is_dish, $description)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE category 
		SET name = ?, is_dish = ?, description = ?
		WHERE id = ?",[$nom, $is_dish, $description, $id]);
	}
	
	public function findCategoryById($id):?array
	{
		return $this -> findOne("SELECT id, name, is_dish, description FROM category WHERE id = ?",[$id]);
	}
	
	public function deleteCategory($id)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("DELETE FROM category WHERE id = ? ",[$id]);
	}
	

}

 