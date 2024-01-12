<?php
require_once(APPROOT . '/models/User.php');
require_once(APPROOT . '/models/Categorie.php');
class AuthteurController extends Controller
{

    private $Autheur;
    private $cat;
    private $tag;

    private $wiki;

    private $Tags_Wiki;
    private $Tags_WikiDAO;

    private Categorie $categorie;
    private User $user;
    public function __construct()
    {
        $this->Autheur = $this->model('AdminDao');
        $this->cat = $this->model('CategorieDao');
        $this->tag = $this->model('TagsDao');
        $this->wiki = $this->model('WikiDao');
        $this->Tags_WikiDAO = $this->model('Tags_WikiDao');
        $this->categorie = new Categorie();
        $this->user = new User();
        $this->Tags_Wiki = new Tags_Wiki();
    }


    public function index()
    {
        $data = [
            'title' => 'wiki',
            'Categories' => $this->cat->getAllCat(),
            'Tags' => $this->tag->getAllTags()
        ];
        // var_dump($data);
        // die();

        $this->view('pages/users/addwiki', $data);
    }

    public function InsertWikis()
    {
        if (isset($_POST['AddWiki'])) {
            // echo ("sdv");

            $name = $_POST['name'];
            $description = $_POST['description'];
            // $date = $_POST['date'];
            $idCat = $_POST['categorie'];
            
            $tag =$_POST['tags'];
            // var_dump($_POST['tags']);
            // die();

        

            $WIKI = new wiki();
            $WIKI->setNameWiki($name);
            $WIKI->setDescriptionWiki($description);
            $WIKI->getCategorie()->setIdCat($idCat);
            $wiki = $this->wiki->InsertWikiDao($WIKI);
            if (isset($_POST['tags']) && is_array($_POST['tags'])) {
                foreach ($_POST['tags'] as $tag) {
                    $Tags_Wiki = new Tags_Wiki();
                    $Tags_Wiki->getWiki()->setIdWiki($wiki);
                    $Tags_Wiki->getTags()->setIdTag($tag);
                    $Tags_Wiki= $this->Tags_WikiDAO->InsertWiki_Tags($Tags_Wiki);
                }
            }
            redirect('UserController/author');
        }
    }
}
