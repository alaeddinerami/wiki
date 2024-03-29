<?php

class UserController extends Controller
{

  private $Author;
private $categorie;
  private $wiki;
  private $user;
  public function __construct()
  {
    $this->Author = $this->model('AuthorDao');
    $this->wiki = $this->model('WikiDao');
    $this->categorie = $this->model('CategorieDao');
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


 public function wikimore(){
  $data = [
      
    'title' => 'wiki',
    
    
    'Wiki' => $this->wiki->getsinglWikisView()
    
   
];
  $this->view('pages/users/wikimore',$data);
 }


  public function author()
  {
    $data = [
      
      'title' => 'Author',
      
      'Categories' => $this->categorie->getAllCat(),
      'Wiki' => $this->wiki->getAllWikisView()
      
     
  ];
  
    $this->view('pages/users/author',$data);
  }
  public function navbar()
  {
    $data = [
      
      'title' => 'Author',
      
      'Categories' => $this->categorie->getAllCat()
      // 'Wiki' => $this->wiki->getAllWikisView()
      
     
  ];
  
    $this->view('pages/inc/navbar',$data);
  }

  public function addwiki(){
    $data = [
      
      'title' => 'Addwiki'
  ];
    $this->view('pages/users/addwiki',$data);
  }

  public function wikifilter(){
    $data = [
      
      'title' => 'Categorie',
      
      'Categories' => $this->categorie->getAllCat(),
      'Wiki' => $this->wiki->getAllWikisView(),
      // 'Wikis' => $this->wiki->wikifilterDao()
      
     
  ];
  
    $this->view('pages/users/wikifilter',$data);
  }
}
