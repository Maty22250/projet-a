<?php
echo '<h2>'.$TitreDeLaPage.'</h2>';

// OU, sans utiliser le helper assets :
// echo '<img src="'.base_url().'/assets/images/'.$unProduit->image.'"/>';

echo '<table>';
echo '<tr><td>Référence</td><td>'.$UneLiaison->NOLIAISON.'</td></tr>';
echo '<tr><td>Libellé</td><td>'.$UneLiaison->NOPORT_DEPART.'</td></tr>';
echo '<tr><td>Prix HT</td><td>'.$UneLiaison->NOSECTEUR.'</td></tr>';
echo '<tr><td>Quantité en stock</td><td>'.$UneLiaison->NOPORT_ARRIVEE.'</td></tr>';
echo '<tr><td>Quantité en stock</td><td>'.$UneLiaison->DISTANCE.'</td></tr>';
echo '</table>';
echo '<p>'.anchor('voirlesproduits','Retour à la liste de tous les Produits').'</p>';