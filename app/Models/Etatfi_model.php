<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Etatfi_model extends Model
{
   
    public function getMontant1($prod,$dat)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT SUM(PU*QT_E) as montant, DESIGNATION, CATEGORIE  from bon_ent a, produit b, fournisseur c where a.NUM_PROD=b.NUM_PROD and a.NUM_F=c.NUM_F and b.CATEGORIE='$prod' AND DATE_FORMAT(a.DATEE, '%b %Y')='$dat' group by DESIGNATION  ");
        return $query; 
    }

    public function getMontant2($prod,$dat)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT SUM(PV) as montant, DESIGNATION, CATEGORIE from bon_so a, produit b where a.NUM_PROD=b.NUM_PROD and b.CATEGORIE='$prod' AND DATE_FORMAT(a.DATE_S, '%b %Y')='$dat' group by DESIGNATION  ");
        return $query; 
    }

    public function getMoisAn()
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT  distinct DATE_FORMAT(greatest(a.DATEE, b.DATE_S), '%b %Y') as dat from bon_ent a, bon_so b where a.NUM_PROD=b.NUM_PROD ");
          return $query;
    } 

     public function getProduit()
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT distinct CATEGORIE from produit");
          return $query;
    }

}


