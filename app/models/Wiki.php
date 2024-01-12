<?php
require_once(APPROOT . '/models/User.php');
class Wiki
{
    private $idWiki;
    private $nameWiki;
    private $descriptionWiki;
    private $DateCreate;

    private $archivedWiki;
    private $idCat;

    private Categorie $categorie;
    private User $user;


    public function __construct()
    {
        $this->user = new User();
        $this->categorie = new Categorie();
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

    /**
     * Get the value of idCat
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the value of DateCreate
     */
    public function getDateCreate()
    {
        return $this->DateCreate;
    }

    /**
     * Set the value of DateCreate
     *
     * @return  self
     */
    public function setDateCreate($DateCreate)
    {
        $this->DateCreate = $DateCreate;

        return $this;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }
}
