<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Fournisseur_model extends Model
{
   
    public function getFournisseur($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM fournisseur order by NUM_F ASC"); 
        return $query;
      }

      

    public function saveFournisseur($NUM_F,$NOM,$ADRESSE,$TEL,$TRANS,$NUM_SERV)
    {
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO fournisseur (NUM_F, NOM, ADRESSE, TEL, TRANS ) VALUES ( '$NUM_F','$NOM','$ADRESSE', '$TEL', '$TRANS')");
        if($TRANS == 1){
            $query1=$db->query("INSERT INTO magasinier (NUM_F, NOM, ADRESSE, TEL) VALUES ( (select NUM_F from fournisseur where NUM_F=LAST_INSERT_ID()),'$NOM','$ADRESSE', '$TEL')");
        }else{
            $query2=$db->query("INSERT INTO employe (NUM_SERV, NUM_F, NOM, TEL) VALUES ('$NUM_SERV',(select NUM_F from fournisseur where NUM_F=LAST_INSERT_ID()),'$NOM','$TEL')");
            $query3=$db->query("INSERT INTO pointage (NUM_EMP, NUM_SERV, DATEPOINTAGE ) VALUES ((select NUM_EMP from employe where NUM_EMP=LAST_INSERT_ID()),'$NUM_SERV', NOW())");
        }
        
      }

    public function updateFournisseur($id,$NOM,$ADRESSE,$TEL)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE fournisseur SET NOM='$NOM', ADRESSE='$ADRESSE', TEL='$TEL' where NUM_F='$id' ");
        $query1=$db->query("UPDATE employe SET NOM='$NOM',TEL='$TEL' where NUM_F='$id' ");
        $query2=$db->query("UPDATE magasinier SET NOM='$NOM', ADRESSE='$ADRESSE', TEL='$TEL' where NUM_F='$id' ");
    }

    public function deleteFournisseur($id)
    {
        $db = \Config\Database::connect();
        $query1=$db->query("SELECT count(NUM_BE) as nb from bon_ent, fournisseur  where bon_ent.NUM_F=fournisseur.NUM_F and bon_ent.NUM_F='$id'");
        foreach($query1->getResult() as $row){
            if($row->nb==0){
                $query=$db->query("DELETE from fournisseur where NUM_F='$id'");
                $query2=$db->query("DELETE from employe where NUM_F='$id'");
                $query3=$db->query("DELETE from magasinier where NUM_F='$id'");
            }else{
                return redirect()->to('/fournisseur');
            }
        }    
       
    } 

    public function getService()
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * from service");
        return $query;
    }  

}

