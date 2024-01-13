<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Bs_model;

class Bnsort extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Bs_model();
        $db = \Config\Database::connect();
        $data['produit']  = $model->getProduit()->getResult();
        $data['produit1']  = $model->getProduit1()->getResult();
        $data['employe']  = $model->getEmploye()->getResult();
        echo view('bs',$data);
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Bs_model();
        $db=$model->getBonso($param)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {
        helper(['form']);
        $model = new Bs_model();
        $NUM_BS   = $this->request->getpost ('NUM_BS');
        $NUM_UT   = $this->request->getpost ('NUM_UT');
        $EMPR     = $this->request->getpost ('EMPR');
        $NUM_PROD = $this->request->getpost ('NUM_PROD');
        $QTS      = $this->request->getpost ('QT_S');
        $RAISON   = $this->request->getpost ('RAISON');
        $DATE     = $this->request->getpost ('DATE_S');
        $PV       = $this->request->getpost ('PV');
        $model->saveBonso($NUM_BS,$NUM_UT,$NUM_PROD,$QTS,$RAISON,$DATE,$EMPR,$PV);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Bs_model();
        $id       = $this->request->getPost('NUM_BS');
        $NUM_PROD = $this->request->getpost ('NUM_PROD');
        $QTS      = $this->request->getpost ('QT_S');
        $RAISON   = $this->request->getpost ('RAISON');
        $DATE     = $this->request->getpost ('DATE_S');
        $model->updateBs($id,$NUM_PROD,$QTS,$RAISON,$DATE);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Bs_model();
        $id       = $this->request->getPost('NUM_BS');
        $NUM_PROD = $this->request->getPost('NUM_PROD');
        $data=$model->deleteBs($id,$NUM_PROD);
       
    }

    public function dat()
    {
        $db = \Config\Database::connect();
        $model = new Bs_model();
        $db=$model->getDate()->getResult();     
        echo json_encode($db);     
    }

    public function produit($res="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Bs_model();
        $db=$model->getStock($res)->getResult();
        echo json_encode($db);
  
    }

}