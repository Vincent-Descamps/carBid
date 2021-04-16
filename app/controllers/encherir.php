<?php

namespace App\Controllers;

include_once __DIR__ . "/../core/Database.class.php";
include __DIR__ . "/../views/encherir.php";
include_once __DIR__ . "/../models/encherir.class.php";

use App\Database\Database;
use App\Views\Encherir as EncherirView;
use App\Models\Encherir as EncherirModel;


class Encherir
{
    public function render($value)
    {
        //var_dump($value);
        $encherir = new EncherirView(null);
        $encherir->render($value);
    }

    public function record($value)
    {
        $data_validated = true;
        if ($data_validated) {

            $dbh = Database::createDBConnection();
            $encherir = new EncherirModel(null, $_POST["amount"], $_POST['car_id'], $_SESSION['id'], $dbh);
            $result = $encherir->insert();
        }
        $encherir = new EncherirView($result); // création d'une instance
        $encherir->render($value);
    }
}
