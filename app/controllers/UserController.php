<?php

class UserController extends Controller
{


  public function __construct()
  {
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
  public function search($table, $search)
  {
  }

    
  
}
