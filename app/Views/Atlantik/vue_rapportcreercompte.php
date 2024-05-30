<br><br><br>

<?php

include 'Navbar.php';


if ($produitAjoute) { // true (1) si ajout, false (0) sinon

    echo 'Ajout produit effectué.';

} else {

    echo 'Echec ajout produit.';

}

?>

<br><br><br>

<p><a href="<?php echo site_url('Atlantik') ?>">Retour l accueil</a></p>