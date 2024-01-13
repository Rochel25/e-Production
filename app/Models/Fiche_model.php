<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Fiche_model extends Model
{
   
    public function getFiche($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM fichetech
        INNER JOIN employe  ON employe.NUM_EMP=fichetech.NUM_EMP 
        INNER JOIN service  ON service.NUM_SERV=employe.NUM_SERV 
        WHERE DATEF=CURRENT_DATE order by ID_FIC ASC");

        if($para != "" || $para != NULL)
        {  
            $query=$db->query("SELECT * FROM fichetech
            INNER JOIN employe  ON employe.NUM_EMP=fichetech.NUM_EMP 
            INNER JOIN service  ON service.NUM_SERV=employe.NUM_SERV WHERE
            NOM  LIKE '%$para%' and DATEF=CURRENT_DATE
            OR RESP LIKE '%$para%' and DATEF=CURRENT_DATE
            order by ID_FIC ASC");
        } 
        return $query;
      }

    public function saveFiche($NUM_EMP,$HEURE_SORT,$NB_PROD_FINI,$NUM_PROD,$OBS)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO fichetech (NUM_EMP, HEURE_ENT, HEURE_SORT, NB_PROD_FINI,NUM_PROD_FINI, DATEF, OBS ) VALUES ('$NUM_EMP',NOW(),'$HEURE_SORT','$NB_PROD_FINI', '$NUM_PROD', NOW(), '$OBS' )");
    }

    public function getEmploye($cat)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from employe a, service b where a.NUM_SERV=b.NUM_SERV and b.NUM_SERV='$cat' ");
          return $query;
      }

      public function getProduit($emp)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit a, bon_ent b, employe c, fournisseur d where a.NUM_PROD=b.NUM_PROD and b.NUM_F=d.NUM_F and c.NUM_F=d.NUM_F and c.NUM_EMP='$emp' and a.CATEGORIE='Produit fini' and b.DATEE=CURRENT_DATE ");
          return $query;
      }

      public function getService()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from service ");
          return $query;
      }
    
      public function updateFiche($id)
        {
            $db = \Config\Database::connect();
            $query=$db->query("UPDATE fichetech SET HEURE_SORT=(SELECT now()) WHERE ID_FIC='$id' ");
            return $query;
        }   
  
        
}

