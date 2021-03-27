<?php

function accueilControleur($twig){
     echo $twig->render('accueil.html.twig', array());
}
function contactControleur($twig, $db){
     $form = array();
     if (isset($_POST['btInscrire'])){
          $inputEmail = $_POST['inputEmail'];
          $inputNom = $_POST['inputNom'];
          $inputText = $_POST['inputText'];
          $form['valide'] = true;
          $contact = new Contact($db);
          $exec = $contact->insert($inputEmail,$inputNom,$inputText);
          if(!$exec){
               $form['valide'] = false;
               $form['message'] = 'Problème d\'insertion dans la table Contact';
          }
          $form['email'] = $inputEmail;
          $form['nom'] = $inputNom;
          $form['text'] = $inputText;
     }

     echo $twig->render('contact.html.twig', array('form'=>$form));
                                                       //ne pas l'oublier pour afficher le résultat
}
function inscrireControleur($twig,$db){
         $form = array();
         if (isset($_POST['btInscrire'])){
               $inputEmail = $_POST['inputEmail'];
               $inputPassword = $_POST['inputPassword'];
               $inputPassword2 =$_POST['inputPassword2'];
               $inputNom = $_POST['inputNom'];
               $inputPrenom = $_POST['inputPrenom'];
               $role = $_POST['role'];
               $form['valide'] = true;
               if ($inputPassword!=$inputPassword2){
                    $form['valide'] = false;
                    $form['message'] = 'Les mots de passe sont différents';     
               }
               else{
                    $utilisateur = new Utilisateur($db);
                    $exec = $utilisateur->insert($inputEmail, password_hash($inputPassword,PASSWORD_DEFAULT),$role,$inputNom,$inputPrenom);
                    if(!$exec){
                         $form['valide'] = false;
                         $form['message'] = 'Problème d\'insertion dans la table utilisateur';
                    }
               }
               $form['email'] = $inputEmail;
               $form['nom'] = $inputNom;
               $form['prenom'] = $inputPrenom;
               $form['role'] = $role;    
          }
         echo $twig->render('inscrire.html.twig', array('form'=>$form));
     }
     function maintenanceControleur($twig){
          echo $twig->render('maintenance.html.twig',array());
     }

?>