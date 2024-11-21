<?php
require ('routeurs.php');
require ('constant.php');
require ('db.php');


// on creer un routeur de class Routeur
$router= new Router();
// on instancie le tableau recuperer grace a get Controller en donnant en parametre l'uri
$elements=$router->getController($_SERVER['REQUEST_URI']);

$controller=$elements['controller'];

//on initialise une instance pour connecter la bdd si besoin avec le nom du controller+'controller'
$cont= new $Controller($dbh);

// on appel l'action du controller en recuperant la valeur du tableau 
$action=$elements['action'];
//on utilise la methode du controller pour appliquer l'action
$cont->$action();




