<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pointage_model;

class Retard extends Controller
{   
        public function index() {
            helper(['form']);
            $model = new Pointage_model();
            $db = \Config\Database::connect();
            $data['date']=$model->getMoisAn()->getResult();
            echo view('retard',$data);
        }

        public function ret($res="")
        {
        $db = \Config\Database::connect();
        $model = new Pointage_model();
        $db=$model->retardPointage($res)->getResult();
        echo json_encode($db);     
        }
     
    }