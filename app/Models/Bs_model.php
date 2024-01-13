<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Bs_model extends Model
{
   
    public function getBonso($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM bon_so
        INNER JOIN produit  ON produit.NUM_PROD =bon_so.NUM_PROD INNER JOIN utilisateur on utilisateur.NUM_UT=bon_so.NUM_UT LEFT JOIN emprunteur on emprunteur.ID_E=bon_so.ID_E
        WHERE month(DATE_S)=month(NOW()) order by NUM_BS ASC");

        $query1=$db->query("SELECT distinct DATE_FORMAT(DATE_S, '%b %Y') as dat from bon_so order by dat asc");
        foreach($query1->getResult() as $row){
            if(($para)==($row->dat)){
          $query=$db->query("SELECT * FROM bon_so
          INNER JOIN produit  ON produit.NUM_PROD =bon_so.NUM_PROD INNER JOIN utilisateur on utilisateur.NUM_UT=bon_so.NUM_UT LEFT JOIN emprunteur on emprunteur.ID_E=bon_so.ID_E WHERE
          DATE_FORMAT(DATE_S, '%b %Y') LIKE '%$para%'
          order by NUM_BS ASC");
        } 
      }
        return $query;
      }

      public function getDesign($des)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit where CATEGORIE='$des' order by DESIGNATION asc");
          return $query;
      }  

      public function getProduit()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT distinct CATEGORIE from produit  ");
          return $query;
      }  

      public function getEmploye()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from employe");
          return $query;
      }  

      public function getProduit1()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit  ");
          return $query;
      }  

      public function getDate()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT distinct DATE_FORMAT(DATE_S, '%b %Y') as dat from bon_so ");
          return $query;
      }  
    
      
      public function getStock($prod)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit where NUM_PROD='$prod' ");
          return $query;
      }  

    public function saveBonso($NUM_BS,$NUM_UT,$NUM_PROD,$QTS,$RAISON,$DATE,$EMPR,$PV)
    {
        $db = \Config\Database::connect();
        if($EMPR!= NULL || $EMPR!=""){
            $query=$db->query("INSERT INTO emprunteur(NOM_E) VALUES ('$EMPR')");
            $query1=$db->query("INSERT INTO bon_so (NUM_BS, NUM_UT, NUM_PROD,QT_S,RAISON,DATE_S,ID_E) VALUES ( '$NUM_BS','$NUM_UT','$NUM_PROD','$QTS','$RAISON','$DATE',(select ID_E from emprunteur where ID_E=LAST_INSERT_ID()) )");
            $query2=$db->query("UPDATE produit SET STOCK1=(STOCK1-(SELECT SUM(QT_S) from bon_so where produit.NUM_PROD=bon_so.NUM_PROD AND NUM_BS=LAST_INSERT_ID()))where NUM_PROD='$NUM_PROD'");  
            
        }
    
        else{
            $query=$db->query("INSERT INTO bon_so (NUM_BS, NUM_UT, NUM_PROD,QT_S,RAISON,DATE_S,PV) VALUES ( '$NUM_BS','$NUM_UT','$NUM_PROD','$QTS','$RAISON','$DATE', '$PV') ");
            $query1=$db->query("UPDATE produit SET STOCK=STOCK-(SELECT QT_S from bon_so where produit.NUM_PROD=bon_so.NUM_PROD AND NUM_BS=LAST_INSERT_ID())where NUM_PROD='$NUM_PROD'");   
            
        }
    }
    
    
      public function updateBs($id,$NUM_PROD,$QTS,$RAISON,$DATE)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE bon_so SET NUM_PROD='$NUM_PROD', QT_S='$QTS', RAISON='$RAISON',DATE_S='$DATE' where NUM_BS='$id' ");
        $query1=$db->query("UPDATE produit SET STOCK=(SELECT SUM(QT_E) from bon_ent where produit.NUM_PROD=bon_ent.NUM_PROD)-(SELECT SUM(QT_S) from bon_so where bon_so.NUM_PROD=produit.NUM_PROD)where NUM_PROD='$NUM_PROD'");
    }

    public function deleteBs($id,$NUM_PROD)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE produit SET STOCK=STOCK+(SELECT QT_S from bon_so where produit.NUM_PROD=bon_so.NUM_PROD and NUM_BS='$id')where NUM_PROD='$NUM_PROD'");
        $query1=$db->query("DELETE from bon_so where NUM_BS='$id'");
    } 
 
}

