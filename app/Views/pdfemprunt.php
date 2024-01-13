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
          width:120px;
      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>

<body>
  <div class="container mt-5">
    <h2 style="text-align:center;">LISTE D'EMPRUNT</h2>
     <div class="table-responsive col-auto mr-auto" >
     <table class="table table-striped">
      <thead>
        <tr>
            <th rowspan="2">N°</th>
            <th rowspan="2">DATE</th>
            <th rowspan="2">EMPRUNTEUR</th>
            <th colspan="2">ENTREE</th>
            <th colspan="2">SORTIE</th>
        </tr>
        <tr>
            <th>QUANTITE</th>
            <th>OBSERVATION</th>
            <th>QUANTITE</th>
            <th>OBSERVATION</th>
        </tr>
      </thead>
      <tbody >
            <?php foreach($emprunt as $row):?>
                <tr>
                  <?php $date=new DateTime($row->dat);?>
                    <td><?= $row->bon;?></td>
                    <td><?= $date->format('d/m/Y');?></td>
                    <td><?= $row->nom?></td>
                    <td><?= $row->QT_E;?></td>
                    <td><?= $row->obs;?></td>
                    <td><?= $row->QT_S;?></td>
                    <td><?= $row->raison;?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
      </table>
  </div>
  </div>
</body>
</html>