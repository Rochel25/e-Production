<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>pdf</title>
  
  <style>
    table th {
          background: #0c1c60 !important;
          color: #fff !important;
          border: 1px solid #ddd !important;
          line-height:15px!important;
          text-align:center!important;
          vertical-align:middle!important;
          width:100%;

      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>

<body>
  <div class="container mt-5">
    <h2 style="text-align:center;">FICHE TECHNIQUE JOURNALIERE</h2>
     <div class="table-responsive col-auto mr-auto" >
     <table class="table table-striped">
      <thead>
        <tr>                                
            <th>EMPLOYE</th>
            <th>HEURE ENTREE</th>
            <th>HEURE SORTIE</th>
            <th>RESPONSABILITE</th>
            <th>NB PRODUIT</th>
            <th>N° PRODUIT FINI</th>
            <th>OBSERVATION</th>
        </tr>
      </thead>
      <tbody >
            <?php foreach($fiche as $row):?>
                <tr>
                    <td><?= $row->NOM;?></td>
                    <td><?= $row->HEURE_ENT;?></td>
                    <td><?= $row->HEURE_SORT;?></td>
                    <td><?= $row->RESP;?></td>
                    <td><?= $row->NB_PROD_FINI;?></td>
                    <td><?= $row->NUM_PROD_FINI;?></td>
                    <td><?= $row->OBS;?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
      </table>
  </div>
  </div>
</body>
</html>