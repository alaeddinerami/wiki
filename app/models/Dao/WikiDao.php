<?php
require_once(APPROOT . '/models/Wiki.php');
require_once(APPROOT . '/models/Categorie.php');

class WikiDao
{
    private $db;
    private Wiki $wiki;
    private Categorie $categorie;

    public function __construct()
    {
        $this->db = new Database;
        $this->wiki = new Wiki();

        $this->categorie = new Categorie();
    }

    public function getAllWikis()
    {
        try {
            $req = "SELECT * FROM wiki";
            $this->db->query($req);
            $res = $this->db->fetchAll();
            $wikis = array();
            foreach ($res as $obj) {
                $wiki = new Wiki();
                $wiki->setIdWiki($obj->idWiki);
                $wiki->setNameWiki($obj->nameWiki);
                $wiki->setDescriptionWiki($obj->descriptionWiki);
                $wiki->setArchivedWiki($obj->archived);

                array_push($wikis, $wiki);
            }

            return $wikis;
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllwiki: " . $e->getMessage());
        }
    }
    public function ArchiverDao(wiki $wiki)
    {
        try {
            $wiki_id = $wiki->getIdWiki();

            $req = "UPDATE wiki SET archived = 1 WHERE idWiki = :id";
            $this->db->query($req);
            $this->db->bind(":id", $wiki_id);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in update: " . $e->getMessage());
        }
    }
    public function NonArchiverDao(wiki $wiki)
    {
        try {
            $wiki_id = $wiki->getIdWiki();
            $req = "UPDATE wiki SET archived = 0 WHERE idWiki = :id";
            $this->db->query($req);
            $this->db->bind(":id", $wiki_id);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in update: " . $e->getMessage());
        }
    }

    public function InsertWikiDao(Wiki $wiki)
    {
        try {
            $nameWiki = $wiki->getNameWiki();
            $descriptionWiki = $wiki->getDescriptionWiki();
            $currentDate = date('Y-m-d H:i:s');
            $idUser = $_SESSION['userId'];

            $idCat = $wiki->getCategorie()->getIdCat();
            $req = "INSERT INTO wiki(nameWiki, descriptionWiki, DateCreate, idUser, idCat)  VALUES (:nameWiki, :descriptionWiki,  :dateCreated, :idUser, :idCat)";

            $this->db->query($req);
            $this->db->bind(':nameWiki', $nameWiki);
            $this->db->bind(':descriptionWiki', $descriptionWiki);
            $this->db->bind(':dateCreated', $currentDate);
            $this->db->bind(':idUser', $idUser);
            $this->db->bind(':idCat', $idCat);

            $this->db->execute();
            $wikiID = $this->db->lastInsertId();
            return $wikiID;
        } catch (Exception $e) {
            error_log("Error in Insert wiki: " . $e->getMessage());
        }
    }

    /**
     * Get the value of wiki
     */
    public function getWiki()
    {
        return $this->wiki;
    }

    /**
     * Set the value of wiki
     *
     * @return  self
     */
    public function setWiki($wiki)
    {
        $this->wiki = $wiki;

        return $this;
    }
}
