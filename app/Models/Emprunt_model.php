<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Emprunt_model extends Model
{
   
    public function getEmprunt($prod,$dat)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * from(SELECT b.NUM_PROD, a.STOCK1 as stock, QT_E, 
            '' as QT_S, concat('E',b.NUM_BE) as bon,'' as raison, b.OBS as obs, b.DATEE AS dat, a.DESIGNATION as designation, a.CATEGORIE as categorie, d.NOM_E as nom FROM bon_ent b left join bon_so c on b.NUM_PROD=c.NUM_PROD left join produit a on b.NUM_PROD=a.NUM_PROD left join emprunteur d on d.ID_E=b.ID_E 
            UNION
            SELECT b.NUM_PROD, a.STOCK1 as stock,'' as QT_E, 
            QT_S,concat('S',c.NUM_BS) as bon, c.RAISON as raison, ''as obs, c.DATE_S AS dat, a.DESIGNATION as designation, a.CATEGORIE as categorie, d.NOM_E as nom FROM bon_ent b left join bon_so c on b.NUM_PROD=c.NUM_PROD left join produit a on b.NUM_PROD=a.NUM_PROD left join emprunteur d on c.ID_E=d.ID_E
            )a where (NUM_PROD='$prod' and DATE_FORMAT(dat,'%b %Y')='$dat' and categorie='Outillage' and nom IS NOT NULL)  group by dat, bon");
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
          $query=$db->query("SELECT * from produit where CATEGORIE='Outillage' order by DESIGNATION ASC");
          return $query;
    }

}


