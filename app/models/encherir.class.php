<?php

namespace App\Models;

class Encherir
{
    protected $id;
    protected $amount;
    protected $car_id;
    protected $user_id;
    protected $dbh;


    public function __construct($id, $amount, $car_id, $user_id, $dbh)
    {
        $this->id = $id;
        $this->amount = filter_var($amount, FILTER_SANITIZE_STRING);
        $this->car_id = $car_id;
        $this->user_id = $user_id;
        $this->dbh = $dbh;
    }

    public function insert()
    {
        $query = $this->dbh->prepare(" INSERT INTO Enchere (amount, car_id, user_id)
        VALUES (?, ?, ?)");
        return $query->execute([$this->amount, $this->car_id, $_SESSION['id']]);
    }
}
