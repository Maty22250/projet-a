<?php

namespace App\Controllers;

use App\Models\CreeCompte;

 

helper(['url', 'assets', 'form']);

 

class administrateur extends BaseController

{
    public function CreerCompte()
    {
        $data['TitreDeLaPage'] = 'Creer compte';
        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */
        if (!$this->request->is('post')) {
            /* le formulaire n'a pas été posté, on retourne le formulaire */
            return view('Templates/Header')
            . view('Atlantik/vue_creecompte', $data)
            . view('Templates/Footer');
        }

        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* VALIDATION DU FORMULAIRE */
        
        $reglesValidation = [
            'txtNom' => 'string',
            'txtPrenom' => 'string',
            'txtAdresse' => 'numeric|integer',
            'txtCodePostal' => 'numeric|exact_length[5]',
            'txtTelephoneFixe' => 'integer|exact_length[10]',
            'txtTelephoneMobile' => 'integer|exact_length[10]',
            'txtMel' => 'integer|string|alpha_numeric',
            'txtMotDePasse' => 'integer|string|alpha_numeric|min_length[8]',
        ];

        if (!$this->validate($reglesValidation)) {
            /* formulaire non validé, on renvoie le formulaire */
            $data['TitreDeLaPage'] = "Saisie produit incorrecte";
            return view('Templates/Header')
            . view('Atlantik/vue_creecompte', $data)
            . view('Templates/Footer');
        }

        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* INSERTION PRODUIT SAISI DANS BDD */

        $donneesAInserer = array(
            'Nom' => $this->request->getPost('txtNom'),
            'Prenom' => $this->request->getPost('txtPrenom'),
            'Adresse' => $this->request->getPost('txtAdresse'),
            'CodePostal' => $this->request->getPost('txtCodePostal'),
            'Ville' => $this->request->getPost('txtVille'),
            'TelephoneFixe' => $this->request->getPost('txtTelephoneFixe'),
            'TelephoneMobile' => $this->request->getPost('txtTelephoneMobile'),
            'Mel' => $this->request->getPost('txtMel'),
            'MotDePasse' => $this->request->getPost('txtMotDePasse'),

        ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'
        $ModeleCreerCompte = newModeleCompte(); //instanciation du modèle
        $donnees['produitAjoute'] = $ModeleCreerCompte->insert($donneesAInserer, false);
        // Provoque insert into sur la table mappée (produit, ici), retourne 1 (true) si ajout OK
        return view('Templates/Header')
            .view('Atlantik/vue_RapportCreeCompte', $donnees)
            .view('Templates/Footer');
    } // ajouterProduit
}