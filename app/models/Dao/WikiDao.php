<?php
require_once(APPROOT . '/models/Wiki.php');
require_once(APPROOT . '/models/Categorie.php');
require_once(APPROOT . '/models/Tags.php');

class WikiDao
{
    private $db;
    private Wiki $wiki;

    private Tags $tag;
    private Categorie $categorie;

    public function __construct()
    {
        $this->db = new Database;
        $this->wiki = new Wiki();
        $this->tag = new Tags();
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
    public function getAllWikisView()
    {

        try {

            if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
                $req = "SELECT * FROM wikiviews where idUser =" . $_SESSION['userId'];
            } else {
                $req = "SELECT * FROM wikiview ";
            }

            $this->db->query($req);
            $res = $this->db->fetchAll();
            $wikis = array();
            foreach ($res as $obj) {
                // var_dump($obj);
                // die();
                $wiki = new Wiki();
                $wiki->setIdWiki($obj->idWiki);
                $wiki->setNameWiki($obj->nameWiki);
                $wiki->setDescriptionWiki($obj->descriptionWiki);
                $wiki->setArchivedWiki($obj->archived);
                $cat = new Categorie();
                $cat->setIdCat($obj->idCat);
                $cat->setNameCat($obj->nameCat);
                $wiki->setCategorie($cat);

                $user = new User();
                $user->setIdUser($obj->idUser);
                $user->setName($obj->name);
                $wiki->setUser($user);

                $tag = new Tags();
                $tag->setNameTag($obj->tag_names);
                $wiki->setTags($tag);

                array_push($wikis, $wiki);
                // array_push($wikis, $tag);
            }

            return $wikis;
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllwiki: " . $e->getMessage());
        }
    }
    public function getsinglWikisView()
    {

        try {
            $id = $_GET['id'];
            // // if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
            //     $req = "SELECT * FROM wikiviews where idUser =" . $_SESSION['userId'];
            // } else {
            $req = "SELECT * FROM wikiview where idWiki = $id";
            // }

            $this->db->query($req);
            $res = $this->db->fetchAll();
            $wikis = array();
            foreach ($res as $obj) {
                // var_dump($obj);
                // die();
                $wiki = new Wiki();
                $wiki->setIdWiki($obj->idWiki);
                $wiki->setNameWiki($obj->nameWiki);
                $wiki->setDescriptionWiki($obj->descriptionWiki);
                $wiki->setArchivedWiki($obj->archived);
                $cat = new Categorie();
                $cat->setIdCat($obj->idCat);
                $cat->setNameCat($obj->nameCat);
                $wiki->setCategorie($cat);

                $user = new User();
                $user->setIdUser($obj->idUser);
                $user->setName($obj->name);
                $wiki->setUser($user);

                $tag = new Tags();
                $tag->setNameTag($obj->tag_names);
                $wiki->setTags($tag);

                array_push($wikis, $wiki);
                // array_push($wikis, $tag);
            }

            return $wikis;
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllwiki: " . $e->getMessage());
        }
    }

    public function DelletWikiDao(Wiki $wiki)
    {
        try {
            $wiki_id = $wiki->getIdWiki();
            $req = "DELETE FROM `wiki` WHERE idWiki= :id";
            $this->db->query($req);
            $this->db->bind(":id", $wiki_id);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            // Log the error for debugging purposes
            error_log("Error in Dellet: " . $e->getMessage());
        }
    }
    public function UpdateWikiDao(Wiki $wiki)
    {
        try {
            $idWiki = $wiki->getIdWiki();
            $nameWiki = $wiki->getNameWiki();

            $descriptionWiki = $wiki->getDescriptionWiki();
            $currentDate = date('Y-m-d H:i:s');
            $idUser = $_SESSION['userId'];
            $idCat = $wiki->getCategorie()->getIdCat();

            $req = "UPDATE wiki 
                SET nameWiki = :newNameWiki, 
                    descriptionWiki = :newDescriptionWiki, DateCreate = :newDateCreated,  idUser = :newUserId, idCat = :newCategoryId
                WHERE idWiki = :yourWikiId";

            $this->db->query($req);

            $this->db->bind(':newNameWiki', $nameWiki);
            $this->db->bind(':newDescriptionWiki', $descriptionWiki);
            $this->db->bind(':newDateCreated', $currentDate);
            $this->db->bind(':newUserId', $idUser);
            $this->db->bind(':newCategoryId', $idCat);
            $this->db->bind(':yourWikiId', $idWiki);

            $this->db->execute();

            // Assuming the update is successful

        } catch (Exception $e) {
            error_log("Error in Update wiki: " . $e->getMessage());
            return false;  // Indicate that there was an error
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
    public function searchWiki($searchTerm, $idUser)
    {
        $query = 'SELECT * FROM `wikiviews` WHERE (`nameWiki` LIKE :searchTerm or `nameCat` LIKE :searchTerm or `tag_names` LIKE :searchTerm)';


        if ($idUser !== null) {
            $query .= ' AND `idUser` = :idUser';
        }

        $this->db->query($query);
        $this->db->bind(':searchTerm', "%$searchTerm%");


        if ($idUser !== null) {
            $this->db->bind(':idUser', $idUser);
        }

        return $this->db->fetchAll();
    }



    public function wikifilterDao()
    {
        try {
            $id = $_GET['id'];
            $req = "SELECT * FROM wiki where idCat = $id";
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

    /**
     * Get the value of tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of tag
     *
     * @return  self
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }
}
