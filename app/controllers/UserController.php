<?php

class UserController extends Controller
{

  private $Author;
  private $user;
  public function __construct()
  {
    $this->Author = $this->model('AuthorDao');
  }


  public function index()
  {
    $data = [
      'title' => 'wiki',
    ];

    $this->view('pages/users/login', $data);
  }

  public function singup()
  {
    $data = [
      'title' => 'Singup',
    ];

    $this->view('pages/users/singup', $data);
  }

  public function singupAuthor()
  {


    if (isset($_POST['registre'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = new User();
      $user->setName($name);
      $user->setEmail($email);
      $user->setPassword($password);

      if ($this->Author->SingupDao($user)) {
        // $_SESSION['succes'] = "Inscription Success ";
        redirect('UserController/LoginAuthor');
      } else {
        // $_SESSION['Error'] = "on Compte deja creer !! ";
        redirect('UserController/singupAuthor');
      }
    } else {
      $data = [
        //   'error_Nom' => $error_Nom,
        //   'error_Email' => $error_Email,
        //   'error_Image' => $error_Image,
        //   'error_Password' => $error_Password,
      ];
      $this->view('pages/users/singup', $data);
    }
  }


  public function LoginAuthor()
  {
    //  $error_Email =  $error_Password = "";
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];


      $user = new User();
      $user->setEmail($email);
      $user->setPassword($password);
      $user =  $this->Author->verifyUserDao($user);
      if ($user != false) {

        $_SESSION['userId'] = $user->idUser;
        $_SESSION['userName'] = $user->name;
        $_SESSION['userEmail'] = $user->email;
        $_SESSION['userRole'] = $user->role;
        $_SESSION['Error'] = 'user found';

        // var_dump($_SESSION['Error']);
        // die();
        if ($_SESSION['userRole'] == 'Autheur') {

          redirect('UserController/author');
        } else {
          redirect('AdminController');
        }
      } else {
        $_SESSION['Error'] = 'user not found';
        $this->view('pages/users/login');
      }
    }
    else {
      $_SESSION['Error'] = 'user not found';
      $data = [
      
          'title' => 'Login'
      ];
      $this->view('pages/users/login',$data);
    }
  }

  public function search($table, $search)
  {
  }

  public function author()
  {
    $data = [
      
      'title' => 'Author'
  ];
    $this->view('pages/users/author',$data);
  }
}
