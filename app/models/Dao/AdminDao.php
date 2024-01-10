<?php 
require_once(APPROOT . '/models/User.php');
class AdminDao extends User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function DisplayAllUser(){
        
        try {
            $req = "SELECT COUNT(*) as count FROM `utilisateur` ";
            $this->db->query($req);
            $res = $this->db->single();
            
            return $res->count;
           
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllUsers: " . $e->getMessage());

        }
    }

    public function DisplayAllwikis(){
    
        try {
            $req = "SELECT COUNT(*) as count FROM wiki ";
            $this->db->query($req);
            $res = $this->db->single();
            
            return $res->count;
           
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllUsers: " . $e->getMessage());

        }
    }

    public function DisplayAllCategorie(){
    
        try {
            $req = "SELECT COUNT(*) as count FROM categorie ";
            $this->db->query($req);
            $res = $this->db->single();
            
            return $res->count;
           
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllUsers: " . $e->getMessage());

        }
    }

    public function DisplayAllTags(){
    
        try {
            $req = "SELECT COUNT(*) as count FROM tags";
            $this->db->query($req);
            $res = $this->db->single();
            
            return $res->count;
           
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllUsers: " . $e->getMessage());

        }
    }
    // public function login($email, $password)
    // {
    //     $query = "SELECT * FROM user WHERE email = :email LIMIT 1";
    //     $this->db->query($query);
    //     $this->db->bind(':email', $email);
    //     $result = $this->db->single();
    
    //     if ($result) {
    //         // Verify password
    //         if (password_verify($password, $result['password'])) {
    //             // Password is correct
    //             $this->setId_user($result['id_user']);
    //             $this->setNom($result['nom']);
    //             $this->setEmail($result['email']);
    //             $this->setRole($result['role']);
    //             return true;
    //         }
    //     }
    
    //     // Login failed
    //     return false;
    // }
    
}