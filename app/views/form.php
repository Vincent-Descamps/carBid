<?php

namespace App\Views;

class Form
{

    protected $result;


    public function __construct($result)
    {
        if (isset($result)) {
            $this->result = $result;
        }
    }

    public function render()
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>formulaire</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <div class="link">
                    <a href="/projet">Home</a>
                </div>
                <h1>Formulaire de Vente</h1>
                <br>
                <h3>Merci de renseigner les champs suivants</h3>
                <br>
                <div id="form">
                    <form action="form" method="post">
                        <label for="marque">Marque : </label>
                        <br>
                        <input type="text" id="marque" name="marque" placeholder="Marque" />
                        <br>
                        <br>
                        <label for="modele">Modèle : </label>
                        <br>
                        <input type="text" id="modele" name="modele" placeholder="Modèle" />
                        <br>
                        <br>
                        <label for="annee">Année : </label>
                        <br>
                        <input type="text" id="annee" name="annee" placeholder="annee" />
                        <br>
                        <br>
                        <label for="kilometrage">Kilométrage : </label>
                        <br>
                        <input type="text" id="kilometrage" name="kilometrage" placeholder="kilométrage" />
                        <br>
                        <br>
                        <label for="description">Description : </label>
                        <br>
                        <textarea type="text" id="description" name="description" placeholder="description"></textarea>
                        <br>
                        <br>
                        <label for="photo">Photos </label>
                        <br>
                        <input type="text" id="photo" name="photo" />
                        <br>
                        <br>
                        <div class="enchere">
                            <label for="start_price">Prix de départ d'enchere : </label>
                            <br>
                            <input type="number" id="start_price" name="start_price" placeholder="Prix de départ" />
                            <br>
                            <br>
                            <label for="date_end">Date de fin d'enchère : </label>
                            <br>
                            <input type="date" id="date_end" name="date_end" placeholder="date de fin" />
                            <br>
                            <br>
                        </div>
                        <div class="vendeur">
                            <label for="nom_vendeur">Nom :</label>
                            <br>
                            <input type="text" id="nom_vendeur" name="nom_vendeur" />
                            <br>
                            <br>
                            <label for="prenom_vendeur">Prenom :</label>
                            <br>
                            <input type="text" id="prenom_vendeur" name="prenom_vendeur" />
                            <br>
                            <br>
                            <label for="email_vendeur">@mail :</label>
                            <br>
                            <input type="mail" id="email_vendeur" name="email_vendeur" />
                        </div>
                        <br>
                        <br>
                        <input type="submit" value="SUBMIT" />
                    </form>
                </div>

            </div>
        </body>

        </html>

<?php
    }
}
