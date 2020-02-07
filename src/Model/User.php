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


     public function SqlGetUser(\PDO $bdd){
         $requete = $bdd->prepare('SELECT * FROM user');
         $requete->execute();
         $arrayUser = $requete->fetchAll();

         $listUser = [];
         foreach ($arrayUser as $UserSQL){
             $user = new User();
             $user->setIdUti($UserSQL['id_uti']);
             $user->setUtiMail($UserSQL['uti_mail']);
             $user->setUtiNom($UserSQL['uti_nom']);
             $user->setUtiPrenom($UserSQL['uti_prenom']);
             $user->setUtiPassword($UserSQL['uti_password']);
             $user->setUtiRole($UserSQL['uti_role']);

             $listUser[] = $user;
         }
         return $listUser;
     }

    public function SqlAddUser(\PDO $bdd) {
        try{
            $requete = $bdd->prepare('INSERT INTO user (uti_mail, uti_nom, uti_prenom, uti_password, uti_role) VALUES(:uti_mail, :uti_nom, :uti_prenom, :uti_password, :uti_role)');
            $requete->execute([

                'uti_mail' => $this->getUtiMail(),
                'uti_nom' => $this->getUtiNom(),
                'uti_prenom' => $this->getUtiPrenom(),
                'uti_password' => $this->getUtiPassword(),
                'uti_role' => $this->getUtiRole()

            ]);
            return array("result"=>true,"message"=>$bdd->lastInsertId());
        }catch (\Exception $e){
            return array("result"=>false,"message"=>$e->getMessage());
        }

    }


     public function SqlUpdateUser(\PDO $bdd, $id_uti){
         try{
             $requete = $bdd->prepare('UPDATE user set uti_mail=:uti_mail, uti_nom=:uti_nom, uti_prenom=:uti_prenom, uti_password=:uti_password WHERE id_uti=:IDUSER');
             $requete->execute([
                 'uti_mail' => $this->getUtiMail()
                 ,'uti_nom' => $this->getUtiNom()
                 ,'uti_prenom' => $this->getUtiPrenom()
                 ,'uti_password' => $this->getUtiPassword()

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

         ];
     }

     public function SqlValidatorUser(\PDO $bdd){
         $requete = $bdd->prepare('SELECT * FROM user WHERE uti_role = 1');
         $requete->execute();
         $arrayUser = $requete->fetchAll();

         $listUser = [];
         foreach ($arrayUser as $UserSQL){
             $user = new User();
             $user->setIdUti($UserSQL['id_uti']);
             $user->setUtiMail($UserSQL['uti_mail']);
             $user->setUtiNom($UserSQL['uti_nom']);
             $user->setUtiPrenom($UserSQL['uti_prenom']);
             $user->setUtiPassword($UserSQL['uti_password']);
             $user->setUtiRole($UserSQL['uti_role']);

             $listUser[] = $user;
         }
         return $listUser;
     }
     public function SqlchangeUser($bdd,$idUser){
         $requete = $bdd->prepare('update user set uti_role = 2 where id_uti=:idUser');
         $requete->execute([
             'idUser' => $idUser
         ]);
     }
     public function SqlValiderUser(\PDO $bdd,$idUser) {
         try{
             $requete = $bdd->prepare('INSERT INTO user (uti_role) VALUES(2) where idUser = idUser.User');
             $requete->execute();
             return array("result"=>true,"message"=>$bdd->lastInsertId());
         }catch (\Exception $e){
             return array("result"=>false,"message"=>$e->getMessage());
         }
     }
     public function SqlGet(\PDO $bdd,$idUser){
         $requete = $bdd->prepare('SELECT * FROM user where id_uti = :$idUser');
         $requete->execute([
             'idUser' => $idUser
         ]);

         $datas =  $requete->fetch();

             $user = new User();
             $user->setIdUti($datas['id_uti']);
             $user->setUtiMail($datas['uti_mail']);
             $user->setUtiNom($datas['uti_nom']);
             $user->setUtiPrenom($datas['uti_prenom']);
             $user->setUtiPassword($datas['uti_password']);
             $user->setUtiRole($datas['uti_role']);

             return $user;
     }
     public function Sqlchange($bdd,$idUser){
         $requete = $bdd->prepare('update user set uti_role = 2 where id_uti=:idUser');
         $requete->execute([
             'idUser' => $idUser
         ]);
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
        return $this;
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
        return $this;
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
        return $this;
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
        return $this;
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
        return $this;
    }

     /**
      * @return mixed
      */
     public function getIdUti()
     {
         return $this->id_uti;
     }

     /**
      * @param mixed $id_uti
      */
     public function setIdUti($id_uti)
     {
         $this->id_uti = $id_uti;
         return $this;
     }

 }