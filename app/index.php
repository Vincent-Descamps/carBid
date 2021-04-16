<?php

/**
 * index.php - Point d'entrée de l'application
 * C'est ici que l'on défini les routes 
 * et les fonctions des controleurs qui dervont être appelées
 */

/* Imports */
require_once __DIR__ . "/core/Router.class.php"; // Routeur
include_once __DIR__ . "/controllers/home.php";
include_once __DIR__ . "/controllers/default.php";
include_once __DIR__ . "/controllers/form.php";
include_once __DIR__ . "/controllers/user.php";
include_once __DIR__ . "/controllers/connexion.php";
include_once __DIR__ . "/controllers/deconnexion.php";
include_once __DIR__ . "/controllers/encherir.php";



use App\Router\Router;
use App\Controllers\Home;
use App\Controllers\DefaultPage;
use App\Controllers\Form;
use App\Controllers\User;
use App\Controllers\Connexion;
use App\Controllers\Deconnexion;
use App\Controllers\Encherir;






/**
 * Requête
 */
$method = $_SERVER['REQUEST_METHOD']; // Récupération du verbe
$uri = $_GET['uri']; // Récuépération de l'URI


/**
 * Router
 */

/* Création du routeur */
$router = new Router($uri, $method);
session_start();


/**
 * Routes
 */

/* GET / - Page d'accueil */
$router->get("/",  [new Home(), 'render']);

/* Route en GET / -vers formulaire pour entrer enchere.*/
$router->get("/form", [new Form(), 'render']);
$router->get("/user", [new User(), 'render']);
$router->get("/encherir", [new Encherir(), 'render']);
$router->get("/connexion", [new Connexion(), 'render']);
$router->get("/deconnexion", [new Deconnexion(), 'deco']);


/* route en POST pour recuperer données formulaire et le traiter*/
$router->post("/form", [new Form(), 'record']);
$router->post("/user", [new User(), 'record']);
$router->post("/encherir", [new Encherir(), 'record']);
$router->post("/connexion", [new Connexion(), 'check']);


/* route vers annonce et recuperation de l'annonce par l'id*/
$router->get("/encherir/:id", [new Encherir(), 'render']);
$router->post("/encherir/:id", [new Encherir(), 'record']);




/* Route par défaut */
$router->default([new DefaultPage(), 'render']);




/**
 * Recherche de routes correspondantes
 */

/* Démarrage du routeur */
$router->start();
