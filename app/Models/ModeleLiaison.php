<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleLiaison extends Model
{
    protected $table = 'liaison';
    protected $primaryKey = 'noliaison';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NOLIAISON', 'NOPORT_DEPART', 'NOSECTEUR', 'NOPORT_ARRIVEE', 'DISTANCE'];

    public function getsecteurliaison(){
        return $this -> select('secteur.NOM, liaison.NOLIAISON, liaison.NOPORT_DEPART, liaison.DISTANCE, liaison.NOPORT_ARRIVEE')
        -> join ('secteur', 'secteur.NOSECTEUR = liaison.NOSECTEUR')
        -> join ('port as PORT_DEPART', 'PORT_DEPART.NOPORT = liaison.NOPORT_DEPART')
        -> join ('port as PORT_ARRIVEE', 'PORT_ARRIVEE.NOPORT = liaison.NOPORT_ARRIVEE')
        -> findAll();
    }

    public function getportsecteur(){
        return $this -> select('port.NOM')
        -> join ('port', 'port.NOPORT_DEPART = liaison.NOPORT_DEPART')
        -> join ('port', 'port.NOPORT_ARRIVEE = liaison.NOPORT_ARRIVEE')
        ->findAll();
    }
}
