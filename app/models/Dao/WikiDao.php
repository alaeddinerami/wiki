<?php 
require_once(APPROOT . '/models/Wiki.php');

class WikiDao{
    private $db;
    private Wiki $wiki;

    public function __construct(){
        $this->db = new Database;
        $this->wiki = new Wiki();
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
}
?>