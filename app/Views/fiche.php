<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include "header.php" ?>
</head>
<body>

<section class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">FICHE TECHNIQUE DU TRAVAIL JOURNALIER</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
									
                                    <div style="display:flex; margin-left:-15px; margin-right:-15px; margin-bottom:15px;" >
                                         <div  class="col-auto mr-auto"><button style="background-color:#1f283e;" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
                                         
                                         <div class="col-auto">  
                                         <div style="display:flex;">
                                            <div id="da"></div>
                                            <a href="/fiche/htmlToPDF"><i style="font-size:25px;color:rgb(223, 39, 39); margin-left:75px;" class="fas fa-file-pdf"></i></a> </div>
                                        </div>
                                        </div>

                                    <div class="table-responsive">
									        <table class=" table  table-sm table-bordered table-striped" id="mydata">
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
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
				</div>			
			</div>
		</div>
	</div>
</section>



    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle fiche technique</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Responsabilité</label>
                    <select style="padding-left:35px;" name="NUM_SERV" id="service" class="form-control">
                    <option value="">-Responsabilité-</option>
                        <?php foreach($service as $row):?>
                        <option value="<?=$row->NUM_SERV;?>"><?=$row->RESP;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                        <span id="resp" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Employé</label>
                    <select style="padding-left:35px;" name="NUM_EMP"  id="employe" class="form-control employe">
                    <option value="">-Employe-</option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-users"></i></a>
                </div>
            </div>
          
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>N° Produit fini</label>
                    <select style="padding-left:35px;" name="NUM_PROD"  id="numpro" class="form-control">
                    <option value="">-N° Produit fini-</option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nombre de produit fini</label>
                    <select style="padding-left:35px;" name="NBP"  id="nbp" class="form-control">
                    <option value="">-Nombre de produit fini-</option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up"></i></a>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Observation</label>
                    <input type="text"  id="OBS" class="form-control "  name="OBS" placeholder="Observation"/>
                    <a href="#" class="user-btn"><i class="fas fa-eye-dropper"></i></a>
                </div>
            </div>

            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button"  id="btn_save" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <form  method="post">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <label>Voulez vous confirmer?</label>        
            </div>
            <input type="hidden" id="HEURE_SORT" class="form-control HEURE_SORT" name="HEURE_SORT">
            <div class="modal-footer">
            <input type="hidden" id="ID_FIC" class="form-control ID_FIC" name="ID_FIC">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button  type="button"  id="btn-update" class="btn btn-primary">Oui</button>

                
            </div>
            </div>
        </div>
        </div>
    </form>
  

</body>

<script src="/assets/ajax/ajaxFiche.js"></script> 
<script>
$(document).ready(function() {
    $("#service").select2({    
        theme:'bootstrap4',
    });
    $("#employe").select2({    
        theme:'bootstrap4',
    });
});
</script>
</html>