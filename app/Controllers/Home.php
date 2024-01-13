<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Produit_model;

class Home extends Controller
{
	public function index()
	{
		helper(['form']);
        $model = new Produit_model();
        $db = \Config\Database::connect();
		$da=$db=$model->getFinance()->getResult();
        $data['chart_data'] = json_encode($da);
		$data['depense'] =$model->getFinance1()->getResult();
		$data['revenu'] =$model->getFinance2()->getResult();
        $data['home'] =$model->getBe()->getResult();
		$data['home1'] =$model->getBs()->getResult();
		$data['home2'] =$model->getBe1()->getResult();
		$data['home3'] =$model->getBs1()->getResult();
		$data['pf'] =$model->getPF()->getResult();
		echo view('home',$data);
	}

}
