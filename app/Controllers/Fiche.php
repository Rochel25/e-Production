<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Fiche_model;

class Fiche extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Fiche_model();
        $db = \Config\Database::connect();
        $data['service']  = $model->getService()->getResult();
        echo view('fiche', $data);
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Fiche_model();
        $db=$model->getFiche($param)->getResult();
        echo json_encode($db);
  
    }

    public function employe($res="")
    {
        $db = \Config\Database::connect();
        $model = new Fiche_model();
        $db=$model->getEmploye($res)->getResult();     
        echo json_encode($db);     
    }

    public function produit($res="")
    {
        $db = \Config\Database::connect();
        $model = new Fiche_model();
        $db=$model->getProduit($res)->getResult();     
        echo json_encode($db);     
    }


    public function save()
    {

        helper(['form']);
        $model = new Fiche_model();
        $NUM_EMP     = $this->request->getpost ('NUM_EMP');
        $HEURE_SORT  = $this->request->getpost ('HEURE_SORT');
        $NB_PROD_FINI= $this->request->getpost ('NBP');
        $NUM_PROD    = $this->request->getpost ('NUM_PROD');
        $OBS         = $this->request->getpost ('OBS');

        $model->saveFiche($NUM_EMP,$HEURE_SORT,$NB_PROD_FINI,$NUM_PROD,$OBS);
       
    }

    public function update()
    {
        helper(['form']);
        $model = new Fiche_model();
        $id          = $this->request->getPost('ID_FIC');
        $HEURE_SORT  = $this->request->getpost ('HEURE_SORT');
       
        $model->updateFiche($id,$HEURE_SORT);
        echo json_encode($model);
       
    }

    function htmlToPDF(){
        
        $model = new Fiche_model();
        $dompdf= new \Dompdf\Dompdf();
        $data=$db=$model-> getFiche($para="")->getResult();
        $dompdf->loadHtml(view('pdffiche',  ["fiche" => $data]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdffiche'));
    }
   

}