<?php
namespace src\Controller;

use src\Model\Category;
use src\Model\Bdd;
use DateTime;

class CategoryController extends AbstractController {

    public function Index(){
        return $this->ListAll();
    }

    public function ListAll(){
        $category = new Category();
        $listCategory = $category->SqlGetAll(Bdd::GetInstance());

        //Lancer la vue TWIG
        return $this->twig->render(
            'Category/list.html.twig',[
                'categoryList' => $listCategory
            ]
        );
    }

    public function add(){
        #UserController::roleNeed('redacteur');
        if($_POST AND $_SESSION['token'] == $_POST['token']){
            $sqlRepository = null;
            $nomImage = null;
            if(!empty($_FILES['image']['name']) )
            {
                $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
                $extension  = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if(in_array(strtolower($extension),$tabExt))
                {
                    $nomImage = md5(uniqid()) .'.'. $extension;
                    $dateNow = new DateTime();
                    $sqlRepository = $dateNow->format('Y/m');
                    $repository = './uploads/images/'.$dateNow->format('Y/m');
                    if(!is_dir($repository)){
                        mkdir($repository,0777,true);
                    }
                    move_uploaded_file($_FILES['image']['tmp_name'], $repository.'/'.$nomImage);
                }
            }
            $category = new Category();
            $category->setTitre($_POST['id_cat'])
                ->setCatLibelle($_POST['cat_libelle'])
                ->setCatNom($_POST['cat_nom'])
                ->setImageRepository($sqlRepository)
                ->setImageFileName($nomImage)
            ;
            $category->SqlAdd(BDD::getInstance());
            header('Location:/Article');
        }else{
            // Génération d'un TOKEN
            $token = bin2hex(random_bytes(32));
            $_SESSION['token'] = $token;
            return $this->twig->render('Category/add.html.twig',
                [
                    'token' => $token
                ]);
        }
    }

    public function update($categoryID){
        $articleSQL = new Category();
        $article = $categorySQL->SqlGet(BDD::getInstance(),$categoryID);
        if($_POST){
            $sqlRepository = null;
            $nomImage = null;
            if(!empty($_FILES['image']['name']) )
            {
                $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
                $extension  = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if(in_array(strtolower($extension),$tabExt))
                {
                    $nomImage = md5(uniqid()) .'.'. $extension;
                    $dateNow = new DateTime();
                    $sqlRepository = $dateNow->format('Y/m');
                    $repository = './uploads/images/'.$dateNow->format('Y/m');
                    if(!is_dir($repository)){
                        mkdir($repository,0777,true);
                    }
                    move_uploaded_file($_FILES['image']['tmp_name'], $repository.'/'.$nomImage);
                    // suppression ancienne image si existante

                    if($_POST['imageAncienne'] != '/'){
                        unlink('./uploads/images/'.$_POST['imageAncienne']);
                    }
                }
            }

            $category->setCatId($_POST['id_cat'])
                ->setCatLibelle($_POST['cat_libelle'])
                ->setCatNom($_POST['cat_nom'])
                ->setImageRepository($sqlRepository)
                ->setImageFileName($nomImage)
            ;

            $category->SqlUpdateCategory(BDD::getInstance());
        }

        return $this->twig->render('Category/update.html.twig',[
            'category' => $category
        ]);
    }

    public function Delete($categoryID){
        $categorySQL = new Category();
        $category = $articleSQL->SqlGet(BDD::getInstance(),$categoryID);
        $category->SqlDelete(BDD::getInstance(),$categoryID);
        if($category->getImageFileName() != ''){
            unlink('./uploads/images/'.$category->getImageRepository().'/'.$category->getImageFileName());
        }

        header('Location:/');
    }

    public function fixtures(){
        $catNom = array('Jeremy', 'Paul', 'Noé');
        $catLibelle = array('Sao c est bien', 'jojo c nul', 'FF c bien', 'Oui');
        $category = new Category();
        $category->SqlTruncate(BDD::getInstance());
        for($i = 1;$i <=5; $i++){
            shuffle($catNom);
            shuffle($arrayCatLibelle);

            $dateajout->modify('+'.$i.' day');

            $article->setTitre($arrayTitre[0])
                ->setDescription('On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).')
                ->setAuteur($arrayAuteur[0]);
            $article->SqlAdd(BDD::getInstance());
        }
        header('Location:/Article');
    }


    public function Write(){

        $category = new Category();
        $listCategory = $categorys->SqlGetAll(Bdd::GetInstance());

        $file = 'category.json';
        if(!is_dir('./uploads/file/')){

            mkdir('./uploads/file/', 0777, true);
        }
        file_put_contents('./uploads/file/'.$file, json_encode($listCategory));

        header('location:/Category/');
    }

    public function Read(){
        $file='category.json';
        $datas = file_get_contents('./uploads/file/'.$file);
        $contenu = json_decode($datas);

        return $this->twig->render('Category/readfile.html.twig', [
            'fileData' => $contenu
        ]);
    }

    public function Show($categoryID){
        // affiche un article seul
        $categorySQL = new Category();
        $category = $categorySQL->SqlGet(BDD::getInstance(),$categoryID);

        return $this->twig->render('Category/view.html.twig',[
            'category' => $category
        ]);
    }

    public function WriteOne($idCategory){
        $category = new Category();
        $categoryData = $article->SqlGet(Bdd::GetInstance(), $idCategory);

        $file = 'category_'.$idCategory.'.json';
        if(!is_dir('./uploads/file/')){
            mkdir('./uploads/file/', 0777, true);
        }
        file_put_contents('./uploads/file/'.$file, json_encode($categoryData));

        header('location:/Category/');
    }

    public function ListValidator(){
        $category = new Category();
        $listCategory = $category->SqlValidator(Bdd::GetInstance());

        //Lancer la vue TWIG
        return $this->twig->render(
            'Category/Validation.html.twig',[
                'categoryList' => $listCategory
            ]
        );
    }

    public function Validation(){
        $category = new Category();
        $listCategory = $category->SqlGetAll(Bdd::GetInstance());

        //Lancer la vue TWIG
        return $this->twig->render(
            'Category/Validation.html.twig',[
                'categoryList' => $listCategory
            ]
        );
    }

    public function Val($categoryID){
        $categorySQL = new Category();
        $category = $categorySQL->Sqlchange(Bdd::GetInstance(), $categoryID);

        header('Location:/Category/Validation');
    }

}


