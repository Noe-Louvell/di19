<?php


namespace src\Controller;

use src\Model\Article;
use src\Model\Bdd;
use src\Model\Category;

class CategoryController extends AbstractController
{
    public function index(){
        return $this->listAll();
    }

    public function listAll(){
        $cat = new Category();
        $listCat = $cat->SqlGetAll(Bdd::GetInstance());

        return $this->twig->render(
            'Category/list.html.twig',
            ['categoryList'=> $listCat]
        );
    }

    public function SqlAdd()
    {
        $sqlRepository = null;

        $categorie = new Categorie();

        $user->setUtiMail($_POST['uti_mail'])
            ->setUtiNom($_POST['uti_nom'])
            ->setUtiPrenom($_POST['uti_prenom'])
            ->setUtiPassword($_POST['uti_password']);
        $user->SqlAddUser(BDD::getInstance());
        header('Location:/');
    }



    public function Delete($idCategorie){
        $categorieSQL = new Category();
        $categorie = $categorieSQL->SqlGet(BDD::getInstance(),$idCategorie);
        $categorie->SqlDeleteCategorie(BDD::getInstance(),$idCategorie);
        header('Location:/');
    }



    public function add(){
        //AdminController::roleNeed();
        $cat = new Category();
        $cat->($_POST[''])
    }
}