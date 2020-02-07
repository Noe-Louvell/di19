<?php
namespace src\Model;


class Category extends Contenu implements \JsonSerializable {

    private $idCategory;
    private $CatNom;
    private $CatLibelle;

    public function firstXwords($nb){
        $phrase = $this->getDescription();
        $arrayWord = str_word_count($phrase,1);

        return implode(" ",array_slice($arrayWord,0,$nb));
    }


    public function SqlAdd(\PDO $bdd) {
        try{
            $requete = $bdd->prepare('INSERT INTO category (id_cat, cat_libelle, cat_nom) VALUES(:id_cat, :id_libelle, :id_nom, 1)');
            $requete->execute([
                "id_cat" => $this->getCatId(),
                "cat_libelle" => $this->getCatLibelle(),
                "cat_nom" => $this->getCatNom(),
            ]);
            return array("result"=>true,"message"=>$bdd->lastInsertId());
        }catch (\Exception $e){
            return array("result"=>false,"message"=>$e->getMessage());
        }

    }


    public function SqlGetAll(\PDO $bdd){
            $requete = $bdd->prepare('SELECT * FROM articles');
            $requete->execute();
            $arrayArticle = $requete->fetchAll();

            $listArticle = [];
            foreach ($arrayArticle as $articleSQL){
                $category = new Article();
                $category->setCatId($articleSQL['Id']);
                $category->setCatLibelle($articleSQL['Titre']);
                $category->setCatNom($articleSQL['Auteur']);

                $listCategory[] = $category;
            }
            return $listCategory;
    }
    public function SqlGet(\PDO $bdd,$idCategory){
        $requete = $bdd->prepare('SELECT * FROM articles where Id = :id_category');
        $requete->execute([
            'id_category' => $idCategory
        ]);

        $datas =  $requete->fetch();

        $category = new Category();
        $category->setId($datas['id_cat']);
        $category->setLibelle($datas['cat_libelle']);
        $category->setNom($datas['cat_nom']);

        return $category;


    }

    public function SqlUpdateArticle(\PDO $bdd){
        try{
            $requete = $bdd->prepare('UPDATE category set id_cat=:id_cat, cat_libelle=:cat_libelle, cat_nom=:cat_nom WHERE id=:id_cat');
            $requete->execute([
                'id_cat' => $this->getIdCat()
                ,'cat_libelle' => $this->getCatLibelle()
                ,'cat_nom' => $this->getCatNom()
            ]);
            return array("0", "[OK] Update");
        }catch (\Exception $e){
            return array("1", "[ERREUR] ".$e->getMessage());
        }
    }

    public function SqlDelete (\PDO $bdd,$idArticle){
        try{
            $requete = $bdd->prepare('DELETE FROM category where Id = :id_cat');
            $requete->execute([
                'id_cat' => $id_cat
            ]);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function SqlTruncate (\PDO $bdd){
        try{
            $requete = $bdd->prepare('TRUNCATE TABLE articles');
            $requete->execute();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
    //last 5 données
    public function SqlGetLast(\PDO $bdd){
        $requete = $bdd->prepare('SELECT * FROM category ORDER BY DateAjout DESC LIMIT 5');
        $requete->execute();
        $arrayCategory = $requete->fetchAll();

        $listCategory = [];
        foreach ($arrayCategory as $categorySQL){
            $category = new Category();
            $category->setCatId($categorySQL['id_cat']);
            $category->setCatLibelle($categorySQL['cat_libelle']);
            $category->setCatNom($categorySQL['cat_nom']);

            $listCategory[] = $category;
        }
        return $listCategory;
    }

    public function jsonSerialize()
    {
        return [
            'id_cat' => $this->getCatId()
            ,'cat_libelle' => $this->getCatLibelle()
            ,'cat_nom' => $this->getCatNom()
        ];
    }
    public function SqlValidator(\PDO $bdd){
        $requete = $bdd->prepare('SELECT * FROM category WHERE Etat = 1');
        $requete->execute();
        $arrayCategory = $requete->fetchAll();

        $listCategory = [];
        foreach ($arrayCategory as $categorySQL){
            $category = new Category();
            $category->setCatId($categorySQL['id_cat']);
            $category->setCatLibelle($categorySQL['cat_libelle']);
            $category->setCatNom($categorySQL['cat_nom']);
            $listCategory[] = $category;
        }
        return $listCategory;
    }
    public function Sqlchange($bdd,$idCategory){
        $requete = $bdd->prepare('update category set Etat = 2 where Id=:idCat');
        $requete->execute([
            'id_cat' => $idCategory
        ]);
    }
    public function SqlValider(\PDO $bdd) {
        try{
            $requete = $bdd->prepare('INSERT INTO category (Etat) VALUES(2) where id = id.Category');
            $requete->execute();
            return array("result"=>true,"message"=>$bdd->lastInsertId());
        }catch (\Exception $e){
            return array("result"=>false,"message"=>$e->getMessage());
        }
    }



    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->CatId;
    }

    /**
     * @param mixed $Auteur
     * @return Category
     */
    public function setCatNom($CatNom)
    {
        $this->CatNom = $CatNom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCatLibelle()
    {
        return $this->CatLibelle;
    }
  }