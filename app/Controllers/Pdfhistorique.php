<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Pointage_model;

class Pdfhistorique extends Controller
{   public $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index() 
	{   
       return view('pdfhistorique');    
    }

    function htmlToPDF(){
        
        $model = new Pointage_model();
        $dompdf= new \Dompdf\Dompdf();
        $DATE  = $this->request->getpost ('DAT');
        $data=$db=$model->getHistorique($DATE)->getResult();
        $dompdf->loadHtml(view('pdfhistorique',  ["fiche" => $data]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdfhistorique'));
    }

}