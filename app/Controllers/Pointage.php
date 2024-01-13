<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pointage_model;


class Pointage extends Controller
{
    
    public function index()
    
    {
        helper(['form']);
        $model = new Pointage_model();
        $db = \Config\Database::connect();
        echo view('pointage');
        
    }
    
    public function affiche($para="")
    {
        $db = \Config\Database::connect();
        $model = new Pointage_model();
        $data=$model->getPointage($para)->getResult();
        echo json_encode($data);
    }
    
    public function update()
    {
        helper(['form']);
        $model = new Pointage_model();
        $id = $this->request->getPost('IDPOINTAGE');
        $model->updatePointage($id);
        echo json_encode($model);
        
    }
    public function update1()
    {
        helper(['form']);
        $model = new Pointage_model();
        $id = $this->request->getPost('IDPOINTAGE');
        $model->updatePointage1($id);
        echo json_encode($model);
        
    }
    
    public function update2()
    {
        helper(['form']);
        $model = new Pointage_model();
        $id = $this->request->getPost('IDPOINTAGE');
        $model->updatePointage2($id);
        echo json_encode($model);
        
    }
    
    public function update3()
    {
        helper(['form']);
        $model = new Pointage_model();
        $id = $this->request->getPost('IDPOINTAGE');
        $model->updatePointage3($id);
        echo json_encode($model);
        
    }
    
    public function update4()
    {
        helper(['form']);
        $model = new Pointage_model();
        $id = $this->request->getPost('IDPOINTAGE');
        $OBS= $this->request->getpost ('OBSERVATION');
        $model->updatePointage4($id,$OBS);
        echo json_encode($model);
        
    }

    

    
}