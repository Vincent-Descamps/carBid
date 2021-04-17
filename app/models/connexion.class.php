<?php

namespace App\Models;

class Connexion
{
    protected $id;
    protected $firstname;
    protected $mail;
    protected $password;
    protected $dbh;


    public function __construct($id, $firstname, $mail, $password, $dbh)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        $this->password = $password;
        $this->dbh = $dbh;
    }

    public function check()
    {
        $mail = $_POST['mail'];
        $query = $this->dbh->prepare(" SELECT * FROM User WHERE mail = :mail");
        $query->execute(array('mail' => $_POST['mail']));
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        $passCorrect = $result['password'];
        $password = $_POST['password'];



        if ($mail != $result['mail']) {
            echo 'Mauvais email!';
        } else {
            if ($passCorrect === $password) {
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['mail'] = $mail;
                $_SESSION['password'] = $password;

                echo 'Vous etes bien connecté !';
                header('Location: /');
                exit;
            } else {
                echo 'Votre mot de passe n\'est pas correct !';
            }
        }
    }
}
