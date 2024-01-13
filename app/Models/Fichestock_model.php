<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Fichestock_model extends Model
{
   
    public function getFichestock($prod,$dat)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * from(SELECT a.NUM_PROD, a.STOCK as stock, QT_E, concat(PU, 'Ar') as pu, concat((b.QT_E*b.PU), 'Ar') as montant, 
            '' as QT_S, concat('E',b.NUM_BE) as bon,'' as raison,  b.DATEE AS dat, a.DESIGNATION as designation FROM bon_ent b left join bon_so c on b.NUM_PROD=c.NUM_PROD left join produit a on b.NUM_PROD=a.NUM_PROD
            UNION
            SELECT a.NUM_PROD, a.STOCK as stock,'' as QT_E, '' as pu,  '' as montant, 
            QT_S,concat('S',c.NUM_BS) as bon, c.RAISON as raison, c.DATE_S AS dat, a.DESIGNATION as designation FROM bon_ent b left join bon_so c on b.NUM_PROD=c.NUM_PROD left join produit a on b.NUM_PROD=a.NUM_PROD
            )a where (NUM_PROD='$prod' and DATE_FORMAT(dat,'%b %Y')='$dat' and pu!='0ar')  group by dat, bon");
        return $query; 
      }
 
    public function getProduit()
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * from produit order by DESIGNATION ASC");
          return $query;
    }

    public function getMoisAn()
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT  distinct DATE_FORMAT(greatest(a.DATEE, b.DATE_S), '%b %Y') as dat from bon_ent a, bon_so b where a.NUM_PROD=b.NUM_PROD ");
          return $query;
    } 

}


