<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Service_model extends Model
{
    public function getService($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM service order by NUM_SERV ASC");
        return $query;
      }

    public function saveService($NUM_SERV,$DEPARTEMENT,$RESP)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO service (NUM_SERV, DEPARTEMENT, RESP) VALUES ( '$NUM_SERV','$DEPARTEMENT','$RESP')"); 
    }

    public function updateService($id,$DEPARTEMENT,$RESP)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE service SET DEPARTEMENT='$DEPARTEMENT', RESP='$RESP' where NUM_SERV='$id' ");
    }

    public function deleteService($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from service where NUM_SERV='$id'");
    } 

  
}

