<?php
class Wiki{
    private $idWiki;
    private $nameWiki;
    private $descriptionWiki;
    private $archivedWiki;


    public function __construct(){
        
    }

    /**
     * Get the value of idWiki
     */ 
    public function getIdWiki()
    {
        return $this->idWiki;
    }

    /**
     * Set the value of idWiki
     *
     * @return  self
     */ 
    public function setIdWiki($idWiki)
    {
        $this->idWiki = $idWiki;

        return $this;
    }

    /**
     * Get the value of nameWiki
     */ 
    public function getNameWiki()
    {
        return $this->nameWiki;
    }

    /**
     * Set the value of nameWiki
     *
     * @return  self
     */ 
    public function setNameWiki($nameWiki)
    {
        $this->nameWiki = $nameWiki;

        return $this;
    }

    /**
     * Get the value of descriptionWiki
     */ 
    public function getDescriptionWiki()
    {
        return $this->descriptionWiki;
    }

    /**
     * Set the value of descriptionWiki
     *
     * @return  self
     */ 
    public function setDescriptionWiki($descriptionWiki)
    {
        $this->descriptionWiki = $descriptionWiki;

        return $this;
    }



    /**
     * Get the value of archivedWiki
     */ 
    public function getArchivedWiki()
    {
        return $this->archivedWiki;
    }

    /**
     * Set the value of archivedWiki
     *
     * @return  self
     */ 
    public function setArchivedWiki($archivedWiki)
    {
        $this->archivedWiki = $archivedWiki;

        return $this;
    }
}
?>