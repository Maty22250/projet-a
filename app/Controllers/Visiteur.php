<?php

namespace App\Controllers;

use App\Models\ModeleLiaison; 

helper(['assets']); // donne accès aux fonctions du helper 'asset'

class Visiteur extends BaseController
{
    public function voirLesLiaison($referenceLiaison = null)
    {
        /* valeur par défaut de referenceLiaison = NULL */

        $modLiaison = new ModeleLiaison(); // instanciation du modèle

        if ($referenceLiaison === null) {
            /* pas de reference produit, = NULL -> Tous les produits */
            $data['LesLiaison'] = $modLiaison->findAll();

            // findAll : héritée de Model, retourne, ici sous forme d'objets,
            // le résultat de la requête SELECT * FROM produit
            // affectation des objets produits retournés à l'entrée 'lesProduits' du tableau $data

            $data['TitreDeLaPage'] = 'Tous les produits';

            return view('Templates/Header')
                . view('Atlantik/vue_liaisonsecteur', $data)
                . view('Templates/Footer');

        } else {
            // une référence produit en entrée : on n'affichera le détail du produit correspondant
            $data['UneLiaison'] = $modLiaison->find($referenceLiaison);

            // find : héritée de Model, retourne, ici sous forme d'un objet,
            // le résultat de la requête 'SELECT * FROM produit WHERE reference = '.$referenceLiaison
            // l'objet produit est affectée à l'entrée 'unProduit' du tableau $data

            if (empty($data['UneLiaison'])) { // pas de produit correspondant à la référence
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                // génération d'une exception
            }

            $data['TitreDeLaPage'] = $data['UneLiaison']->NOLIAISON; // ->NOLIAISON : $returnType = 'object' !

            return view('Templates/Header')
                . view('Atlantik/vue_detailliaison', $data)
                . view('Templates/Footer');
        }
    } // Fin voirLesLiaison


    public function seConnecter()

    {
        helper(['form']);
        $session = session();

        $data['TitreDeLaPage'] = 'Se connecter';
        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */

        if (!$this->request->is('post')) {

            return view('Templates/Header', $data) // Renvoi formulaire de connexion

            . view('Visiteur/vue_SeConnecter')

            . view('Templates/Footer');

        }
        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* VALIDATION DU FORMULAIRE */

        $reglesValidation = [ // Régles de validation

            'txtIdentifiant' => 'required',

            'txtMotDePasse' => 'required',

        ];
        if (!$this->validate($reglesValidation)) {
            /* formulaire non validé */
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter') // Renvoi formulaire de connexion
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* RECHERCHE UTILISATEUR DANS BDD */

        $Identifiant = $this->request->getPost('txtIdentifiant');

        $MdP = $this->request->getPost('txtMotDePasse');
        /* on va chercher dans la BDD l'utilisateur correspondant aux id et mot de passe saisis */
        $modUtilisateur = newModeleUtilisateur(); // instanciation modèle
        $condition = ['identifiant'=>$Identifiant,'motdepasse'=>$MdP];
        $utilisateurRetourne = $modUtilisateur->where($condition)->first();
        /* where : méthode, QueryBuilder, héritée de Model (), retourne,

        ici sous forme d'un objet, le résultat de la requête :

        SELECT * FROM utilisateur  WHERE identifiant='$pId' and motdepasse='$MotdePasse

        utilisateurRetourne = objet utilisateur ($returnType = 'object')

        */
        if ($utilisateurRetourne != null) {
            /* identifiant et mot de passe OK : identifiant et profil sont stockés en session */
            $session->set('identifiant', $utilisateurRetourne->identifiant);
            $session->set('profil', $utilisateurRetourne->profil);
            // profil = "SuperAdministrateur ou "Administrateur"
            $data['Identifiant'] = $Identifiant;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_ConnexionReussie');
        } else {
            /* identifiant et/ou mot de passe OK : on renvoie le formulaire  */
            $data['TitreDeLaPage'] = "Identifiant ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }

    } // Fin seConnecter

    public function seDeconnecter()

    {
        session()->destroy();
        returnredirect()->to('seconnecter');
    } // Fin seDeconnecter
}
