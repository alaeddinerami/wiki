<?php 
class AuthorDao{
    private $db;
    private User $user;

    public function __construct(){
        $this->db = new Database();
    }
    // public function verifyUser(User $user)
    // {   
    //     $email = $user->getEmail();
    //     $password = $user->getPassword();
    //     $role = $user->getRole();
    //     // echo $email;
    //     // echo $password;

    //     $stmt = $this->db->prepare("SELECT * FROM utilisateur WHERE email  = :email");

    //     $stmt->bindParam(':email', $email);

    //     $stmt->execute();

    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $validation = false;

    //     if ($result != false) {
    //         $validation = true;
    //     }

    //     if ($validation && password_verify($password, $result['userPassword'])) {
    //         return $result;
    //     } else {
    //         return false;
    //     }
    // } 
    
    // public function signup(User $user)
    // {
    //     $name = $user->getName();
    //     $email = $user->getEmail();
    //     $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    //     $role = $user->getRole();
    //     if ($this->verifyUserByEmail($email) == true) {
    //         $stmt = $this->db->prepare("INSERT INTO utilisateur (name, email, PASSWORD) VALUES (:name, :email, :password)");

    //         $stmt->bindParam(':name', $name);
    //         $stmt->bindParam(':email', $email);
    //         $stmt->bindParam(':password', $password);
            

    //         $stmt->execute();
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function verifyUserByEmail($email)
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM utilisateur WHERE email  = :email");

    //     $stmt->bindParam(':email', $email);

    //     $stmt->execute();

    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($result == false) {
    //         return true;
    //     } else {

    //         return false;
    //     }
    // }

    // public function selectLastUser()
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM utilisateur ORDER BY idUser LIMIT 1");

    //     $stmt->execute();

    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //     return $result;
    // }

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