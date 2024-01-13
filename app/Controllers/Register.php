<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Register extends Controller
{
    public function index()
    {
        $data = [];
        echo view('register', $data);
    }
 
    public function reg()
    {
        $data = [];
        echo view('register1', $data);
    }

    public function save()
    {
            $model = new UserModel();
            $data = [
                'NOM_UT'  => $this->request->getVar('name'),
                'ROLE'    => $this->request->getVar('role'),
                'EMAIL'   => $this->request->getVar('email'),
                'MDP'     => $this->request->getVar('password'),
            ];
            $model->save($data);
            return redirect()->to('/compte');
    }
 
    public function save1()
    {
            $model = new UserModel();
            $data = [
                'NOM_UT' => $this->request->getVar('name'),
                'ROLE'   => $this->request->getVar('role'),
                'EMAIL'  => $this->request->getVar('email'),
                'MDP'    => $this->request->getVar('password'),
            ];
            $model->save($data);
            return redirect()->to('/login');
        
         
    }
 
}