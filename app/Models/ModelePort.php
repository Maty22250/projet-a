<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModelePort extends Model
{
    protected $table = 'port';
    protected $primaryKey = 'noport';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['noport', 'nom'];

}
