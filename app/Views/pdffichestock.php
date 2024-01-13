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
          width:100px;

      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>

<body>
  <div class="container mt-5">
    <h2 style="text-align:center;">FICHE DE MOUVEMENT DE STOCKS</h2>
     <div class="table-responsive col-auto mr-auto" >
     <table class="table table-striped">
      <thead>
           <tr>
              <th rowspan="2">N°</th>
              <th rowspan="2">Date</th>
              <th colspan="3">Entrée</th>
              <th colspan="2">Sortie</th>
            </tr>
            <tr>                                
                <th>Quantité</th>
                <th>PU</th>
                <th>Montant</th>
                <th>Raison</th>
                <th>Quantité</th>
                </tr>
      </thead>
      <tbody >
            <?php foreach($fiche as $row):?>
                <tr>
                  <?php $date=new DateTime($row->dat);?>
                    <td><?= $row->bon;?></td>
                    <td><?= $date->format('d/m/Y');?></td>
                    <td><?= $row->QT_E?></td>
                    <td><?= $row->pu;?></td>
                    <td><?= $row->montant;?></td>
                    <td><?= $row->raison;?></td>
                    <td><?= $row->QT_S;?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
      </table>
  </div>
  </div>
</body>
</html>