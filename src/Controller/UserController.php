<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\User;

class UserController extends  AbstractController
{

    public function loginForm()
    {
        return $this->twig->render('User/login.html.twig');
    }

    public function loginCheck()
    {

        if (!filter_var(
            $_POST['password'],
            FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => "/[a-zA-Z]{3,}/")
            )
        )){
            $_SESSION['errorlogin'] = "Mot de passe trop court (3 caractères minimum).";
            header('Location:/Login');
            return;
        }

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $_SESSION['errorlogin'] = "Adresse mail invalide.";
            header('Location:/Login');
            return;
        }

        if ($_POST["email"] == "admin@admin.com"
            AND $_POST["password"] == "password"
        ) {

            $_SESSION['login'] = array(
                'Nom' => 'Administrateur'
            , 'Prénom' => 'Sylvain'
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

    public function register()
    {

            $sqlRepository = null;

            $user = new User();
            $user->setUtiMail($_POST['uti_mail'])
                ->setUtiNom($_POST['uti_nom'])
                ->setUtiPrenom($_POST['uti_prenom'])
                ->setUtiPassword($_POST['uti_password']);
            $user->SqlAddUser(BDD::getInstance());


    }

}

