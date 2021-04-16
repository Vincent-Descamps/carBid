<?php

namespace App\Controllers;


include_once __DIR__ . "/../core/Database.class.php";
include __DIR__ . "/../views/form.php";
include_once __DIR__ . "/../models/form.class.php";

use App\Database\Database;
use App\Views\Form as FormView;
use App\Models\Form as FormModel;




class Form
{
    public function render()
    {
        $form = new FormView(null);
        $form->render();
    }


    public function record()
    {
        $data_validated = true;
        if ($data_validated) {

            $dbh = Database::createDBConnection();
            $form = new FormModel(null, $_POST["marque"], $_POST["modele"], $_POST["annee"], $_POST["kilometrage"], $_POST["description"], $_POST["photo"], $_POST["start_price"], $_POST["date_end"], $_POST["nom_vendeur"], $_POST["prenom_vendeur"], $_POST["email_vendeur"], $dbh);
            $result = $form->insert();
        }


        $form = new FormView($result); // création d'une instance
        $form->render(); // appel de la méthode d'affichage
    }
}
