<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Employe_model;

class Employe extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Employe_model();
        $db = \Config\Database::connect();
        $data['service']  = $model->getService()->getResult();
        echo view('employe',$data);
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Employe_model();
        $db=$model->getEmploye($param)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {

        helper(['form']);
        $model = new Employe_model();
        $NUM_EMP    = $this->request->getpost ('NUM_EMP');
        $NUM_SERV   = $this->request->getpost ('NUM_SERV');
        $NOM        = $this->request->getpost ('NOM');
        $TEL        = $this->request->getpost ('TEL');
        
        $model->saveEmploye($NUM_EMP,$NUM_SERV,$NOM,$TEL);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Employe_model();
        $id      = $this->request->getPost('NUM_EMP');
        $NUM_SERV= $this->request->getpost ('NUM_SERV');
        $NUM_F   = $this->request->getpost ('NUM_F');
        $NOM     = $this->request->getpost ('NOM');
        $TEL     = $this->request->getpost ('TEL');
        $model->updateEmploye($id,$NUM_SERV,$NUM_F,$NOM,$TEL);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Employe_model();
        $id = $this->request->getPost('NUM_EMP');
        $data=$model->deleteEmploye($id);
       
    }

}