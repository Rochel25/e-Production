<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Fichestock_model;

class Fichestock extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Fichestock_model();
        $db = \Config\Database::connect();
        $data['produit']=$model->getProduit()->getResult();
        $data['date']=$model->getMoisAn()->getResult();
        echo view('fichestock',$data);
        
    }

    public function affiche($pr="",$da="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Fichestock_model();
        $db=$model->getFichestock($pr,$da)->getResult();
        echo json_encode($db);     
  
    }

}