<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include "header.php" ?>

</head>
<body>

<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">LISTE DE STOCKAGE</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header ">
									
                                    <div style="display:flex; margin-left:-15px; margin-right:-15px;margin-bottom:15px;" >
                                         <div  class="col-auto mr-auto" ><button <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?> style="background-color:#1f283e;" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
                                         <div class="col-auto" ><select style="width:140px;" id="categorie" class="form-control form-control-sm">
                                         <option value="">-Catégorie-</option>
                                         </select></div>
                                      
                                    </div>
                                  
                                    <div class="table-responsive">
									        <table style="margin-top:15px;"class=" table  table-sm table-bordered " id="tab">
                                                <thead>
                                                    <tr>
                                                         <th>DESIGNATION</th>
                                                         <th>CATEGORIE</th>
                                                         <th>STOCK PPLE</th>
                                                         <th>STOCK INSTANTANE</th>
                                                         <th>S MIN</th>
                                                         <th>S MAX</th>
                                                         <th>TPS AVT REAPP</th>
                                                         <th>QTE A REAPP</th>
                                                         <th>ACTION</th>
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
</div>



    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Designation</label>
                    <input type="text"  id="DESIGNATION" class="form-control " name="DESIGNATION" placeholder="Nom de produit" >
                    <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                    <span id="design" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Catégorie</label>
                    <select style="padding-left:35px;"  type="text" class="form-control" id="CATEGORIE" name="CATEGORIE" required>
                    <option value="">-Categorie-</option>
                    <option value="Outillage"> Outillage</option>
                    <option value="Matière première">Matière première</option>
                    <option value="Produit fini">Produit fini</option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-th-list "></i></a>
                    <span id="cat" class="champ" ></span>
                </div>
            </div>

            <div style="display:flex;">
                <div class="form-group">
                    <div class="inputWithIcon">
                    <label>Stock</label>
                    <input type="text"  id="STOCK" class="form-control " value="0" name="STOCK" disabled />
                    <a href="#" class="user-btn"><i class="fas fa-dolly-flatbed"></i></a>
                </div>
            </div>

            <div style="margin-left:50px;" class="form-group">
                <div class="inputWithIcon">
                    <label>Seuil Minimum</label>
                    <input type="text"  id="SEUILMIN" class="form-control " name="SEUILMIN" placeholder="Seuil min"/>
                    <a href="#" class="user-btn"><i class="fas fa-chevron-circle-down"></i></a>
                    <span id="smin" class="champ" ></span>
                </div>
            </div>

            <div style="margin-left:50px;" class="form-group">
                <div class="inputWithIcon">
                    <label>Seuil Maximum</label>
                    <input type="text"  id="SEUILMAX" class="form-control " name="SEUILMAX" placeholder="Seuil max"/>
                    <a href="#" class="user-btn"><i class="fas fa-chevron-circle-up"></i></a>
                    <span id="smax" class="champ" ></span>
                </div>
            </div>
            </div>       
                  
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Temps avant réapprovisionnement</label>
                    <input type="text"  id="TAVR" class="form-control " name="TAVR" placeholder="Temps avant réapprovisionnement"/>
                    <a href="#" class="user-btn"><i class="fas fa-history"></i></a>
                    <span id="tavr" class="champ" ></span>
                </div>
            </div>
               
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité à réapprovisionner</label>
                    <input type="text"  id="QTA" class="form-control " name="QTA" placeholder="Quantité à réapprovisionner"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up"></i></a>
                    <span id="qta" class="champ" ></span>
                </div>
            </div>
            
            </div>
            <div class="modal-footer">
                <input type="hidden"  id="STOCK1" class="form-control" name="STOCK1" />
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom produit</label>
                    <input type="text" id="DESIGNATION" class="form-control DESIGNATION" name="DESIGNATION" placeholder="Nom de produit">
                    <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                    <span id="design1" class="champ" ></span>
                </div>
                </div>
                
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Catégorie</label>
                    <select style="padding-left:35px;" type="text" class="form-control CATEGORIE" id="CATEGORIE" name="CATEGORIE" required>
                    <option value="">-Categorie-</option>
                    <option value="Outillage">Outillage</option>
                    <option value="Matière première">Matière première</option>
                    <option value="Produit fini">Produit fini</option>
                    </select> 
                    <a href="#" class="user-btn"><i class="fas fa-th-list "></i></a>
                    <span id="cat1" class="champ" ></span>
                </div>
                </div>

                <div style="display:flex;">
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Stock</label>
                    <input type="text"  id="STOCK" class="form-control STOCK" name="STOCK" disabled />
                    <a href="#" class="user-btn"><i class="fas fa-dolly-flatbed"></i></a>
                </div>
            </div>

            <div style="margin-left:50px;" class="form-group">
                <div class="inputWithIcon">
                    <label>Seuil Minimum</label>
                    <input type="text"  id="SEUILMIN" class="form-control SEUILMIN" name="SEUILMIN" placeholder="Seuil min"/>
                    <a href="#" class="user-btn"><i class="fas fa-chevron-circle-down"></i></a>
                    <span id="smin1" class="champ" ></span>
                </div>
            </div>

            <div style="margin-left:50px;" class="form-group">
                <div class="inputWithIcon">
                    <label>Seuil Maximum</label>
                    <input type="text"  id="SEUILMAX" class="form-control SEUILMAX" name="SEUILMAX" placeholder="Seuil max"/>
                    <a href="#" class="user-btn"><i class="fas fa-chevron-circle-up"></i></a>
                    <span id="smax1" class="champ" ></span>
                </div>
            </div>
            </div>             
             
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Temps avant réapprovisionnement</label>
                    <input type="text"  id="TAVR" class="form-control TAVR" name="TAVR"/>
                    <a href="#" class="user-btn"><i class="fas fa-history"></i></a>
                    <span id="tavr1" class="champ" ></span>
                </div>
            </div>
               
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité à réapprovisionner</label>
                    <input type="text"  id="QTA" class="form-control QTA" name="QTA" />
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up"></i></a>
                    <span id="qta1" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden"  id="STOCK2" class="form-control" name="STOCK1" />
                <input type="hidden" id="NUM_PROD" name="NUM_PROD" class="NUM_PROD">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer ce produit?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUMPROD" name="NUM_PROD" class="NUMPROD">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
</body>
<script src="/assets/ajax/ajaxProduit.js"></script>  
<script>
$(document).ready(function() {
$('#CATEGORIE').on('change',function(){
    var type=$('#CATEGORIE').val();
    if (type == "Outillage") {
        $("#STOCK").prop("disabled", false);
    }else{
        $("#STOCK").prop("disabled", true);
        $("#STOCK").val('0');
    }

});
});
</script>
</html>