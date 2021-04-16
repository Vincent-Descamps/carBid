<?php

namespace App\Models;

class Form
{
    protected $id;
    protected $marque;
    protected $modele;
    protected $annee;
    protected $kilometrage;
    protected $description;
    protected $photo;
    protected $start_price;
    protected $date_end;
    protected $nom_vendeur;
    protected $prenom_vendeur;
    protected $email_vendeur;
    protected $dbh;


    public function __construct($id, $marque, $modele, $annee, $kilometrage, $description, $photo, $start_price, $date_end, $nom_vendeur, $prenom_vendeur, $email_vendeur, $dbh)
    {
        $this->id = $id;
        $this->marque = filter_var($marque, FILTER_SANITIZE_STRING);
        $this->modele = filter_var($modele, FILTER_SANITIZE_STRING);
        $this->annee = filter_var($annee, FILTER_SANITIZE_STRING);
        $this->kilometrage = filter_var($kilometrage, FILTER_SANITIZE_STRING);
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
        $this->photo = $photo;
        $this->start_price = filter_var($start_price, FILTER_SANITIZE_NUMBER_FLOAT);
        $this->date_end = filter_var($date_end, FILTER_SANITIZE_STRING);
        $this->nom_vendeur = filter_var($nom_vendeur, FILTER_SANITIZE_STRING);
        $this->prenom_vendeur = filter_var($prenom_vendeur, FILTER_SANITIZE_STRING);
        $this->email_vendeur = filter_var($email_vendeur, FILTER_SANITIZE_EMAIL);
        $this->dbh = $dbh;
    }

    public function insert()
    {
        $query = $this->dbh->prepare(" INSERT INTO Car (marque, modele, annee, kilometrage, description, photo, start_price, date_end, nom_vendeur, prenom_vendeur, email_vendeur)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $query->execute([$this->marque, $this->modele, $this->annee, $this->kilometrage, $this->description, $this->photo, $this->start_price, $this->date_end, $this->nom_vendeur, $this->prenom_vendeur, $this->email_vendeur]);
    }
}
