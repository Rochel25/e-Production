<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include "header1.php" ?>
</head>
<body>

<setion class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">HISTORIQUE DU POINTAGE</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
									
                                    <div style="display:flex; margin-left:-15px; margin-right:-10px;" >

                                         <div class="col-auto mr-auto">
                                        <div  style="display:flex;">
                                        <select name="DAT" id="date" class="form-control  form-control-sm">
                                        <option value="">-Mois-</option>
                                        <?php foreach($date as $row):?>
                                        <option value="<?=$row->dat;?>"><?=$row->dat;?></option>
                                        <?php endforeach;?>
                                        </select>
                                        <button style="margin-left:10px;" type="button" id="bg"  class="btn-xm"><i class="fas fa-search"></i></button>
                                        </div>
                                     </div>
                                    <div class="col-auto" >
                                    <div  style="display:flex;">
                                        <span style="margin-right:20px;" class="label label-default" id="stock"></span>
                                        <form action="/pdfhistorique/htmlToPDF" method="POST">
                                        <input id="dat" type="hidden" name="DAT">
                                        <button type="submit"><i class="fas fa-file-pdf  btn-xm"></i></button></form>
                                    </div>
                                    </div>
                                    </div>

                                    <div style="margin-top:20px;" class="table-responsive">
									        <table class=" table  table-sm table-bordered table-striped" id="mydata">
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
                                                <tbody id="tabl">
                                                </tbody>
                                            </table>
                                        </div>
				</div>			
			</div>
		</div>
	</div>
</section>
<script>



</script> 
</body>
<script src="/assets/ajax/ajaxHistorique.js"></script> 
</html>