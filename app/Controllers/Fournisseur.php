<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Fournisseur_model;

class Fournisseur extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Fournisseur_model();
        $db = \Config\Database::connect();
        $data['service']  = $model->getService()->getResult();
        echo view('fournisseur',$data);
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();

        helper(['form'], ['url']);
        $model = new Fournisseur_model();
        $db=$model->getFournisseur($param)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {

        helper(['form']);
        $model = new Fournisseur_model();
        $NUM_F      = $this->request->getpost ('NUM_F');
        $NOM        = $this->request->getpost ('NOM');
        $ADRESSE    = $this->request->getpost ('ADRESSE');
        $TEL        = $this->request->getpost ('TEL');
        $TRANS      = $this->request->getpost ('TRANS');
        $NUM_SERV   = $this->request->getpost ('NUM_SERV');

        $model->saveFournisseur($NUM_F,$NOM,$ADRESSE,$TEL,$TRANS,$NUM_SERV);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Fournisseur_model();
        $id      = $this->request->getPost('NUM_F');
        $NOM     = $this->request->getpost ('NOM');
        $ADRESSE = $this->request->getpost ('ADRESSE');
        $TEL     = $this->request->getpost ('TEL');
        $model->updateFournisseur($id,$NOM,$ADRESSE,$TEL);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Fournisseur_model();
        $id = $this->request->getPost('NUM_F');
        $data=$model->deleteFournisseur($id);
       
    }

}