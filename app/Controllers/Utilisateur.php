<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Utilisateur extends Controller
{

    public function index()
    {
        helper(['form']);
        $model = new UserModel();
        $db = \Config\Database::connect();
        echo view('utilisateur');
        
    }

    public function affiche($param="")
    {
        $db = \Config\Database::connect();
        helper(['form'], ['url']);
        $model = new UserModel();
        $db=$model->getUtilisateur($param)->getResult();
        echo json_encode($db);
  
    }

    public function save()
    {
        helper(['form']);
        $model = new UserModel();
        $NUM_UT = $this->request->getpost ('NUM_UT');
        $NOM_UT = $this->request->getpost ('NOM');
        $ROLE   = $this->request->getpost ('ROLE');
        $MAIL   = $this->request->getpost ('MAIL');
        $MDP    = $this->request->getpost ('MDP');
        $model->saveUser($NUM_UT,$NOM_UT,$ROLE,$MAIL,$MDP);
    }

    public function update()
    {
        helper(['form']);
        $model = new UserModel();
        $id     = $this->request->getpost ('NUM_UT');
        $NOM_UT = $this->request->getpost ('NOM');
        $ROLE   = $this->request->getpost ('ROLE');
        $MAIL   = $this->request->getpost ('MAIL');
        $MDP    = $this->request->getpost ('MDP');
        $model->updateUser($id,$NOM_UT,$ROLE,$MAIL,$MDP);
        echo json_encode($model);
       
    }

    public function delete()
    {
        helper(['form']);
        $model = new UserModel();
        $id = $this->request->getPost('NUM_UT');
        $data=$model->deleteUser($id);
       
    }

}