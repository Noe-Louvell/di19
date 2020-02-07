<?php



namespace src\Controller;


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

    public function update($id_cat){
        $articleSQL = new Category();
        $article = $articleSQL->SqlGetAll(BDD::getInstance());
        if($_POST){
            $sqlRepository = null;


            $article->setIdCat($_POST['id_cat'])
                ->setCatNom($_POST['cat_nom'])
            ;

            $article->SqlUpdateCategorie(BDD::getInstance(),$id_cat);
        }

        return $this->twig->render('Category/update.html.twig',[
            'article' => $article
        ]);
    }

    public function Delete($id_cat){
        $categorieSQL = new Category();
        $categorie = $categorieSQL->SqlGetAll(BDD::getInstance(),$id_cat);
        $categorie->SqlDeleteCategorie(BDD::getInstance(),$id_cat);
        header('Location:/');
    }



    public function Add()
    {
        $sqlRepository = null;

        $user = new Category();

        $user->setIdCat($_POST['id_cat'])
            ->setCatNom($_POST['cat_nom']);
        $user->SqlAdd(BDD::getInstance());
        header('Location:/');
    }
}


