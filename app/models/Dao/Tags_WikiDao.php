<?php
require_once(APPROOT . '/models/Tags_Wiki.php');
 require_once(APPROOT . '/models/Wiki.php');
  require_once(APPROOT . '/models/Tags.php');
 require_once(APPROOT . '/models/Dao/AuthorDao.php');
 require_once(APPROOT . '/models/Categorie.php');

class Tags_WikiDao
{
    private $db;
    private Tags_Wiki $wikis;
    private Tags_Wiki $tags;
    public function __construct()
    {
        $this->db = new Database();
        $this->wikis=new Tags_Wiki();
    }


    

   
    public function InsertWiki_Tags(Tags_Wiki $tags_Wiki) {
        try {
            $idWiki = $tags_Wiki->getWiki()->getIdWiki();
            $idTag = $tags_Wiki->getTags()->getIdTag();
            $req = "INSERT INTO `wiki_tags` (`idWiki`, `idTag`) VALUES (:idwiki, :tags)";
            $this->db->query($req);
            $this->db->bind(':idwiki', $idWiki);  
            $this->db->bind(':tags', $idTag); 
             
            $this->db->execute(); 
            // die($idTag); 
        } catch (Exception $e) {
            error_log("Error in Insert Wiki_Tags: " . $e->getMessage());
        }
    }
    
    
    public function getWikis()
    {
        return $this->wikis;
    }

    /**
     * Get the value of tags
     */ 
    public function getTags()
    {
        return $this->tags;
    }
}