<?php

namespace Models;

class Slider extends Database
{

	public function getAllSlider():array
	{
		return $this -> findAll("SELECT id, src, alt, published, poids FROM slider");
	}
	public function ajoutSlider($alt,$published,$poids,$image)
	{
		return $this -> query("INSERT INTO slider(alt, src, published, poids) VALUES (?,?,?,?)",[$alt, $image, $published, $poids]);
	}
	public function modifySlider(array $data)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("UPDATE slider 
		SET alt = ?, src = ?, published = ?, poids = ?
		WHERE id = ?",$data);
	}
	public function findSliderById($id):?array
	{
		return $this -> findOne("SELECT id, src, alt, published, poids FROM slider WHERE id = ?",[$id]);
	}
	public function deleteSlider($id)
	{
		//requêtes sql qui permet l'ajout de la catégorie
		$this -> query("DELETE FROM slider WHERE id = ? ",[$id]);
	}
}

