<?php

namespace App\Controllers;


include_once __DIR__ . "/../core/Database.class.php";
include __DIR__ . "/../views/user.php";
include_once __DIR__ . "/../models/user.class.php";

use App\Database\Database;
use App\Views\User as UserView;
use App\Models\User as UserModel;




class User
{
    public function render()
    {
        $form = new UserView(null);
        $form->render();
    }


    public function record()
    {
        $data_validated = true;
        if ($data_validated) {

            $dbh = Database::createDBConnection();
            $user = new UserModel(null, $_POST["firstname"], $_POST["lastname"], $_POST["mail"], $_POST["password"], $dbh);
            $result = $user->insert();
        }


        $user = new UserView($result); // création d'une instance
        $user->render(); // appel de la méthode d'affichage
    }
}
