<?php


namespace src\Model;


class Category implements \JsonSerializable{
    private $cat_nom;
    private $id_cat;

    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare('SELECT cat_nom,id_cat FROM category');
        $requete->execute();

        $datas =  $requete->fetch();

        $category = new Category();
        $category->setIdCat($datas['id_cat']);
        $category->setCatNom($datas['cat_nom']);


        return $category;


    }


    public function SqlAdd(\PDO $bdd) {
        try{
            $requete = $bdd->prepare('INSERT INTO category (cat_nom) VALUES(:cat_nom)');
            $requete->execute([
                "cat_nom" => $this->getCatNom(),

            ]);
            return array("result"=>true,"message"=>$bdd->lastInsertId());
        }catch (\Exception $e){
            return array("result"=>false,"message"=>$e->getMessage());
        }

    }
    public function SqlUpdateCategorie(\PDO $bdd,$id_cat ){
        try{
            $requete = $bdd->prepare('UPDATE category set cat_nom=:cat_nom WHERE id_cat=:id_cat');
            $requete->execute([
                "cat_nom" => $this->getCatNom(),

            ]);
            return array("0", "[OK] Update");
        }catch (\Exception $e){
            return array("1", "[ERREUR] ".$e->getMessage());
        }
    }

    public function SqlDeleteCategorie (\PDO $bdd,$idCategorie){
        try{
            $requete = $bdd->prepare('DELETE FROM category where id_cat = :idCategorie');
            $requete->execute([
                'idCategorie' => $idCategorie
            ]);
            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    public function jsonSerialize()
    {
        return [
            'id_cat' => $this->getIdCat()
            ,'cat_nom' => $this->getCatNom()

        ];
    }



    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * @param mixed $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCatNom()
    {
        return $this->cat_nom;
    }

    /**
     * @param mixed $cat_nom
     */
    public function setCatNom($cat_nom)
    {
        $this->cat_nom = $cat_nom;
        return $this;
    }

}