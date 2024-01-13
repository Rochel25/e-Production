<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Etatfi_model;

class Etatfinancier extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new Etatfi_model();
        $db = \Config\Database::connect();
        $data['produit']=$model->getProduit()->getResult();
        $data['date']=$model->getMoisAn()->getResult();
        echo view('etatfinancier',$data);
        
    }

    public function affiche1($pr="",$da="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Etatfi_model();
        $db=$model->getMontant1($pr,$da)->getResult();
        echo json_encode($db);     
  
    }

    public function affiche2($pr="",$da="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new Etatfi_model();
        $db=$model->getMontant2($pr,$da)->getResult();
        echo json_encode($db);     
  
    }

    function htmlToPDF1(){
        
        $model = new Etatfi_model();
        $dompdf= new \Dompdf\Dompdf();
        $pr    = $this->request->getpost ('PROD');
        $DATE  = $this->request->getpost ('DAT');
        $data=$db=$model->getMontant1($pr,$DATE)->getResult();
        $dompdf->loadHtml(view('pdffinancier',  ["financier" => $data]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdffinancier'));
    }

    function htmlToPDF2(){
        
        $model = new Etatfi_model();
        $dompdf= new \Dompdf\Dompdf();
        $pr    = $this->request->getpost ('PROD');
        $DATE  = $this->request->getpost ('DAT');
        $data=$db=$model->getMontant2($pr,$DATE)->getResult();
        $dompdf->loadHtml(view('pdffinancier',  ["financier" => $data]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdffinancier'));
    }

}