<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Pointage_model;

class Pdfabsence extends Controller
{   public $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index() 
	{   
       return view('pdfabsence');    
    }

    function htmlToPDF(){
        
        $model = new Pointage_model();
        $dompdf= new \Dompdf\Dompdf();
        $DATE  = $this->request->getpost ('DAT');
        $data=$db=$model-> absencePointage($DATE)->getResult();
        $dompdf->loadHtml(view('pdfabsence',  ["fiche" => $data]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdfabsence'));
    }

}