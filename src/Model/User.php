<?php


namespace src\Model;


 class User implements \JsonSerializable  {
    private $uti_mail;
    private $uti_nom;
    private $uti_prenom;
    private $uti_role;
    private $uti_password;
    private $uti_token;
    private $id_uti;

    public function SqlAddUser(\PDO $bdd) {
        try{
            $requete = $bdd->prepare('INSERT INTO user (uti_mail, uti_nom, uti_prenom, uti_password, uti_role) VALUES(:uti_mail, :uti_nom, :uti_prenom, :uti_password, :uti_role)');
            $requete->execute([

                'uti_mail' => $this->getUtiMail(),
                'uti_nom' => $this->getUtiNom(),
                'uti_prenom' => $this->getUtiPrenom(),
                'uti_password' => $this->getUtiPassword(),
                'uti_role' => $this->getUtiRole(),
                'id_uti' =>$this->getUtiId()
            ]);
            return array("result"=>true,"message"=>$bdd->lastInsertId());
        }catch (\Exception $e){
            return array("result"=>false,"message"=>$e->getMessage());
        }

    }

     public function SqlGetUser(\PDO $bdd,$idUser){
         $requete = $bdd->prepare('SELECT * FROM user where id_uti = :idUser');
         $requete->execute([
             'id_uti' => $idUser
         ]);

         $datas =  $requete->fetch();

         $article = new User();
         $article->setUtiMail($datas['uti_mail']);
         $article->setUtiNom($datas['uti_nom']);
         $article->setUtiPrenom($datas['uti_prenom']);
         $article->setUtiPassword($datas['uti_password']);
         $article->setUtiRole($datas['uti_role']);
         $article->setUtiId($datas['id_uti']);


         return $article;


     }
     public function SqlUpdateUser(\PDO $bdd, $id_uti){
         try{
             $requete = $bdd->prepare('UPDATE user set uti_mail=:uti_mail, uti_nom=:uti_nom, uti_prenom=:uti_prenom, uti_password=:uti_password WHERE id_uti=:IDUSER');
             $requete->execute([
                 'uti_mail' => $this->getUtiMail()
                 ,'uti_nom' => $this->getUtiNom()
                 ,'uti_prenom' => $this->getUtiPrenom()
                 ,'uti_password' => $this->getUtiPassword()
                 ,'id_uti' => $this->getUtiId($id_uti)
             ]);
             return array("0", "[OK] Update");
         }catch (\Exception $e){
             return array("1", "[ERREUR] ".$e->getMessage());
         }
     }

     public function jsonSerialize()
     {
         return [
             'uti_mail' => $this->getUtiMail(),
             'uti_nom' => $this->getUtiNom(),
             'uti_prenom' => $this->getUtiPrenom(),
             'uti_password' => $this->getUtiPassword(),
             'uti_role' => $this->getUtiRole(),
             'id_uti' => $this->getUtiId()
         ];
     }

    /**
     * @return mixed
     */
    public function getUtiMail()
    {
        return $this->uti_mail;
    }

    /**
     * @param mixed $uti_mail
     */
    public function setUtiMail($uti_mail)
    {
        $this->uti_mail = $uti_mail;
    }

    /**
     * @return mixed
     */
    public function getUtiNom()
    {
        return $this->uti_nom;
    }

    /**
     * @param mixed $uti_nom
     */
    public function setUtiNom($uti_nom)
    {
        $this->uti_nom = $uti_nom;
    }

    /**
     * @return mixed
     */
    public function getUtiPrenom()
    {
        return $this->uti_prenom;
    }

    /**
     * @param mixed $uti_prenom
     */
    public function setUtiPrenom($uti_prenom)
    {
        $this->uti_prenom = $uti_prenom;
    }

    /**
     * @return mixed
     */
    public function getUtiPassword()
    {
        return $this->uti_password;
    }

    /**
     * @param mixed $uti_password
     */
    public function setUtiPassword($uti_password)
    {
        $this->uti_password = $uti_password;
    }

    /**
     * @return mixed
     */
    public function getUtiRole()
    {
        return $this->uti_role;
    }

    /**
     * @param mixed $uti_role
     */
    public function setUtiRole($uti_role)
    {
        $this->uti_role = $uti_role;
    }

     public function  getUtiId($id_uti){
        return $this->id_uti;
     }

     /**
      * @param mixed $id_uti
      */
     public function setUtiId($id_uti)
     {
         $this->id_uti = $id_uti;
     }
 }