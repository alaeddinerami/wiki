<?php
class Tags{

    private $idTag;
    private $nameTag;

    public function __construct(){

    }
    

    /**
     * Get the value of idTag
     */ 
    public function getIdTag()
    {
        return $this->idTag;
    }

    /**
     * Set the value of idTag
     *
     * @return  self
     */ 
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get the value of nameTag
     */ 
    public function getNameTag()
    {
        return $this->nameTag;
    }

    /**
     * Set the value of nameTag
     *
     * @return  self
     */ 
    public function setNameTag($nameTag)
    {
        $this->nameTag = $nameTag;

        return $this;
    }
}

?>