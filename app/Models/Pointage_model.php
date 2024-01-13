<?php namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
class Pointage_model extends Model
{
    
    public function getPointage($para)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT * FROM pointage
        INNER JOIN employe ON employe.NUM_EMP=pointage.NUM_EMP  AND employe.NUM_SERV=pointage.NUM_SERV INNER JOIN service ON service.NUM_SERV=pointage.NUM_SERV AND service.NUM_SERV=pointage.NUM_SERV  WHERE pointage.DATEPOINTAGE=(SELECT curdate())  ORDER BY employe.NUM_EMP asc ");
        return $query;
    }
    
    public function nbrePointage(){
        $db = \Config\Database::connect(); 
        $query=$db->query("SELECT count(*) as nb FROM pointage WHERE DATEPOINTAGE = CURRENT_DATE");
        return $query;
    }

    public function savePointage(){
        $db = \Config\Database::connect();
        $query=$db->query("INSERT INTO pointage (NUM_EMP, NUM_SERV, DATEPOINTAGE )  (SELECT NUM_EMP, NUM_SERV, NOW() FROM employe)");
        return $query;  
    }
    
    public function deconnect(){
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(*) AS NB from pointage where ((HEUREENTMA<>'00:00:00' AND HEURESORTMA ='00:00:00') OR (HEUREENTSO<>'00:00:00' AND HEURESORTSO='00:00:00')) AND DATEPOINTAGE=CURRENT_DATE");
        return $query;
    }
    
    public function updatePointage($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEUREENTMA=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        return $query;
    }
    
    public function updatePointage1($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEURESORTMA=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        return $query;
    }
    
    public function updatePointage2($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEUREENTSO=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        return $query;
    }
    
    public function updatePointage3($id)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET HEURESORTSO=(SELECT DATE_FORMAT(NOW(),'%H:%i')) where IDPOINTAGE='$id' ");
        return $query;
    }
    
    public function updatePointage4($id,$OBS)
    {
        $db = \Config\Database::connect();
        $query=$db->query("UPDATE pointage SET OBSERVATION='$OBS' where IDPOINTAGE='$id' ");
        return $query;
    }

    public function absencePointage($dat)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(a.NUM_EMP) as nb, b.NOM as nom, c.DEPARTEMENT as dep, a.DATEPOINTAGE as dat FROM pointage a 
        INNER JOIN employe b ON a.NUM_EMP=b.NUM_EMP  AND b.NUM_SERV=a.NUM_SERV INNER JOIN service c ON c.NUM_SERV=a.NUM_SERV WHERE DATE_FORMAT(a.DATEPOINTAGE,'%b %Y')='$dat' AND ((a.HEUREENTMA='00:00:00' && a.HEURESORTMA='00:00:00') or (a.HEUREENTSO='00:00:00' && a.HEURESORTSO='00:00:00')) group BY b.NUM_EMP asc  ");
        return $query;
    }

    public function getMoisAn()
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT  distinct DATE_FORMAT(DATEPOINTAGE, '%b %Y') as dat from pointage");
          return $query;
      } 

    public function getHistorique($dat)
    {
          $db = \Config\Database::connect();
          $query=$db->query("SELECT * FROM pointage
          INNER JOIN employe ON employe.NUM_EMP=pointage.NUM_EMP  AND employe.NUM_SERV=pointage.NUM_SERV INNER JOIN service ON service.NUM_SERV=pointage.NUM_SERV AND service.NUM_SERV=pointage.NUM_SERV  WHERE DATE_FORMAT(DATEPOINTAGE, '%b %Y')='$dat' ORDER BY DATEPOINTAGE asc");
          return $query;
    }  
    
    public function retardPointage($dat1)
    {
        $db = \Config\Database::connect();
        $query=$db->query("SELECT count(a.NUM_EMP) as nb, b.NOM as nom, c.DEPARTEMENT as dep, a.DATEPOINTAGE as dat FROM pointage a 
        INNER JOIN employe b ON a.NUM_EMP=b.NUM_EMP  AND b.NUM_SERV=a.NUM_SERV INNER JOIN service c ON c.NUM_SERV=a.NUM_SERV  WHERE DATE_FORMAT(DATEPOINTAGE,'%b %Y')='$dat1' and (a.HEUREENTMA>'09:16:00') or (a.HEUREENTSO>'14:16:00') group BY b.NUM_EMP asc  ");
        return $query;
    }
}

