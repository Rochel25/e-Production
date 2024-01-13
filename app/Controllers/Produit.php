<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Produit_model;

class Produit extends Controller
{

    public function index()
    {
        
        $model = new Produit_model();
        $db = \Config\Database::connect();
        echo view('produit');
       
  
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();
        $model = new Produit_model();
        $db=$model->getProduit($param)->getResult();
        echo json_encode($db);
  
    }

    public function categorie()
    {
        $db = \Config\Database::connect();
        $model = new Produit_model();
        $db=$model->getPro()->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {
        $model = new Produit_model();
        $NUM_PROD      = $this->request->getpost ('NUM_PROD');
        $DESIGNATION   = $this->request->getpost ('DESIGNATION');
        $CAT           = $this->request->getpost ('CATEGORIE');
        $STOCK         = $this->request->getpost ('STOCK');
        $STOCK1        = $this->request->getpost ('STOCK1');
        $SEUILMIN      = $this->request->getpost ('SEUILMIN');
        $SEUILMAX      = $this->request->getpost ('SEUILMAX');
        $TAVR          = $this->request->getpost ('TAVR');
        $QTA           = $this->request->getpost ('QTA');
        $model->saveProduit($NUM_PROD,$DESIGNATION,$CAT,$STOCK,$SEUILMIN,$SEUILMAX,$TAVR,$QTA,$STOCK1);
    }

    public function update()
    {
        $model = new Produit_model();
        $id = $this->request->getPost('NUM_PROD');
        $DESIGNATION = $this->request->getpost ('DESIGNATION');
        $CAT         = $this->request->getpost ('CATEGORIE');
        $STOCK       = $this->request->getpost ('STOCK');
        $STOCK1      = $this->request->getpost ('STOCK1');
        $SEUILMIN    = $this->request->getpost ('SEUILMIN');
        $SEUILMAX    = $this->request->getpost ('SEUILMAX');
        $TAVR        = $this->request->getpost ('TAVR');
        $QTA         = $this->request->getpost ('QTA');
        $model->updateProduit($id,$DESIGNATION,$CAT,$STOCK,$SEUILMIN,$SEUILMAX,$TAVR,$QTA,$STOCK1);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Produit_model();
        $id = $this->request->getPost('NUM_PROD');
        $data=$model->deleteProduit($id);
       
    }

}