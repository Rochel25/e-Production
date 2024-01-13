<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Employe_model extends Model
{
    public function getEmploye($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM employe INNER JOIN service ON service.NUM_SERV=employe.NUM_SERV order by NUM_EMP ASC");
        return $query;
      }

    public function getService()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from service ");
          return $query;
      }  
      

    public function saveEmploye($NUM_EMP,$NUM_SERV,$NOM,$TEL)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO employe (NUM_EMP, NUM_SERV, NOM, TEL) VALUES ( '$NUM_EMP','$NUM_SERV','$NOM','$TEL')");
        $query1=$db->query("INSERT INTO pointage (NUM_EMP, NUM_SERV, DATEPOINTAGE ) VALUES ((select NUM_EMP from employe where NUM_EMP=LAST_INSERT_ID()),'$NUM_SERV', NOW())"); 
    }

    
      public function updateEmploye($id,$NUM_SERV,$NUM_F,$NOM,$TEL)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE employe SET NUM_SERV='$NUM_SERV', NOM='$NOM', TEL='$TEL' where NUM_EMP='$id' ");
        $query=$db->query("UPDATE pointage SET NUM_SERV='$NUM_SERV' where NUM_EMP='$id' ");
        if($NUM_F!="0"){
        $query=$db->query("UPDATE fournisseur SET NOM='$NOM', TEL='$TEL' where NUM_F='$id' ");
        }
    }

    public function deleteEmploye($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from employe where NUM_EMP='$id'");
        $query=$db->query("DELETE from pointage where NUM_EMP='$id'");
    } 

  
}

