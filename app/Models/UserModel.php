<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'utilisateur';
    protected $allowedFields = ['NOM_UT','ROLE','EMAIL','MDP'];

    public function getUtilisateur($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM utilisateur order by NUM_UT ASC");
        return $query;
      }

    public function saveUser($NUM_UT,$NOM_UT,$ROLE,$MAIL,$MDP)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO utilisateur (NUM_UT, NOM_UT, ROLE, MDP, EMAIL) VALUES ( '$NUM_UT','$NOM_UT','$ROLE','$MDP', '$MAIL' )"); 
    }

    public function updateUser($id,$NOM_UT,$ROLE,$MAIL,$MDP)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE utilisateur SET NOM_UT='$NOM_UT', ROLE='$ROLE', EMAIL='$MAIL', MDP='$MDP' where NUM_UT='$id' ");
    }

    public function deleteUser($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from utilisateur where NUM_UT='$id'");
    } 
}