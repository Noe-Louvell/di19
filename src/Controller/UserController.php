<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\User;

class UserController extends  AbstractController
{
    public function ListAllUser(){
        $user = new User();
        $listUser = $user->SqlGetUser(Bdd::GetInstance());

        //Lancer la vue TWIG
        return $this->twig->render(
            'User/userlist.html.twig',[
                'userList' => $listUser
            ]
        );
    }

    public function loginForm()
    {
        return $this->twig->render('User/login.html.twig');
    }

    public function loginCheck()
    {

        if (!filter_var(
            $_POST['uti_password'],
            FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => "/[a-zA-Z]{3,}/")
            )
        )){
            $_SESSION['errorlogin'] = "Mot de passe trop court (3 caractères minimum).";
            header('Location:/Login');
            return;
        }

        if(!filter_var($_POST['uti_mail'],FILTER_VALIDATE_EMAIL)){
            $_SESSION['errorlogin'] = "Adresse mail invalide.";
            header('Location:/Login');
            return;
        }

        if ($_POST["uti_mail"] == "admin@admin.com"
            AND $_POST["uti_password"] == "password"
        ) {

            $_SESSION['login'] = array(
                'uti_nom' => 'Administrateur'
            , 'uti_prenom' => 'Sylvain'
            , 'roles' => array('admin', 'redacteur')
            );
            header('Location:/');
        }else{
            $_SESSION['errorlogin'] = "Erreur d'authentification.";
            header('Location:/Login');
        }


    }

    public static function roleNeed($roleATester)
    {
        if (isset($_SESSION['login'])) {
            if (!in_array($roleATester, $_SESSION['login']['roles'])) {
                $_SESSION['errorlogin'] = "Manque le role : " . $roleATester;
                header('Location:/Contact');
            }
        }else{
            $_SESSION['errorlogin'] = "Veuillez vous identifier.";
            header('Location:/Login');
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['errorlogin']);

        header('Location:/');
    }


    public function registerFrom(){
        return $this->twig->render('User/register.html.twig');
    }

    public function registerAdd()
    {
            $sqlRepository = null;

            $user = new User();

            $user->setUtiMail($_POST['uti_mail'])
                ->setUtiNom($_POST['uti_nom'])
                ->setUtiPrenom($_POST['uti_prenom'])
                ->setUtiPassword($_POST['uti_password']);
            $user->SqlAddUser(BDD::getInstance());
        header('Location:/');
    }

    public function ListValidatorUser(){
        $user = new User();
        $listUser = $user->SqlValidatorUser(Bdd::GetInstance());

        //Lancer la vue TWIG
        return $this->twig->render(
            'User/ValidationUser.html.twig',[
                'ListUser' => $listUser
            ]
        );
    }

    public function ValidationUser(){
        $user = new User();
        $listUser = $user->SqlGetUser(Bdd::GetInstance());

        //Lancer la vue TWIG
        return $this->twig->render(
            'User/ValidationUser.html.twig',[
                'listUser' => $listUser
            ]
        );
    }

    public function Show($idUser){
        // affiche un article seul
        $userSQL = new User();
        $user = $userSQL->SqlGet(BDD::getInstance(),$idUser);

        return $this->twig->render('User/view.html.twig',[
            'user' => $user
        ]);
    }

    public function Val($idUser){
        $userSQL = new User();
        $user = $userSQL->Sqlchange(Bdd::GetInstance(), $idUser);

        header('Location:/User/ValidationUser');
    }




}

