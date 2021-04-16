<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

include_once __DIR__ . "/../core/Database.class.php";

use App\Database\Database;

class Home

{

    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Enchères</title>
            <link rel="stylesheet" type="text/css" href="/projet/assets/styles/style.css" />
        </head>

        <body>
            <div id="status">
                <?php if ($_SESSION) {
                    echo 'Bienvenue' . ' ' . $_SESSION['firstname'] . ' vous êtes connecté. 😃' . ' ' . '<h5><a href="/Projet/deconnexion">Deconnexion</a></h5>';
                }
                ?>
            </div>

            <div id="mainContainer">
                <h1>Le meilleur des enchères.</h1>
                <h1>Bienvenue</h1>
                <div class="link">
                    <a href="/Projet/form">Vendeur </a><br>
                    <a href="/Projet/user">Inscription</a><br>
                    <a href="/Projet/connexion">Connexion</a>
                </div>
            </div>
            <div class="Annonces">
                <?php
                $dbh = Database::createDBConnection();
                $result = $dbh->query("SELECT * FROM Car")->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($result as $key => $value) {
                    $key++;
                ?>
                    <ul>
                        <div id="annonce">
                            <h3>Enchère #<?= $key ?></h3>
                            <h2><b><?= $value['marque'] . ' ' . $value['modele'] . ' ' . $value['annee'] ?></b></h2>
                            <img class="photo" src="<?= $value['photo'] ?>" />
                            <br>
                            <p><b>Au compteur : </b><?= $value['kilometrage'] ?>km</p>
                            <p><?= $value['description'] ?></p>
                            <p>Prix de départ :<?= $value['start_price'] ?></p>
                            <a href="encherir/<?= $value['id'] ?>"><input type="button" value="Details" /></a>
                        </div>
                    </ul>
                <?php
                }
                ?>
            </div>

        </body>

        </html>
<?php
    }
}
