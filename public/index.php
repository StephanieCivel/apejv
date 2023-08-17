<?php
// __DIR__ = Le dossier du fichier
require __DIR__.'/../App/Controllers/mainController.php';
require __DIR__.'/../App/Controllers/accueilController.php';
require __DIR__.'/../App/Controllers/apeController.php';
require __DIR__.'/../App/Controllers/apeInPictureController.php';
require __DIR__.'/../App/Controllers/contactController.php';
require __DIR__.'/../App/Controllers/documentController.php';
require __DIR__.'/../App/Controllers/orderController.php';
require __DIR__.'/../App/Controllers/teamController.php';


// Variable contenant les routes dispo
const AVAIABLE_ROUTES = [
    
    'home'=>'accueilController',
    'ape'=>'apeController',
    'apeInPicture'=>'apeInPictureController',
    'contact'=>'contactController',
    'main'=> 'mainController',
    'order'=>'orderController',
    'team'=>'teamController',
    'document'=>'documentController',
    '404' => 'errorController',
    
];

// initiatilisation des variables
$page = 'home';
$controller;

// s'il y a un param GET page, on le stock dans la var page sinon on redirige vers home
if(isset($_GET['page']) && !empty($_GET['page'])){
    $page = $_GET['page'];

}else{
    $page = 'home';    
}
// Si la page demandée fait partie de notre tableau de routes, on la stocke dans la variable controller
// sinon on redirige vers le controller ErrorController
if(array_key_exists($page,AVAIABLE_ROUTES)){
    $controller = AVAIABLE_ROUTES[$page];
}else{
    $controller = 'errorController';
}

$pageController = new $controller();
$pageController->setView($page);
$pageController->render();
