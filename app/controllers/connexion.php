<?php

namespace App\Controllers;


include_once __DIR__ . "/../core/Database.class.php";
include_once __DIR__ . "/../views/connexion.php";
include_once __DIR__ . "/../models/connexion.class.php";


use App\Database\Database;
use App\Views\Connexion as ConnexionView;
use App\Models\Connexion as ConnexionModel;




class Connexion
{
    public function render()
    {
        $connexion = new ConnexionView(null);
        $connexion->render();
    }
    public function check()
    {
        $data_validated = true;
        if ($data_validated) {

            $dbh = Database::createDBConnection();
            $connexion = new ConnexionModel($_SESSION['id'], $_SESSION["firstname"], $_POST["mail"], $_POST["password"], $dbh);
            $result = $connexion->check();
        }


        $connexion = new ConnexionView($result); // création d'une instance
        $connexion->render(); // appel de la méthode d'affichage
    }
}
