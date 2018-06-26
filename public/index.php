<?php

// Chargement de l'autoload de Composer (pour avoir toutes les dépendances + le PSR-4)
require (__DIR__.'/../vendor/autoload.php');

// J'active le système de sessions de PHP
session_start();

// Au lieu d'inclure chaque classe, je les importe ici
use oQuiz\Application; // TODO changer le namespace

// créer un fichier index.php (dans public si existant, ou à la racine) qui instancie et appelle la méthode "run" de votre classe Application
$app = new Application();
$app->run();

