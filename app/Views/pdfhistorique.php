<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pdf</title>
  
  <style>
    table th {
          background: #0c1c60 !important;
          color: #fff !important;
          border: 1px solid #ddd !important;
          line-height:15px!important;
          text-align:center!important;
          vertical-align:middle!important;
          width:70px;

      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>

<body>
  <div class="container mt-5">
    <h2 style="text-align:center;">FICHE DE POINTAGE</h2>
     <div class="table-responsive col-auto mr-auto" >
     <table class="table table-striped">
      <thead>
        <tr>                                
            <th>DATE</th>
            <th>EMPLOYE</th>
            <th>SERVICE</th>
            <th>ENTREE MATIN</th>
            <th>SORTIE MATIN</th>
            <th>ENTREE SOIR</th>
            <th>SORTIE SOIR</th>
            <th>OBSERVATION</th>
        </tr>
      </thead>
      <tbody >
            <?php foreach($fiche as $row):?>
                <tr>
                <?php $date=new DateTime($row->DATEPOINTAGE);?>
                    <td><?= $date->format('d/m/Y');?></td>
                    <td><?= $row->NOM;?></td>
                    <td><?= $row->DEPARTEMENT;?></td>
                    <td><?= $row->HEUREENTMA;?></td>
                    <td><?= $row->HEURESORTMA;?></td>
                    <td><?= $row->HEUREENTSO;?></td>
                    <td><?= $row->HEURESORTSO;?></td>
                    <td><?= $row->OBSERVATION;?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
      </table>
  </div>
  </div>
</body>
</html>