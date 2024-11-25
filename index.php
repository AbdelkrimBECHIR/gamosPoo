<?php

session_start();

// Utilisez des chemins relatifs
require ('routers.php');
require ('config/constant.php');
require ('config/db.php');
require ('config/models.php');
require ('config/controllers.php');
require ('config/repository.php');


// on creer un routeur de class Routeur
$router= new Router();
// on instancie le tableau recuperer grace a get Controller en donnant en parametre l'uri
$elements=$router->getController($_SERVER['REQUEST_URI']);

$controller=$elements['controller'];

/*on initialise une instance pour se deconnecter sinon on initialise une instance
 pour connecterla bdd si besoin avec le nom du controller+'controller'*/
if ($controller === 'LogoutController') {
    $logoutRepository = new LogoutRepository();
    $cont = new $controller($logoutRepository);
} else {
    $cont = new $controller($dbh);
}


$controller = str_replace('Controller', '', $controller);
$title=$controller;
include 'views/header.php';


// on appel l'action du controller en recuperant la valeur du tableau 
$action=$elements['action'];

//on utilise la methode du controller pour appliquer l'action
$cont->$action();



include 'views/footer.php';




