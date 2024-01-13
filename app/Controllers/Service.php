<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Service_model;

class Service extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Service_model();
        $db = \Config\Database::connect();
        echo view('service');
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();

        helper(['form'], ['url']);
        $model = new Service_model();
        $db=$model->getService($param)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {

        helper(['form']);
        $model = new Service_model();
        $NUM_SERV   = $this->request->getPost('NUM_SERV');
        $DEPARTEMENT= $this->request->getpost ('DEPARTEMENT');
        $RESP       = $this->request->getpost ('RESP');
        $model->saveService($NUM_SERV,$DEPARTEMENT,$RESP);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Service_model();
        $id         = $this->request->getPost('NUM_SERV');
        $DEPARTEMENT= $this->request->getpost ('DEPARTEMENT');
        $RESP       = $this->request->getpost ('RESP');
        $model->updateService($id,$DEPARTEMENT,$RESP);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Service_model();
        $id = $this->request->getPost('NUM_SERV');
        $data=$model->deleteService($id);
       
    }

}