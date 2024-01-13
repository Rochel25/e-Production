<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Fichestock_model;

class Pdffiche extends Controller
{   public $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index() 
	{   
       return view('pdffichestock');    
    }

    function htmlToPDF(){
        
        $model = new Fichestock_model();
        $dompdf= new \Dompdf\Dompdf();
        $PRO   = $this->request->getpost ('PROD');
        $DATE  = $this->request->getpost ('DAT');
        $data=$db=$model->getFichestock($PRO,$DATE)->getResult();
        $dompdf->loadHtml(view('pdffichestock',  ["fiche" => $data]));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('/pdffichestock'));
    }

}