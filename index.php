<?php

session_start();

// Utilisez des chemins relatifs

require 'routers.php';
require 'config/constant.php';
require 'config/db.php';
require 'config/models.php';
require 'config/controllers.php';
require 'config/repository.php';

// On crée un routeur de classe Routeur
$router = new Router();

// On instancie le tableau récupéré grâce à getController en donnant en paramètre l'URI
$elements = $router->getController($_SERVER['REQUEST_URI']);

// Récupérer le contrôleur et l'action
$controller = $elements['controller'];
$action = $elements['action'];

// Vérifier que le contrôleur existe
if (!class_exists($controller)) {
    die("Erreur : Le contrôleur $controller n'existe pas.");
}



// on creer un routeur de class Routeur
$router= new Router();
// on instancie le tableau recuperer grace a get Controller en donnant en parametre l'uri
$elements=$router->getController($_SERVER['REQUEST_URI']);

$controller=$elements['controller'];


// Instancier le contrôleur
if ($controller === 'LogoutController') {
    $logoutRepository = new LogoutRepository();
    $cont = new $controller($logoutRepository);
} else {
    $cont = new $controller($dbh);
}

// Vérifier que l'action existe dans le contrôleur
if (!method_exists($cont, $action)) {
    die("Erreur : La méthode $action n'existe pas dans le contrôleur $controller.");
}

$controller = str_replace('Controller', '', $controller);
$title=$controller;
include 'views/header.php';





// Exécuter l'action
$cont->$action();



// on appel l'action du controller en recuperant la valeur du tableau 
$action=$elements['action'];

//on utilise la methode du controller pour appliquer l'action
$cont->$action();



include 'views/footer.php';




