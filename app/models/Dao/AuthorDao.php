<?php 
class AuthorDao{
    private $db;
    private User $user;

    public function __construct(){
        $this->db = new Database();
    }
    
    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}
?>