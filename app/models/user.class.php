<?php

namespace App\Models;

class User
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $mail;
    protected $password;
    protected $dbh;


    public function __construct($id, $firstname, $lastname, $mail, $password, $dbh)
    {
        $this->id = $id;
        $this->firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        $this->mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
        $this->dbh = $dbh;
    }

    public function insert()
    {
        $query = $this->dbh->prepare(" INSERT INTO User (firstname, lastname, mail, password)
        VALUES (?, ?, ?, ?)");
        return $query->execute([$this->firstname, $this->lastname, $this->mail, $this->password]);
    }
}
