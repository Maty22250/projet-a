<html>

<body>

<?php
    include 'Navbar.php';

if ($TitreDeLaPage == 'Saisie produit incorrecte')

  echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation

 

echo form_open('creecompte') // ajouterproduit = entrée route vers Administrateur:ajouterProduit (!!)

?>


<?php echo csrf_field(); ?>

<center>

<label for="txtNom">Nom :</label>
<input type="input" name="txtNom" value="<?php echo set_value('txtNom'); ?>" /><br />

<label for="txtPrenom">Prenom :</label>
<input type="input" name="txtPrenom" value="<?php echo set_value('txtPrenom'); ?>" /><br />


<label for="txtAdresse">Adresse :</label>
<input type="input" name="txtAdresse" value="<?php echo set_value('txtAdresse'); ?>" /><br />

<label for="txtCodePostal">Code Postal :</label>
<input type="input" name="txtCodePostal" value="<?php echo set_value('txtCodePostal'); ?>" /><br />


<label for="txtVille">Ville :</label>
<input type="input" name="txtVille" value="<?php echo set_value('txtVille'); ?>" /><br />

<label for="txtTelephoneFixe">Telephone Fixe :</label>
<input type="input" name="txtTelephoneFixe" value="<?php echo set_value('txtTelephoneFixe'); ?>" /><br />

<label for="txtTelephoneMobile">Telephone Mobile :</label>
<input type="input" name="txtTelephoneMobile" value="<?php echo set_value('txtTelephoneMobile'); ?>" /><br />

<label for="txtMel">Mel :</label>
<input type="input" name="txtMel" value="<?php echo set_value('txtMel'); ?>" /><br />

<label for="txtMotDePasse">Mot de passe :</label>
<input type="password" name="txtMotDePasse" value="<?php echo set_value('txtMotDePasse'); ?>" /><br />

<br />
<input type="submit" name="submit" value="Valider" value="Creer un compte" />

</center>

</form>
</body>

</html>