<?php 
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Pointage_model;
use CodeIgniter\Controller;

class Login extends Controller
{
    private $login = '' ;
    public function __construct(){
      
        $this->login = new UserModel();       
    }
    
    // show login form
    public function index()    {  
        $session = session();  
        $session->setFlashdata('msg', '');
        return view('login');
    }      
    //check user is exist or not
    
    
    public function auth(){

        $session = session();  
        $data = array('NOM_UT'=>$this->request->getVar('name'),
        'MDP'=>$this->request->getVar('password'));

        $user  =  $this->login->where($data); 
        $rows  = $this->login->countAllResults();
        $model = new UserModel();
        $name  = $this->request->getVar('name');
        $dat   = $model->where('NOM_UT', $name)->first();
                
        if($rows==1){
            $ses_data = [
                'NOM_UT'     => $dat['NOM_UT'],
                'ROLE'       => $dat['ROLE'],
                'NUM_UT'     => $dat['NUM_UT'],
                'ROLE'       => $dat['ROLE'],
            ];

            $session->set($ses_data);
            $model = new Pointage_model();
            $db = \Config\Database::connect();
            $db=$model->nbrePointage();
            foreach($db->getResult() as $row){
                if($row->nb==0){
                    $model->savePointage();
                }        
          }
          return redirect()->to('/home');
        }
    else{
            $session->setFlashdata('msg', 'Utilsateur inconnu ou mot de passe incorrect' );
            return view('/login');
        }

    }
    


     public function logout()
    {
        $session = session();
        
                $session->destroy();
                return redirect()->to('/login');
    }       
      
    
       
}
