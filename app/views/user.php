<?php

namespace App\Views;

class User
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
                <h1>Formulaire d'inscription</h1>
                <br>
                <h3>Merci de renseigner les champs suivants</h3>
                <br>
                <div id="form">
                    <form action="" method="post">
                        <label for="firstname">Prenom : </label>
                        <br>
                        <input type="text" id="firstname" name="firstname" placeholder="Prenom" />
                        <br>
                        <br>
                        <label for="lastname"> Nom: </label>
                        <br>
                        <input type="text" id="lastname" name="lastname" placeholder="Nom" />
                        <br>
                        <br>
                        <label for="mail">Votre @mail : </label>
                        <br>
                        <input type="mail" id="mail" name="mail" placeholder="@mail" />
                        <br>
                        <br>
                        <label for="password">Votre Mot de passe : </label>
                        <br>
                        <input type="text" id="password" name="password" placeholder="Mot de passe" />
                        <br>
                        <br>
                        <input type="submit" value="submit">
                    </form>
                </div>
            </div>
        </body>

        </html>
<?php
    }
}
