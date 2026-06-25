<?php

if (empty($_POST['titre']) ||
    empty($_POST['artiste']) ||
    empty($_POST['description']) ||
    empty($_POST['image']) ||
    strlen($_POST['description']) < 3 ||
    !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
    
    header('Location: ajouter.php?erreur=true');
    exit;

} else {

    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);

    // Connexion à la base de données
    include 'bdd.php';
    $bdd = connexion();

    // Insertion de l'oeuvre en base de données
    $requete = $bdd->prepare('INSERT INTO oeuvres (titre, artiste, description, image) VALUES (?, ?, ?, ?)');
    $requete->execute([$titre, $artiste, $description, $image]);

    // Redirection vers la page de détail de l'oeuvre créée
    header('Location: oeuvre.php?id=' . $bdd->lastInsertId());
    exit;
}