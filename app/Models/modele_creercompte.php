<?php

namespace App\Models;

use CodeIgniter\Model;

 

class ModeleCreerCompte extends Model

{

    protected $table = 'client'; // nom de la table mappée
    protected $primaryKey = 'NOCLIENT'; // clé primaire
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NOM', 'PREMON', 'ADRESSE', 'CODEPOSTAL', 'VILLE', 'TELEPHONEFIXE', 'TELEPHONEMOBILE', 'MEL', 'MOTDEPASSE'];

} // Fin Classe

 