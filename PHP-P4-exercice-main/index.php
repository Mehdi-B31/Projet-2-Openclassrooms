<?php
require('header.php');
require('bdd.php');

//$bdd = connexion();
$oeuvres = connexion()->query('SELECT * FROM oeuvres');
?>

<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre) { ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?php echo $oeuvre['id']; ?>">
                <img src="<?php echo $oeuvre['image']; ?>" alt="<?php echo $oeuvre['titre']; ?>">
                <h2><?php echo $oeuvre['titre']; ?></h2>
                <p class="description"><?php echo $oeuvre['artiste']; ?></p>
            </a>
        </article>
    <?php } ?>
</div>
<?php require('footer.php'); ?>