<?php

class UserController extends Controller
{


  public function __construct()
  {
  }
  //   public function LogOut(){
  //     if(isset($_POST['logOut']) && !empty($_SESSION['email'])){
  //         $_SESSION['email']="";
  //         unset($_SESSION['email']);
  //         session_destroy();


  //         header('location: '.URLROOT.'/pages/login');

  //         // For testing, echo a message
  //         // echo "Logged out successfully!";
  //     }
  //     if($_SESSION['email']==""){

  //         header('location: '.URLROOT.'/pages/login');
  //     }
  // }

  // $table = 'tag' || 'wiki' || 'cat'
  // URLROOT . '/userController/search/tag.../'

  public function index()
  {
    $data = [
      'title' => 'wiki',
    ];

    $this->view('pages/signup', $data);
  }
  public function search($table, $search)
  {
  }

    
  public function login()
  {
    // $data = [
    //   // 'title' => 'Categorie',
    //   // 'Categorie' => $this->categoy->getAllCat()
    // ];
    if (isset($_POST['login'])) {
      // Validate email
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Invalid email address';
      } else {
        $email_error = '';
      }

      // Validate password
      if ($_POST['password'] == ' ') {
        $password_error = 'Invalid password format';
      } else {
        $password_error = '';
      }

      if ($email_error == '' && $password_error == '') {
        $user = new AuthorDao;
        $user->getUser()->setEmail(trim($_POST['email']));
        $user->getUser()->setPassword($_POST['password']);


        $user = $user->verifyUser($user->getUser());

        if ($user != false) {
          $_SESSION['userId'] = $user['userId'];
          $_SESSION['userName'] = $user['userName'];
          $_SESSION['userEmail'] = $user['userEmail'];
          $_SESSION['userImage'] = $user['userImage'];
          $_SESSION['userRole'] = $user['userRole'];


          if ($_SESSION['userRole'] == 'admin') {

            // header('location:/paroly/public/dashboard/index');
          } else {
            // header('location:/paroly/public/home/index');
          }
        }
        $error_user = [
          'email_error' => 'user not found',
          'password_error' => $password_error
        ];
        $this->view('login', $error_user);
      } else {
        $error_user = [
          'email_error' => 'user not found',
          'password_error' => $password_error
        ];
        $this->view('login', $error_user);
      }
    } else {
      $error_user = [
        'email_error' => '',
        'password_error' => ''
      ];

      $this->view('pages/users/login', $error_user);
    }
  }

  public function signup()
  { echo 'sfv';
      // // if (isset($_POST["registre"])) {
      // //     $user = new AuthorDao();

      // //     // Validate name
      // //     if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
      // //         $name_error = 'Invalid name format';
      // //     } else {
      // //         $name_error = '';
      // //     }

      // //     // Validate email
      // //     if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      // //         $email_error = 'Invalid email address';
      // //     } else {
      // //         $email_error = '';
      // //     }

      // //     // Validate password
      // //     if ($_POST['password'] == ' ') {
      // //         $password_error = 'Invalid password format';
      // //     } else {
      // //         $password_error = '';
      // //     }

      // //     // Validate confirm password
      // //     if ($_POST['password'] !== $_POST['confirm-password']) {
      // //         $confirm_password_error = 'Passwords do not match';
      // //     } else {
      // //         $confirm_password_error = '';
      // //     }

      // //     // If all validations pass, proceed with user registration
      // //     if ($email_error == '' && $name_error == '' && $password_error == '' && $confirm_password_error == '') {
      // //         $user->getUser()->setName(trim($_POST['name']));
      // //         $user->getUser()->setEmail(trim($_POST['email']));
      // //         $user->getUser()->setPassword($_POST['password']);
      // //         $user->getUser()->setRole(trim($_POST['role']));
      // //         if ($user->signup($user->getUser()) == true) {
      // //             $rowUser = $user->selectLastUser();
      // //             $_SESSION['userId'] = $rowUser['userId'];
      // //             $_SESSION['userName'] = $rowUser['userName'];
      // //             $_SESSION['userEmail'] = $rowUser['userEmail'];
      // //             $_SESSION['userImage'] = $rowUser['userImage'];
      // //             $_SESSION['userRole'] = $rowUser['userRole'];
      // //             // header('location:/paroly/public/home/login');
      // //         } else {
      // //             $error_user = [
      // //                 'email_error' => 'This email exist',
      // //                 'name_error' => $name_error,
      // //                 'password_error' => $password_error,
      // //                 'confirm_password_error' => $confirm_password_error
      // //             ];
      // //             $this->view('pages/users/signup', $error_user);
      // //         }
      // //     } else {
      // //         $error_user = [
      // //             'email_error' => $email_error,
      // //             'name_error' => $name_error,
      // //             'password_error' => $password_error,
      // //             'confirm_password_error' => $confirm_password_error
      // //         ];
      // //         $this->view('pages/users/signup', $error_user);
      // //     }
      // // }
      // // $error_user = [
      // //     'email_error' => '',
      // //     'name_error' => '',
      // //     'password_error' => '',
      // //     'confirm_password_error' => ''
      // ];
      // $this->view('pages/users/signup', $error_user);
  }
}
