<?php
require('header.php');

$titre = htmlspecialchars($_POST['titre']);
$artiste = htmlspecialchars($_POST['artiste']);
$description = htmlspecialchars($_POST['description']);
$image = htmlspecialchars($_POST['image']);

if(empty($titre) || empty($artiste) || strlen($description) < 3 || !preg_match('#^https://#', $image)) {
    header('Location: ajouter.php');
    exit;
} else {
    // insérer en base de données (prochaine étape)
}