<?php

namespace App\Views;


class Connexion
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
            <html>

            <body>
                <div class="link">
                    <a href="/projet">Home</a>
                </div>
                <div id="mainContainer">
                    <h1>Page de connexion</h1>
                    <div id="form1">
                        <form action="connexion" method="POST">
                            <p>
                                <label>@Mail</label>
                                <br>
                                <input type="mail" id="mail" name="mail" required="required" /><br>
                            </p>
                            <p>
                                <label>Password</label>
                                <br>
                                <input type="text" id="password" name="password" required="required" />
                            </p>
                            <p>
                                <button type=”submit” name=”submit”><span>Se connecter</span></button>
                            </p>
                        </form>
                    </div>
                </div>
            </body>

            </html>
        </body>

        </html>
<?php
    }
}
