<?php

namespace App\Controllers;

 

class Atlantik extends BaseController

{

    public function accueil()

    {

        return view('Atlantik/vue_accueil');

    }

    

    public function creecompte()
    
    {
        $data['TitreDeLaPage'] = 'Creer compte';
        helper('form');
        return view('Atlantik/vue_creecompte',$data);
    
    }
    
    public function liaisonsecteur()
    
    {
        return view('Atlantik/vue_liaisonsecteur');
    }


}

