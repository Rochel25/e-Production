<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Be_model extends Model
{
   
    public function getBonent($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM bon_ent
        INNER JOIN produit  ON produit.NUM_PROD =bon_ent.NUM_PROD 
        left JOIN fournisseur  ON fournisseur.NUM_F=bon_ent.NUM_F LEFT JOIN utilisateur on utilisateur.NUM_UT=bon_ent.NUM_UT LEFT JOIN emprunteur on emprunteur.ID_E=bon_ent.ID_E WHERE month(DATEE)=month(NOW()) order by NUM_BE ASC");

        $query1=$db->query("SELECT distinct DATE_FORMAT(DATEE, '%b %Y') as dat from bon_ent order by dat asc");
        foreach($query1->getResult() as $row){
            if(($para)==($row->dat)){
          $query=$db->query("SELECT * FROM bon_ent
          INNER JOIN produit  ON produit.NUM_PROD =bon_ent.NUM_PROD 
          left JOIN fournisseur  ON fournisseur.NUM_F=bon_ent.NUM_F LEFT JOIN utilisateur on utilisateur.NUM_UT=bon_ent.NUM_UT LEFT JOIN emprunteur on emprunteur.ID_E=bon_ent.ID_E  where
          DATE_FORMAT(DATEE, '%b %Y') LIKE '%$para%' ORDER BY NUM_BE ASC ");
        } 
      }
      return $query;
    }

      

    public function saveBonent($NUM_BE,$NUM_UT,$NUM_PROD,$NUM_F,$QTE,$PU,$DATE,$NUMSERIE,$EMPR,$AFFECTATION,$OBS)
    {
        $db = \Config\Database::connect();
        if($EMPR!= NULL || $EMPR!=""){
            $query=$db->query("INSERT INTO bon_ent (NUM_BE, NUM_UT, NUM_PROD, NUM_F, QT_E, PU, DATEE, NUM_SERIE, ID_E, OBS) VALUES ( '$NUM_BE','$NUM_UT','$NUM_PROD','$NUM_F','$QTE','$PU','$DATE','$NUMSERIE','$EMPR', '$OBS')");
            $query2=$db->query("UPDATE produit SET STOCK1=(STOCK1+(SELECT SUM(QT_E) from bon_ent where produit.NUM_PROD=bon_ent.NUM_PROD and NUM_BE=LAST_INSERT_ID()))where NUM_PROD='$NUM_PROD'");   
        }
        else{
            $query=$db->query("INSERT INTO bon_ent (NUM_BE, NUM_UT, NUM_PROD, NUM_F, QT_E, PU, DATEE, NUM_SERIE, AFFECTATION ) VALUES ( '$NUM_BE','$NUM_UT','$NUM_PROD','$NUM_F','$QTE','$PU','$DATE','$NUMSERIE', '$AFFECTATION' )");
            $query1=$db->query("UPDATE produit SET STOCK=STOCK+(select QT_E from bon_ent where produit.NUM_PROD = bon_ent.NUM_PROD and NUM_BE=LAST_INSERT_ID())where NUM_PROD='$NUM_PROD'");
            $query3=$db->query("SELECT distinct CATEGORIE as cat from bon_ent, produit  where bon_ent.NUM_PROD=produit.NUM_PROD and bon_ent.NUM_PROD='$NUM_PROD'");
            foreach($query3->getResult() as $row){
                if($row->cat=="Outillage"){
                    $query=$db->query("UPDATE produit SET STOCK1=STOCK+(SELECT IFNULL(SUM(QT_E), '0') from bon_ent where NUM_F=0 and produit.NUM_PROD=bon_ent.NUM_PROD)-(SELECT IFNULL(SUM(QT_S), '0') from bon_so where bon_so.NUM_PROD=produit.NUM_PROD) where NUM_PROD='$NUM_PROD'");
                }
            }
        }
       
    
      }

    public function getCout($aff)
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT SUM(COUT) as cout, PROD_FINI from produit b, element c where b.NUM_PROD=c.NUM_PROD  and PROD_FINI='$aff' ");
          return $query;
    }

    public function getFournisseur()
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from fournisseur order by NOM ASC");
          return $query;
    }

    public function getFournisseur1()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from fournisseur a, magasinier b where a.NUM_F=b.NUM_F ");
          return $query;
      }

    public function getFournisseur2()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from fournisseur a, employe b where a.NUM_F=b.NUM_F ");
          return $query;
      }

      public function getEmprunteur($prod)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT  a.ID_E AS ide, NOM_E, IFNULL(SUM(QT_E), '0') as QTE, QT_S from emprunteur a left join bon_ent b on a.ID_E=b.ID_E left join bon_so c on c.ID_E=a.ID_E where c.NUM_PROD='$prod' group by a.ID_E ");
          return $query;
      }

      public function getProduit()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT distinct CATEGORIE from produit  ");
          return $query;
      }  

      public function getProduit1()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit  ");
          return $query;
      }  

      public function getProduit2()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT DISTINCT DESIGNATION from produit where CATEGORIE='Produit fini' order by DESIGNATION ASC  ");
          return $query;
      }  
    
      public function getDesign($des)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit where CATEGORIE='$des' order by DESIGNATION asc");
          return $query;
      }  

      public function getQte($empr)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT QT_S, IFNULL(SUM(QT_E), '0') as QTE from bon_so a left join bon_ent b on a.ID_E=b.ID_E left join emprunteur c on a.ID_E=c.ID_E and b.ID_E=c.ID_E where a.ID_E='$empr' ");
          return $query;
      }  

      public function getDesignation($num)
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT DESIGNATION, count(bon_ent.NUM_SERIE) as serie from produit LEFT JOIN bon_ent on produit.NUM_PROD=bon_ent.NUM_PROD where produit.NUM_PROD='$num' ");
          return $query;
      }  

      public function getDate()
      {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT distinct DATE_FORMAT(DATEE, '%b %Y') as dat from bon_ent ");
          return $query;
      }  
    
    
      public function updateBe($id,$NUM_PROD,$NUM_F,$QTE,$PU,$DATE)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE bon_ent SET NUM_PROD='$NUM_PROD', NUM_F='$NUM_F', QT_E='$QTE',PU='$PU', DATEE='$DATE' where NUM_BE='$id' ");
        $query1=$db->query("SELECT count(QT_S) as nb from bon_so, produit  where bon_so.NUM_PROD=produit.NUM_PROD and produit.CATEGORIE!='Outillage' and bon_so.NUM_PROD='$NUM_PROD'");
        foreach($query1->getResult() as $row){
            if($row->nb==0){
            $query=$db->query("UPDATE produit SET STOCK=(SELECT SUM(QT_E) from bon_ent where produit.NUM_PROD=bon_ent.NUM_PROD)where NUM_PROD='$NUM_PROD'");
            }else{
            $query=$db->query("UPDATE produit SET STOCK=(SELECT SUM(QT_E) from bon_ent where produit.NUM_PROD=bon_ent.NUM_PROD)-(SELECT SUM(QT_S) from bon_so where bon_so.NUM_PROD=produit.NUM_PROD)where NUM_PROD='$NUM_PROD'");
            }
        }    
      }
      
         
    

    public function deleteBe($id,$NUM_PROD)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE produit SET STOCK=STOCK-(SELECT QT_E from bon_ent where produit.NUM_PROD=bon_ent.NUM_PROD and NUM_BE='$id')where NUM_PROD='$NUM_PROD'");
        $query3=$db->query("SELECT distinct CATEGORIE as cat from bon_ent, produit  where bon_ent.NUM_PROD=produit.NUM_PROD and bon_ent.NUM_PROD='$NUM_PROD'");
            foreach($query3->getResult() as $row){
                if($row->cat=="Outillage"){
                    $query=$db->query("UPDATE produit SET STOCK1=STOCK1-(SELECT QT_E from bon_ent where produit.NUM_PROD=bon_ent.NUM_PROD and NUM_BE='$id')where NUM_PROD='$NUM_PROD'");
                }
            }
        $query1=$db->query("DELETE from bon_ent where NUM_BE='$id'");
        
    } 

  
}

