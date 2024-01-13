<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Produit_model extends Model
{
    public function getProduit($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * from produit order by NUM_PROD ASC ");
        if($para != "" || $para != NULL)
        {  
            $query=$db->query("SELECT * FROM produit where
            concat('PR',NUM_PROD) LIKE '%$para%'
            OR DESIGNATION  LIKE '%$para%'
            OR STOCK  LIKE '%$para%' 
            OR CATEGORIE  LIKE '%$para%' 
            order by NUM_PROD ASC
            ");
        } 
        return $query;
      }

    public function getPro(){
        $db = \Config\Database::connect();
        $query=$db->query("SELECT DISTINCT CATEGORIE from produit order by CATEGORIE ASC ");
       return $query;

    } 

    public function saveProduit($NUM_PROD,$DESIGNATION,$CAT,$STOCK,$SEUILMIN,$SEUILMAX,$TAVR,$QTA,$STOCK1)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO produit (NUM_PROD, DESIGNATION, CATEGORIE, STOCK, SEUILMIN, SEUILMAX, TAVR, QTA, STOCK1 ) VALUES ( '$NUM_PROD','$DESIGNATION','$CAT','$STOCK','$SEUILMIN','$SEUILMAX','$TAVR','$QTA','$STOCK1')");
        
    }

    public function updateProduit($id,$DESIGNATION,$CAT,$STOCK,$SEUILMIN,$SEUILMAX,$TAVR,$QTA,$STOCK1)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE produit  SET DESIGNATION='$DESIGNATION',CATEGORIE='$CAT', STOCK='$STOCK', STOCK1='$STOCK1', SEUILMIN='$SEUILMIN', SEUILMAX='$SEUILMAX', TAVR='$TAVR', QTA='$QTA' where NUM_PROD='$id' ");  
    }

    public function deleteProduit($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("DELETE from produit where NUM_PROD='$id'");
        $query1=$db->query("DELETE from bon_ent where NUM_PROD='$id'");
        $query2=$db->query("DELETE from bon_so where NUM_PROD='$id'");
        
    } 

    public function getBe()
    {
        $db= \Config\Database::connect();
        $query=$db->query("SELECT count(NUM_BE) as be from bon_ent a, produit b  where a.NUM_PROD=b.NUM_PROD and month(DATEE)=month(NOW()) and CATEGORIE='Produit fini'");
        return $query;
    }

    public function getBs()
    {
        $db= \Config\Database::connect();
        $query=$db->query("SELECT count(NUM_BS) as bs from bon_so a, produit b where a.NUM_PROD=b.NUM_PROD and month(DATE_S)=month(NOW()) and CATEGORIE='Produit fini' ");
        return $query;
    }

    public function getBe1()
    {
        $db= \Config\Database::connect();
        $query=$db->query("SELECT count(NUM_BE) as be from bon_ent a, produit b  where a.NUM_PROD=b.NUM_PROD and month(DATEE)=month(NOW()) and CATEGORIE='Matière première'");
        return $query;
    }

    public function getBs1()
    {
        $db= \Config\Database::connect();
        $query=$db->query("SELECT count(NUM_BS) as bs from bon_so a, produit b where a.NUM_PROD=b.NUM_PROD and month(DATE_S)=month(NOW()) and CATEGORIE='Matière première' ");
        return $query;
    }

    public function getFinance()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT concat(Sum(QT_E*PU),'Ar') as montant, DESIGNATION as design from produit a, bon_ent b where a.NUM_PROD=b.NUM_PROD and month(DATEE)=MONTH(NOW()) and a.CATEGORIE='Produit fini' group by design ");
          return $query;
      }
      public function getFinance1()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT Sum(QT_E*PU) as montant, CATEGORIE from produit a, bon_ent b where a.NUM_PROD=b.NUM_PROD and month(DATEE)=MONTH(NOW()) and a.CATEGORIE='Produit fini' group by CATEGORIE ");
          return $query;
      }  

      public function getFinance2()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT sum(QT_S*PV) as montant, CATEGORIE from produit a, bon_so c where  a.NUM_PROD=c.NUM_PROD  and month(DATE_S)=MONTH(NOW()) and a.CATEGORIE='Produit fini' group by CATEGORIE ");
          return $query;
      }  
      
    public function getStock($cat)
      {
            $db = \Config\Database::connect();
            $query=$db->query("SELECT sum(STOCK) as stock, DESIGNATION as design, CATEGORIE from produit  where CATEGORIE='$cat' group by design ");
            return $query;
      } 
      

      public function getPF()
      {
        $db= \Config\Database::connect();
        $query1=$db->query("SELECT count(a.QT_E) as nb from bon_ent a inner join  produit b on a.NUM_PROD=b.NUM_PROD where month(DATEE)=month(NOW()) and b.CATEGORIE='Produit fini'");
        foreach($query1->getResult() as $row){
            if($row->nb!=0){
                $query=$db->query("SELECT SUM(a.QT_E) as pro from bon_ent a inner join  produit b on a.NUM_PROD=b.NUM_PROD where month(DATEE)=month(NOW()) and b.CATEGORIE='Produit fini'");
                return $query;
            } 
            else{
                $query=$db->query("SELECT '0' as pro from bon_ent a inner join  produit b on a.NUM_PROD=b.NUM_PROD where month(DATEE)=month(NOW()) and b.CATEGORIE='Produit fini'");
                return $query;
            
            }  
      }   
     
    }
}

