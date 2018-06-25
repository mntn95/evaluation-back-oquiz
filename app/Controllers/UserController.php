<?php

// oQuiz => app/
// Controllers => Controllers/
// au final => app/Controllers/
namespace oQuiz\Controllers;
use oQuiz\Models\UserModel;
use oQuiz\Utils\User;



class UserController extends CoreController {

    public function ajaxSignup() {
        // Tableau contenant toutes les erreurs
        $errorList = [];
        
        // formulaire soumis
        if (!empty($_POST)) {
            //dump($_POST);exit;
            // Je récupère les données
            $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $passwordConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';
            
            // Je traite les données si besoin
            $firstName = trim($firstName);
            $lastName = trim($lastName);
            $email = trim($email);
            $password = trim($password);
            $passwordConfirm = trim($passwordConfirm);
            
            // Je valide les données => je cherche les erreurs
            if (empty($firstName)) {
                $errorList[] = 'Veuillez saisir un prénom';
            }
            if (empty($lastName)) {
                $errorList[] = 'Veuillez saisir un nom';
            }
            if (empty($email)) {
                $errorList[] = 'Email vide';
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Email incorrect';
            }
            if (empty($password)) {
                $errorList[] = 'Mot de passe vide';
            }
            if (empty($passwordConfirm)) {
                $errorList[] = 'Confirmation de mot de passe vide';
            }
            if ($password != $passwordConfirm) {
                $errorList[] = 'Les 2 mots de passe sont différents';
            }
            if (strlen($password) < 8) {
                $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
            }
            
            // Si tout est ok (aucune erreur)
            if (empty($errorList)) {
                // On vérifie la présence de l'adresse email en DB
                $userModel = UserModel::findByEmail($email);
                
                // Si l'email existe
                if ($userModel !== false) {
                    // Ajouter un message d'erreur
                    $errorList[] = 'Un compte avec cette adresse email existe déjà';
                }
                // Sinon
                else {
                    // Je hash/encode le mot de passe
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    
                     // On insere en DB
                     $newUserModel = new UserModel();
                     $newUserModel->setFirst_Name($firstName);
                     $newUserModel->setLast_Name($lastName);
                     $newUserModel->setEmail($email);
                     $newUserModel->setPassword($hashedPassword);
                     $newUserModel->save();
                     User::connect($newUserModel);
                     // Je redirige vers l'accueil
                     $this->redirectToRoute('main_home');
                }
            }
        }
        
        // Exécute la view
        $this->show('user/signup', [
            'errorList' => $errorList
        ]);
    }
    public function signup() {
        // Exécute la view
        $this->show('user/signup');
    }

    public function login() {
        // Exécute la view
        $this->show('user/login');
    }
    public function ajaxLoginPost() {
        // Tableau contenant toutes les erreurs
        $errorList = [];
        
        //dump($_POST);exit;
        // Je récupère les données
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        // Je traite les données si besoin
        $email = trim($email);
        $password = trim($password);
        
        // Je valide les données => je cherche les erreurs
        if (empty($email)) {
            $errorList[] = 'Email vide';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'Email incorrect';
        }
        if (empty($password)) {
            $errorList[] = 'Mot de passe vide';
        }
        if (strlen($password) < 8) {
            $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
        }
        
        // Si tout est ok (aucune erreur)
        if (empty($errorList)) {
            // On va cherche le user pour l'email fourni
            $userModel = UserModel::findByEmail($email);
            // dump($userModel);exit;
            
            // Si l'email existe
            if ($userModel !== false) {
                // Alors, on va tester le password
                if (password_verify($password, $userModel->getPassword())) {
                    // Je connecte l'utilisateur, peut importe comme cela est fait
                    User::connect($userModel);
                    
                    // Affichage d'un JSON "ok"
                    self::sendJson([
                        'code' => 1,
                        'redirect' => $this->router->generate('main_home'),
                        'errorList' => $errorList
                    ]);
                }
                else {
                    $errorList[] = 'Identifiants/mot de passe non reconnus';
                }
            }
            // Sinon
            else {
                $errorList[] = 'Email non reconnu';
            }
        }
        
        // Si on arrive ici, c'est que c'est pas "ok"
        // Donc, on affiche un JSON avec les erreurs
        // Affichage d'un JSON "ok"
        self::sendJson([
            'code' => 2,
            'errorList' => $errorList
        ]);
    }
    public function logout() {
        // Je déconnecte le user
        User::disconnect();
        
        // Je redirige vers la home
        $this->redirectToRoute('main_home');
    }
}