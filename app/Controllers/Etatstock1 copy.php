<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Fichestock_model;

class Etatstock extends Controller
{   
        public function index() {
            $model = new Fichestock_model();
            $db = \Config\Database::connect();
            $da=$db=$model->getStock()->getResult();
            $data['chart_data'] = json_encode($da);
            return view('etatstock',$data);
        }
     
    }