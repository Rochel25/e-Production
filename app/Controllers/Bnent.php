<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Be_model;

class Bnent extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Be_model();
        $db = \Config\Database::connect();
        $data['fournisseur']  = $model->getFournisseur()->getResult();
        $data['produit']  = $model->getProduit()->getResult();
        $data['produit1']  = $model->getProduit1()->getResult();
        $data['produit2']  = $model->getProduit2()->getResult();
        echo view('be', $data);
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Be_model();
        $db=$model->getBonent($param)->getResult();
        echo json_encode($db);
    }

    public function designation($res="")
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getDesign($res)->getResult();     
        echo json_encode($db);     
    }

    public function design($res="")
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getDesignation($res)->getResult();     
        echo json_encode($db);     
    }

    public function cout($res="")
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getCout($res)->getResult();     
        echo json_encode($db);     
    }

    public function Quant($res="")
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getQte($res)->getResult();     
        echo json_encode($db);     
    }

    public function Fournisseur1()
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getFournisseur1()->getResult();     
        echo json_encode($db);     
    }

    public function Fournisseur2()
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getFournisseur2()->getResult();     
        echo json_encode($db);     
    }

    public function Emprunteur($res="")
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getEmprunteur($res)->getResult();     
        echo json_encode($db);     
    }


    public function dat()
    {
        $db = \Config\Database::connect();
        $model = new Be_model();
        $db=$model->getDate()->getResult();     
        echo json_encode($db);     
    }

    public function save()
    {
        helper(['form']);
        $model = new Be_model();
        $NUM_BE      = $this->request->getpost ('NUM_BE');
        $NUM_UT      = $this->request->getpost ('NUM_UT');
        $NUM_PROD    = $this->request->getpost ('NUM_PROD');
        $NUM_F       = $this->request->getpost ('NUM_F');
        $EMPR        = $this->request->getpost ('NUM_E');
        $QTE         = $this->request->getpost ('QT_E');
        $PU          = $this->request->getpost ('PU');
        $DATE        = $this->request->getpost ('DATEE');
        $NUMSERIE    = $this->request->getpost ('NUM_SERIE');
        $AFFECTATION = $this->request->getpost ('AFFECTATION');
        $OBS         = $this->request->getpost ('OBS');
        $model->saveBonent($NUM_BE,$NUM_UT,$NUM_PROD,$NUM_F,$QTE,$PU,$DATE,$NUMSERIE,$EMPR,$AFFECTATION,$OBS);
   
    }

    public function update()
    {
        helper(['form']);
        $model = new Be_model();
        $id      = $this->request->getPost('NUM_BE');
        $NUM_PROD= $this->request->getpost ('NUM_PROD');
        $NUM_F   = $this->request->getpost ('NUM_F');
        $QTE     = $this->request->getpost ('QT_E');
        $PU      = $this->request->getpost ('PU');
        $DATE    = $this->request->getpost ('DATEE');
        $model->updateBe($id,$NUM_PROD,$NUM_F,$QTE,$PU,$DATE);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new Be_model();
        $id       = $this->request->getPost('NUM_BE');
        $NUM_PROD = $this->request->getPost('NUM_PROD');
        $data=$model->deleteBe($id,$NUM_PROD);
       
    }

}