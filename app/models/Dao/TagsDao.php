<?php
require_once(APPROOT . '/models/Tags.php');

class TagsDao{

    private $db;
    private Tags $tags;

    public function __construct(){
        $this->db = new Database;
        $this->tags = new Tags();
    }

    public function InsertTagsDao(Tags $tags)
    {
        try {
            $Tags_name = $tags->getNameTag();
            $req = "INSERT INTO tags(nameTag) VALUES (:name)";
            $this->db->query($req);
            $this->db->bind(':name', $Tags_name);
           $ress= $this->db->execute();
           var_dump($ress);
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in Insert: " . $e->getMessage());

        }

    }

    public function getAllTags()
    {
        try {
            $req = "SELECT * FROM `tags`";
            $this->db->query($req);
            $res = $this->db->fetchAll();
            $tags = array();
            foreach ($res as $obj) {
                $tag = new Tags();
                $tag->setIdTag($obj->idTag);
                $tag->setNameTag($obj->nameTag);
                array_push($tags, $tag);
            }
            
            return $tags;
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllCat: " . $e->getMessage());

        }
    }

    public function DellettagDao(Tags $tags)
    {
        try {
            $tags_id=$tags->getIdTag();
            $req = "DELETE FROM `tags` WHERE idTag= :id";
            $this->db->query($req);
            $this->db->bind(":id", $tags_id);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            // Log the error for debugging purposes
            error_log("Error in Dellet: " . $e->getMessage());

        }
    }

     // // Update 
     public function UpdateTagsDao(Tags $tags)
     {
         try {
             $tag_id=$tags->getIdTag();
             $tag_name=$tags->getNameTag();
             $req = "UPDATE tags SET nameTag=:name WHERE idTag= :id";
             $this->db->query($req);
             $this->db->bind(":id", $tag_id);
             $this->db->bind(":name", $tag_name);
             $this->db->execute();
         } catch (Exception $e) {
             // Handle the exception
             error_log("Error in update: " . $e->getMessage());
 
         }
     }

    /**
     * Get the value of tags
     */ 
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */ 
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }
}
?>