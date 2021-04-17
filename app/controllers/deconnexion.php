<?php

namespace App\Controllers;


class Deconnexion
{

    public function deco()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}
