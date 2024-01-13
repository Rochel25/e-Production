<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Element_model extends Model
{
    public function getElement()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM element left JOIN produit ON produit.NUM_PROD=element.NUM_PROD ");
        return $query;
      }

    public function getProduit()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit where CATEGORIE='Matière première' ");
          return $query;
      }  
    
    public function getProduit1()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit where CATEGORIE='Produit fini' ");
          return $query;
      } 
      
      public function getPrix($pro)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT max(PU) as PU from produit a, bon_ent b where a.NUM_PROD=b.NUM_PROD and b.NUM_PROD='$pro' ");
          return $query;
      }      
      

    public function saveElement($NUM_PROD, $PROD, $QT_EL,$COUT)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO element (NUM_PROD, PROD_FINI, QT_EL, COUT) VALUES ('$NUM_PROD','$PROD','$QT_EL','$COUT')");
       
    }

    
      public function updateElement($id,$NUM_PROD, $PROD, $QTE_EL,$COUT)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE element SET NUM_PROD='$NUM_PROD', PROD_FINI='$PROD', QT_EL='$QTE_EL', COUT='$COUT' where ID_EL='$id' ");
       
    }

    public function updateElement1($id,$COUT)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE element SET COUT='$COUT' where ID_EL='$id' ");
       
    }

    public function deleteElement($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from element where ID_EL='$id'");
       
    } 

  
}

