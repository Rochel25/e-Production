<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Emprunt_model;

class Emprunt extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Emprunt_model();
        $db = \Config\Database::connect();
        $data['produit']=$model->getProduit()->getResult();
        $data['date']=$model->getMoisAn()->getResult();
        echo view('emprunt',$data);
        
    }

    public function affiche($pr="",$da="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Emprunt_model();
        $db=$model->getEmprunt($pr,$da)->getResult();
        echo json_encode($db);     
  
    }

    function htmlToPDF(){
        
        $model = new Emprunt_model();
        $dompdf= new \Dompdf\Dompdf();
        $PRO   = $this->request->getpost ('PROD');
        $DATE  = $this->request->getpost ('DAT');
        $data=$db=$model->getEmprunt($PRO,$DATE)->getResult();
        $dompdf->loadHtml(view('pdfemprunt',  ["emprunt" => $data]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdfemprunt'));
    }

}