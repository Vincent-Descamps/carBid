<?php

namespace App\Views;

include_once __DIR__ . "/../core/Database.class.php";

use App\Database\Database;

class Encherir
{
    protected $result;

    public function __construct($result)
    {
        if (isset($result)) {
            $this->result = $result;
        }
    }


    public function render($value)
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Enchère</title>
            <link rel="stylesheet" type="text/css" href="/assets/styles/styleBd.css" />
        </head>

        <body>
            <div id="status">
                <div class="welcome">
                    <?php if ($_SESSION) {
                        echo $_SESSION['firstname'] . '  😃' . ' ' . '<a href="/deconnexion">Deconnexion</a>';
                    }
                    ?>
                </div>
                <div class="link">
                    <a href="/">Home</a>
                </div>
            </div>
            <div id="mainContainer">
                <?php
                $dbh = Database::createDBConnection();
                $result = $dbh->query("SELECT * FROM Car WHERE id = $value[id]")->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($result as $value) {
                ?>

                    <div id="annonce">
                        <h2><b><?= $value['marque'] . ' ' . $value['modele'] . ' ' . $value['annee'] ?></b></h2>
                        <img class="photo" src="<?= $value['photo'] ?>" />
                        <br>
                        <p><b>Au compteur : </b><?= $value['kilometrage'] ?>km</p>
                        <p><?= $value['description'] ?></p>
                        <p>Prix de départ : <?= $value['start_price'] ?></p>
                    </div>
                <?php
                }
                if ($_SESSION) {
                ?>
                    <div id="form">
                        <form action="" method="post">
                            <label for="amount">Encherir : </label>
                            <br>
                            <input type="number" id="amount" name="amount" placeholder="Montant de l'enchère" />
                            <br>
                            <input type="hidden" value="<?= $value['id'] ?>" name="car_id">
                            <br>
                            <input type="submit" value="Encherir" />
                        </form>
                    </div>
                <?php } else { ?>
                    <p><i>Vous devez avoir un compte utilisateur pour Encherir</i></p>
                    <a href="/user">Inscription</a><br><a href="/connexion">Connexion</a>
                <?php } ?>

                <div id="bid">
                    <?php
                    $results = $dbh->query("SELECT firstname, lastname FROM User LEFT JOIN Enchere ON User.id = Enchere.user_id");
                    //var_dump($value['lastname']);
                    $result = $dbh->query("SELECT * FROM Enchere WHERE car_id = $value[id]")->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($result as $value) {

                    ?>

                        <div class="bid">
                            <p><?= ' ' . $value['amount'] ?></p>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </body>

        </html>

<?php

    }
}
