<?php

require_once 'config.php';
require_once 'controllers/UserController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'register'; // 'register' est la page par défaut

$userController = new UserController($db);

switch ($action) {

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $adresse = $_POST['adresse'];
            $code_postal = $_POST['code_postal'];
            $ville = $_POST['ville'];
            $num_telephone = $_POST['num_telephone'];
            $role = $_POST['role'];
            $userController->register($nom, $prenom, $email, $password, $adresse, $code_postal, $ville, $num_telephone, $role);
            header('Location: index.php?action=login');
        } else {
            include 'views/register.php';
        }
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $userController->login($email, $password);
            if ($user) {
                header('Location: views/formulaire.php');
            } else {
                include 'views/login.php';
            }
        } else {
            include 'views/login.php';
        }
        break;

    case 'updateMdp':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $userController->login($email, $password);
            if ($user) {
                header('Location: views/formulaire.php');
            } else {
                include 'views/login.php';
            }
        } else {
            include 'views/login.php';
        }
        break;

    default:
        include 'views/register.php';
        break;
}

?>