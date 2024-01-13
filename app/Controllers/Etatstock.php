<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Produit_model;

class Etatstock extends Controller
{   
        public function index() {
            $model = new Produit_model();
            $db = \Config\Database::connect();
            $data['produit']=$model->getPro()->getResult();
            echo view('etatstock',$data);
           
        }

        public function stock($res="")
        {
        $db = \Config\Database::connect();
        $model = new Produit_model();
        $db=$model-> getStock($res)->getResult();
        echo json_encode($db);
  
        }
     
    }