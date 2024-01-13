<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pointage_model;

class Absence extends Controller
{   
        public function index() {
            helper(['form']);
            $model = new Pointage_model();
            $db = \Config\Database::connect();
            $data['date']=$model->getMoisAn()->getResult();
            echo view('absence',$data);
        }

        public function abs($res="")
        {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Pointage_model();
        $db=$model->absencePointage($res)->getResult();
        echo json_encode($db);     
        }
     
    }