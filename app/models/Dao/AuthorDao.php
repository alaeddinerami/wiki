<?php
require_once '../app/models/User.php';
class AuthorDao
{

    private $db;
    private User $user;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function SingupDao(User $user)
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $pass = $user->getPassword();



        // Hash the password
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        if ($this->verifyUserByEmail($email) == true) {
            $req = "INSERT INTO utilisateur(name, email, PASSWORD) VALUES (:nom, :email, :password)";

            $this->db->query($req);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $hashedPassword);
            $this->db->bind(':nom', $name);

            // Execute the query
            $this->db->execute();

            return true;
        } else {
            return false;
        }
    }

    public function verifyUserByEmail($email)
    {
        $this->db->query("SELECT * FROM utilisateur WHERE email = :email");
        $this->db->bind(':email', $email);

        $result = $this->db->single();

        if ($result == false) {
            return true;
        } else {

            return false;
        }
    }

    public function verifyUserDao(User $user)
    {
        $email = $user->getEmail();
        $pass = $user->getPassword();

        $this->db->query("SELECT * FROM utilisateur WHERE email = :email");
        $this->db->bind(':email', $email);

        $result = $this->db->single();

        if ($this->db->rowCount() > 0 && password_verify($pass, $result->PASSWORD)) {

            return $result;
        } else {
            return false;
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
