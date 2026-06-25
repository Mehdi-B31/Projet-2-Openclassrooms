<?php
require('header.php');
require('bdd.php');

if(empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

//$bdd = connexion();
$requete = connexion()->prepare('SELECT * FROM oeuvres WHERE id = :id');
$requete->execute(['id' => $_GET['id']]);
$oeuvre = $requete->fetch(PDO::FETCH_ASSOC);

if($oeuvre === false) {
    header('Location: index.php');
    exit;
}
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?php echo $oeuvre['image']; ?>" alt="<?php echo $oeuvre['titre']; ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?php echo $oeuvre['titre']; ?></h1>
        <p class="description"><?php echo $oeuvre['artiste']; ?></p>
        <p class="description-complete">
            <?php echo $oeuvre['description']; ?>
        </p>
    </div>
</article>

<?php require('footer.php'); ?>