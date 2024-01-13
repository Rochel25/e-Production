<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include "header.php" ?>
</head>
<body>

<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">LISTE DE FOURNISSEURS</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
									
                                    <div style="display:flex; margin-left:-15px; margin-bottom:15px;" >
                                         <div  class="col-auto mr-auto"><button style="background-color:#1f283e;" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
                                    </div>
                                    <div class="table-responsive">
									        <table class=" table  table-sm table-bordered table-striped" id="mydata">
                                                <thead>
                                                    <tr>
                                                         <th>N° FOURNISSEUR</th>
                                                         <th>NOM FOURNISSEUR</th>
                                                         <th>ADRESSE</th>
                                                         <th>TEL</th>
                                                         <th>ACTION</th>
                                                         </tr>
                                                </thead>
                                                <tbody id="showdata">
                                                </tbody>
                                            </table>
				</div>			</div>
			</div>
		</div>
	</div>
</div>



    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom du fournisseur</label>
                    <input type="text"  id="NOM" class="form-control " name="NOM" placeholder="Nom de fournisseur" >
                    <a href="#" class="user-btn"><i class="fas fa-address-book"></i></a>
                    <span id="fr" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Type</label>
                    <select style="padding-left:35px;" type="text" class="form-control TRANS" id="TRANS" name="TRANS" required>
                    <option value="">-Type-</option>
                    <option value="1">magasinier</option>
                    <option value="0">employé </option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-bars"></i></a>
                    <span id="type" class="champ" ></span>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Service</label>
                    <select style="padding-left:35px;" name="NUM_SERV"  id="NUM_SERV" class="form-control" disabled>
                    <option value="">-Service-</option>
                    <?php foreach($service as $row):?>
                    <option value="<?=$row->NUM_SERV;?>"><?=$row->RESP;?></option>
                    <?php endforeach;?>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                    <span id="service" class="champ" ></span>
                </div>
                </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Adresse</label>
                    <input type="text"  id="ADRESSE" class="form-control "  name="ADRESSE" placeholder="Adresse de fournisseur" disabled/>
                    <a href="#" class="user-btn"><i class="fas fa-map-marked-alt"></i></a>
                    <span id="adresse" class="champ" ></span>
                </div>
            </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>N° Téléphone</label>
                    <input type="text"  id="TEL" class="form-control "  name="TEL" placeholder="N° téléphone"/>
                    <a href="#" class="user-btn"><i class="fas fa-phone"></i></a>
                    <span id="tel" class="champ" ></span>
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

    <!-- Modal Edit Product-->
    <form  method="post">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom du fournisseur</label>
                    <input type="text"  id="NOM" class="form-control NOM" name="NOM" placeholder="Nom de fournisseur" >
                    <a href="#" class="user-btn"><i class="fas fa-address-book"></i></a>
                    <span id="fr1" class="champ" ></span>
                </div>
            </div>
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Adresse</label>
                    <input type="text"  id="ADRESSE" class="form-control ADRESSE"  name="ADRESSE" placeholder="Adresse de fournisseur" />
                    <a href="#" class="user-btn"><i class="fas fa-map-marked-alt"></i></a>
                    <span id="adresse1" class="champ" ></span>
                </div>
            </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>N° Téléphone</label>
                    <input type="text"  id="TEL" class="form-control TEL"  name="TEL" placeholder="N° téléphone"/>
                    <a href="#" class="user-btn"><i class="fas fa-phone"></i></a>
                    <span id="tel1" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" class="TRANS" >
                <input type="hidden" id="NUM_F" name="NUM_F" class="NUM_F">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button  type="button" id="btn-update" class="btn btn-primary">Modifier</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

    <!-- Modal Delete Product-->
    <form  method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer ce fournisseur?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_F" name="NUM_F" class="NUM_F">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

    
  

</body>
<script src="/assets/ajax/ajaxFournisseur.js"></script> 
<script>

$(document).ready(function() {

$('#TRANS').on('change',function(){
    var type=$('#TRANS').val();
    if (type == "0") {
        $("#NUM_SERV").prop("disabled", false);
        $("#ADRESSE").prop("disabled", true);
    }else{
        $("#NUM_SERV").prop("disabled", true);
        $("#ADRESSE").prop("disabled", false);
    }

});



});
</script>
</html>