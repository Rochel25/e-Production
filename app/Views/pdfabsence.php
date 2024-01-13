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
          width:200px;

      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>

<body>
  <div class="container mt-5">
    <h2 style="text-align:center;">FICHE D'ABSENCE</h2>
     <div class="table-responsive col-auto mr-auto" >
     <table class="table table-striped">
      <thead>
        <tr>                                
            <th>ABSENCE</th>
            <th>NOM</th>
            <th>DEPARTEMENT</th>
        </tr>
      </thead>
      <tbody >
            <?php foreach($fiche as $row):?>
                <tr>
                    <td><?= $row->nb;?></td>
                    <td><?= $row->nom;?></td>
                    <td><?= $row->dep;?></td>
                </tr>
                <?php endforeach;?>
        </tbody>
      </table>
  </div>
  </div>
</body>
</html>