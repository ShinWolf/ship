<?php
    session_start();
    /* initialisation des fichiers TWIG */ 
    /* Penser au référencement (LosLeonidasTV) + tchat en ligne  */
    require_once '../lib/vendor/autoload.php';
    require_once '../src/controleur/_controleurs.php';
    require_once '../config/routes.php';
    require_once '../config/parametre.php';
    require_once '../config/connexion.php';
    require_once '../src/modele/_classes.php';
    $loader = new \Twig\Loader\FilesystemLoader('../src/vue/'); 
    $twig = $twig = new \Twig\Environment($loader, []);
    $db = connect($config);
    $contenu = getPage($db);
    //Exécution de la fonction souhaitée
    $contenu($twig,$db);
?>