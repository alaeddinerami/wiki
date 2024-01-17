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
    private Wiki $wikis;
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
        $this->wikis = new Wiki;
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

    public function UpdateWikis()
    {
        $data = [

            'title' => 'Updatewiki',
            'Categories' => $this->cat->getAllCat(),
            'Tags' => $this->tag->getAllTags()
        ];
        $this->view('pages/users/UpdateWiki', $data);
    }

    public function InsertWikis()
    {
        if (isset($_POST['AddWiki'])) {
            // echo ("sdv");

            $name = $_POST['name'];
            $description = $_POST['description'];
            // $date = $_POST['date'];
            $idCat = $_POST['categorie'];

            $tag = $_POST['tags'];
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
                    $Tags_Wiki = $this->Tags_WikiDAO->InsertWiki_Tags($Tags_Wiki);
                }
            }
            redirect('UserController/author');
        }
    }
    public function UpdateWiki()
    {
        try {
            if (isset($_POST['updateWiki'])) {
                $id = $_POST['updateWiki'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $idCat = $_POST['categorie'];
                // var_dump($_POST['updateWiki']);
                // die();
                // $tags = $_POST['tags'];

                $WIKI = new Wiki();
                $WIKI->setIdWiki($id);
                $WIKI->setNameWiki($name);
                $WIKI->setDescriptionWiki($description);
                $WIKI->getCategorie()->setIdCat($idCat);


                $this->wiki->UpdateWikiDao($WIKI);
                // var_dump($_POST['tags']);
                // die();
                $this->Tags_WikiDAO->deleteTagsReleatedToWiki($id);

                if (isset($_POST['tags']) && is_array($_POST['tags'])) {
                    foreach ($_POST['tags'] as $tag) {
                        $Tags_Wiki = new Tags_Wiki();
                        $Tags_Wiki->getWiki()->setIdWiki($id);
                        $Tags_Wiki->getTags()->setIdTag($tag);

                        $Tags_Wiki = $this->Tags_WikiDAO->InsertWiki_Tags($Tags_Wiki);
                    }
                }
                redirect('UserController/author');
            }
        } catch (Exception $e) {
            // Handle the exception (log, show an error message, etc.)
            error_log("Error in UpdateWiki: " . $e->getMessage());
            // Redirect to an error page or handle accordingly
            redirect('ErrorController');
        }
    }

    public function DelletWiki()
    {
        //   if ($_SESSION['Error'] == 'user no found') {
        //     redirect('UserController/LoginAuthor');
        //   }
        if (isset($_GET['id'])) {
            // var_dump('dsvsd');
            // die();
            $id = $_GET['id'];
            $idWiki = $this->wiki->getWiki()->setIdWiki($id);
            $this->wiki->DelletWikiDao($idWiki);
            // echo('<pre>');
            // var_dump($idWiki);
            // die();
            redirect('UserController/author');
        } else {
            redirect('UserController/author');
        }
    }


    public function search()
    {
        // Check if it's an AJAX request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];

            $searchResults = $this->searchWikiTagCategory($searchTerm);

            echo json_encode($searchResults);
            exit;
        }
    }


    public function searchWikiTagCategory()
    {
        header('Content-Type: application/json');


        $json = file_get_contents('php://input');



        $search = explode('=', $json);



        $searchResults = [];

        $decodedString = urldecode($search[1]);
        $idUser = isset($_SESSION["userId"]) ? $_SESSION["userId"] : null;

        // Search by Wiki
        $wikiResults = $this->wiki->searchWiki($decodedString, $idUser);

        $searchResults['wikis'] = $wikiResults;




        echo  json_encode($searchResults);
    }

    // public function Wiki()
    // {
    //   if ($_SESSION['Error'] == 'user not found') {
    //     redirect('UserController/LoginAuthor');
    //   }
    //   $data = [
    //     'title' => 'Wiki',
    //     'Wikiau' => $this->wiki->getAllWikis()
    //   ];
    //    var_dump($data);
    //          die;
    //   $this->view('pages/users/Home', $data);
    // }
}
