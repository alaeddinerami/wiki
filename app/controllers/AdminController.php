<?php
class AdminController extends Controller
{
  // private $adminDao;
  private $categoy;
  private $tags;

  private $wiki;

  private $admin;
  public function __construct()
  {
    // $this->adminDao =$this->model('AdminDao');
    $this->categoy = $this->model('CategorieDao');
    $this->tags = $this->model('TagsDao');
    $this->wiki = $this->model('WikiDao');
    $this->admin = $this->model('AdminDao');
  }

  public function index()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    $data = [
      'title' => 'wiki',
      'Users' => $this->admin->DisplayAllUser(),
      'Wikis' => $this->admin->DisplayAllwikis(),
      'Categories' => $this->admin->DisplayAllCategorie(),
      'Tags' => $this->admin->DisplayAllTags()


    ];
    // var_dump($data);
    // die;

    $this->view('pages/Dashbord/Dashbord', $data);
  }
  // -----------------------------------Dashbord
  
  public function Dashbord()
  {
    
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    $data = [
      'title' => 'wiki',
    ];

    $this->view('pages/Dashbord/Dashbord', $data);
  }
  //......................................Users

  // -----------------------------------Categorie
  public function Categorie()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    $data = [
      'title' => 'Categorie',
      'Categorie' => $this->categoy->getAllCat()
    ];

    $this->view('pages/Dashbord/Categorie', $data);
  }

  // -----------------------------------Tags
  public function Tags()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    $data = [
      'title' => 'Tags',
      'Tags' => $this->tags->getAllTags()
    ];


    $this->view('pages/Dashbord/Tags', $data);
  }
  // -----------------------------------Wiki
  public function Wiki()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    $data = [
      'title' => 'Wiki',
      'Wiki' => $this->wiki->getAllWikis()
    ];
    //  var_dump($data);
    //        die;
    $this->view('pages/Dashbord/Wiki', $data);
  }

  // ------------------------------------Categorie
  // Insert Categorie

  public function InsertCategorie()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_POST['add_categorie'])) {

      $Categorie_name = $_POST['categorie'];
      $Categoriy = new Categorie();
      $Categoriy->setNameCat($Categorie_name);
      $this->categoy->InsertCategorie($Categoriy);
      redirect('AdminController/Categorie');
    }
  }
  //Update Categorie
  public function UpdateCategorie()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_POST['categoryName'])) {
      var_dump($_POST);


      $id = $_POST['categoryId'];
      $Categorie_name = $_POST['categoryName'];
      $Categorie = new Categorie();
      $Categorie->setIdCat($id);
      $Categorie->setNameCat($Categorie_name);
      $this->categoy->UpdateCategorie($Categorie);
      redirect('AdminController/Categorie');
    } else {
      redirect('AdminController/Categorie');
    }
  }
  // Delete Categorie:

  public function DelletCategorie()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $idCategory = $this->categoy->getCategory()->setIdCat($id);
      $this->categoy->DelletCategorie($idCategory);

      redirect('AdminController/Categorie');
    } else {
      redirect('AdminController/Categorie');
    }
  }
  // ______________________Log Out----------------
  public function logout()
  {
    session_destroy();
    $_SESSION['Error'] = 'user not found';
    redirect('UserController/LoginAuthor');
  }

  //.............................tags........................
  // Insert Tags

  public function Inserttags()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_POST['add_tags'])) {

      $Tags_name = $_POST['tags'];
      $Tags = new Tags();
      $Tags->setNameTag($Tags_name);
      $this->tags->InsertTagsDao($Tags);
      redirect('AdminController/Tags');
    }
  }
  public function UpdateTag()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_POST['Tagsname'])) {
      var_dump($_POST);


      $tag_id = $_POST['TagsId'];
      $tags_name = $_POST['Tagsname'];
      $tag = new Tags();
      $tag->setIdTag($tag_id);
      $tag->setNameTag($tags_name);
      $this->tags->UpdateTagsDao($tag);
      redirect('AdminController/Tags');
    } else {
      redirect('AdminController/Tags');
    }
  }
  public function DelletTag()
  {
    if ($_SESSION['Error'] == 'user no found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $idTag = $this->tags->getTags()->setIdTag($id);
      $this->tags->DellettagDao($idTag);

      redirect('AdminController/Tags');
    } else {
      redirect('AdminController/Tags');
    }
  }

  public function Archiver()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_POST['archiver'])) {


      $archiver = $_POST['archiver'];
      $wiki = new wiki();

      $wiki->setIdWiki($archiver);
      $this->wiki->ArchiverDao($wiki);

      redirect('AdminController/Wiki');
    } else {
      redirect('AdminController/Wiki');
    }
  }

  public function NomArchiver()
  {
    if ($_SESSION['Error'] == 'user not found') {
      redirect('UserController/LoginAuthor');
    }
    if (isset($_POST['non_archiver'])) {


      $archiver = $_POST['non_archiver'];
      $wiki = new wiki();

      $wiki->setIdWiki($archiver);
      $this->wiki->NonArchiverDao($wiki);

      redirect('AdminController/Wiki');
    } else {
      redirect('AdminController/Wiki');
    }
  }
}
