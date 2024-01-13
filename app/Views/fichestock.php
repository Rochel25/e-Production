<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include "header1.php" ?>
</head>
<body>

<section class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">FICHE DE MOUVEMENT DE STOCK</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
									
                                        <div style="display:flex; margin-left:-15px; margin-right:-10px;" >

                                        <div class="col-auto mr-auto">
                                        <div style="display:flex;">
                                        <select  style="width:120px;" name="DESIGNATION" id="produit" >
                                        <option value="">-Produit-</option>
                                        <?php foreach($produit as $row):?>
                                        <option value="<?=$row->NUM_PROD;?>"><?=$row->DESIGNATION;?></option>
                                        <?php endforeach;?>
                                        </select>&nbsp &nbsp &nbsp
                                        <select style="margin-left:10px; width:100px" name="DAT" id="date">
                                        <option value="">-Mois-</option>
                                        <?php foreach($date as $row):?>
                                        <option value="<?=$row->dat;?>"><?=$row->dat;?></option>
                                        <?php endforeach;?>
                                        </select>
                                        <button style="margin-left:10px;" type="button" id="bg"  class="btn-xm"><i class="fas fa-search"></i></button>
                                        </div>
                                        </div>
                                    <div class="col-ml ml-auto" style="margin-right:12px" >
                                    <div  style="display:flex;">
                                        <span style="margin-right:20px;" class="label label-default" id="stock"></span>
                                        <form action="/pdffiche/htmlToPDF" method="POST">
                                        <input id="pro" type="hidden" name="PROD">
                                        <input id="dat" type="hidden" name="DAT">
                                        <button type="submit"><i class="fas fa-file-pdf  btn-xm"></i></button></form>
                                    </div>
                                    </div>
                                    </div>

                                    <div style="margin-top:15px;" class="table-responsive">
									        <table class="table table-sm table-bordered table-striped" id="mydata">
                                                <thead>
                                                    <tr>
                                                    <th rowspan="2">N°</th>
                                                    <th rowspan="2">DATE</th>
                                                    <th colspan="3">ENTREE</th>
                                                    <th colspan="2">SORTIE</th>
                                                    </tr>
                                                    <tr>
                                                         <th>QUANTITE</th>
                                                         <th>PU</th>
                                                         <th>MONTANT</th>
                                                         <th>RAISON</th>
                                                         <th>QUANTITE</th>
                                                         </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                </div>			
			</div>
		</div>
	</div>
</section>

</body>
<script src="/assets/ajax/ajaxFichestock.js"></script> 
<script>
$(document).ready(function() {
    $("#produit").select2({
       theme:'bootstrap4',
       
});

$("#date").select2({
       theme:'bootstrap4',
});
});
</script>
</html>