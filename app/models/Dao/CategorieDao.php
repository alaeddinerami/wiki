<?php
require_once(APPROOT . '/models/Categorie.php');
class CategorieDao
{
    private $db;
    private Categorie $category;
    public function __construct()
    {
        $this->db = new Database();
        $this->category = new Categorie();

    }
    // data Categorie
    public function getAllCat()
    {
        try {
            $req = "SELECT * FROM `categorie`";
            $this->db->query($req);
            $res = $this->db->fetchAll();
            $categorie = array();
            foreach ($res as $obj) {
                $category = new Categorie();
                $category->setIdCat($obj->idCat);
                $category->setNameCat($obj->nameCat);
                array_push($categorie, $category);
            }
            return $categorie;
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllCat: " . $e->getMessage());

        }
    }

    //insert
    public function InsertCategorie(Categorie $categorie)
    {
        try {
            $categorie_name = $categorie->getNameCat();
            $req = "INSERT INTO categorie(nameCat) VALUES (:name)";
            $this->db->query($req);
            $this->db->bind(':name', $categorie_name);
           $ress= $this->db->execute();
           var_dump($ress);
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in Insert: " . $e->getMessage());

        }

    }
    // // Update 
    public function UpdateCategorie(Categorie $categorie)
    {
        try {
            $categorie_id=$categorie->getIdCat();
            $categorie_name=$categorie->getNameCat();
            $req = "UPDATE categorie SET nameCat=:name WHERE idCat= :id";
            $this->db->query($req);
            $this->db->bind(":id", $categorie_id);
            $this->db->bind(":name", $categorie_name);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in update: " . $e->getMessage());

        }
    }
    // // delete
    public function DelletCategorie(Categorie $categorie)
    {
        try {
            $categorie_id=$categorie->getIdCat();
            $req = "DELETE FROM `categorie` WHERE idCat= :id";
            $this->db->query($req);
            $this->db->bind(":id", $categorie_id);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            // Log the error for debugging purposes
            error_log("Error in Dellet: " . $e->getMessage());

        }
    }

   
    public function getCategory()
    {
        return $this->category;
    }

  
}