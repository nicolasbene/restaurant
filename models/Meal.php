<?php

namespace Models;

class Meal extends Database
{

	public function getAllMeals():array
	{
	//requêtes sql qui permet d'afficher les plats
		return $this -> findAll(
		"SELECT id_category, is_dish, meal.id, meal.name, src, alt, category.name AS categoryName FROM meal
		INNER JOIN category ON category.id = meal.id_category
		");
	}
	
		public function AddMeal($nom, $image, $alt, $id_category)
	{
		//requêtes sql qui permet l'ajout du plat
		$this -> query("INSERT INTO meal(name, src, alt, id_category) VALUES (?,?,?,?)",[$nom, $image, $alt, $id_category]);
	}
	
	public function ModifyMeal($id, $nom, $image, $alt, $id_category)
	{
		//requêtes sql qui permet de modifier les plats
		$this -> query("UPDATE meal 
		SET name = ?, src = ?, alt = ?, id_category = ?
		WHERE id = ?",[$nom, $image, $alt, $id_category, $id]);
	}
	
	public function findMealById($id):?array
	{   
	    //requêtes sql qui permet de sélectionner un plat
		return $this -> findOne("
		SELECT meal.id, meal.name, src, alt, id_category, category.name AS categoryName 
		FROM meal 
		INNER JOIN category ON category.id = meal.id_category
		WHERE meal.id = ?",[$id]);
	}
	
	public function deleteMeal($id)
	{
		//requêtes sql qui permet de supprimer un plat
		$this -> query("DELETE FROM meal WHERE id = ? ",[$id]);
	}
	
	public function CountMeal()
	{
		//requêtes sql qui donne nb des plats
		return $this -> findOne("SELECT COUNT(*) AS nb FROM meal ORDER BY id");
	}
	

}

 