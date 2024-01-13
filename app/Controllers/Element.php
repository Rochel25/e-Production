<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Element_model;

class Element extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Element_model();
        $db = \Config\Database::connect();
        $data['produit']  = $model->getProduit()->getResult();
        $data['produit1']  = $model->getProduit1()->getResult();
        echo view('element',$data);
       
    }

    public function affiche()
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Element_model();
        $db=$model->getElement()->getResult();
        echo json_encode($db);
  
    }

    public function prix($res="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Element_model();
        $db=$model->getPrix($res)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {

        helper(['form']);
        $model = new Element_model();
        $NUM_PROD  = $this->request->getpost ('NUM_PROD');
        $PROD      = $this->request->getpost ('PROD_FINI');
        $QT_EL     = $this->request->getpost ('QT_EL');
        $COUT      = $this->request->getpost ('COUT');
        $model->saveElement($NUM_PROD,$PROD,$QT_EL,$COUT);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Element_model();
        $id        = $this->request->getPost('ID_EL');
        $NUM_PROD  = $this->request->getpost ('NUM_PROD');
        $PROD      = $this->request->getpost ('PROD_FINI');
        $QTE_EL    = $this->request->getpost ('QT_EL');
        $COUT      = $this->request->getpost ('COUT');
        $model->updateElement($id,$NUM_PROD,$PROD,$QTE_EL,$COUT);
        echo json_encode($model);
       
    }

    public function update1($id="")
    {
        helper(['form']);
        $model = new Element_model();
        $COUT      = $this->request->getpost ('COUT');
        $model->updateElement1($id,$COUT);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Element_model();
        $id = $this->request->getPost('ID_EL');
        $data=$model->deleteElement($id);
       
    }

}