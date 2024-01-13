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
          width:300px;
      }
      table td{line-height:15px!important; text-align:center!important;  border: 1px solid #ddd !important;}
  </style>

</head>

<body>
  <div class="container mt-5">
    <h2 style="text-align:center;">ETAT FINANCIER MENSUEL</h2><br>
    <?php $cat=$_POST['PROD'];
    echo "<span>CATEGORIE:$cat</span>";
    ?>
    
     <div class="table-responsive col-auto mr-auto" >
     <table style="align:center;" class="table table-striped">
      <thead>
        <tr>
            <th>DESIGNATION</th>
            <th>MONTANT</th>
        </tr>
      </thead>
      <tbody >
            <?php foreach($financier as $row):?>
                <tr>
                    <td><?= $row->DESIGNATION;?></td>
                    <td><?= $row->montant;?> Ar</td>
                </tr>
                <?php endforeach;?>
        </tbody>
        <tfoot>
        <tr>
             <th>TOTAL DE FLUX : </th>
             <?php 
              $som=0;
              foreach($financier as $row){
                   $mont=$row->montant;
                   $som+=floatval($mont);
                }
                echo "<th>$som Ar</th>";  ?>  
        </tr>
        </tfoot>
       
      </table>
  </div>
  </div>
</body>
</html>