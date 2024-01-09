<?php 
class Categorie{
    // `categoryID`, `categoryName:
    private $idCat;
    private $nameCat;
    public function __construct(){
        
    }

   

    /**
     * Get the value of idCat
     */ 
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * Set the value of idCat
     *
     * @return  self
     */ 
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;

        return $this;
    }

    /**
     * Get the value of nameCat
     */ 
    public function getNameCat()
    {
        return $this->nameCat;
    }

    /**
     * Set the value of nameCat
     *
     * @return  self
     */ 
    public function setNameCat($nameCat)
    {
        $this->nameCat = $nameCat;

        return $this;
    }
}