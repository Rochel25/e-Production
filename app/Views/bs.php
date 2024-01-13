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
					<h3 class="page-title">LISTE DE SORTIES</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
                                    <div style="display:flex; margin-left:-15px; margin-right:-15px; margin-bottom:15px;" >
                                         <div  class="col-auto mr-auto"><button style="background-color:#1f283e;" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
                                         <div class="col-auto" ><select style="width:100px;" id="daty" class="form-control form-control-sm">
                                        
                                        </select></div>
                                    </div>
                                    <div class="table-responsive">
									        <table class=" table  table-sm table-bordered table-striped" id="mydata">
                                                <thead>
                                                    <tr>
                                                         <th>PRODUIT</th>
                                                         <th>QUANTITE</th>
                                                         <th>OBSERVATION</th>
                                                         <th>DATE</th>
                                                         <th>EMPRUNTEUR</th>
                                                         <th>UTILISATEUR</th>
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

    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle sortie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Catégorie</label>
                    <select style="padding-left:40px;" id="cat" name="CAT" class="form-control">
                        <option value="">-Catégorie-</option>
                        <?php foreach($produit as $row):?>
                        <option value="<?=$row->CATEGORIE;?>"><?=$row->CATEGORIE;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-th-list "></i></a>
                        <span id="cate" class="champ" ></span>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Produit</label>
                    <select style="padding-left:35px;" name="NUM_PROD"  id="NUM_PROD" class="form-control">
                    <option value="">-Produit-</option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                </div>
            </div>

            <div class="form-group" id="ach">
                <div class="inputWithIcon" id="INTERNE">
                    <label>Interne :</label>
                    <input style="margin-left:5px;" name="myRadios" type="radio"  id="choix1" value="1" checked/>
                    <label style="margin-right:50px;"class="form-check-label" >Oui</label>
                    <input type="radio" name="myRadios" id="choix2" value="2" />
                    <label class="form-check-label" >Non</label>
                </div>
                </div>

            <div class="form-group">
                <div class="inputWithIcon" id="emprunteur">
                    <label>Emprunteur</label>
                    <select style="padding-left:40px;" id="EMPR" name="EMPR" class="js-states form-control">
                        <option value="">-Emprunteur-</option>
                        <?php foreach($employe as $row):?>
                        <option value="<?=$row->NOM;?>"><?=$row->NOM;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-user "></i></a>
                        <span id="emp1" class="champ" ></span>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon" id="emprunteur1">
                    <label>Emprunteur</label>
                    <input type="text"  id="EMPR1" name="EMPR" class="form-control "  placeholder="Emprunteur"/>
                    <a href="#" class="user-btn"><i class="fas fa-user"></i></a>
                    <span id="emp2" class="champ" ></span>
                </div>
            </div>

                <div class="form-group">
                <div class="inputWithIcon" id="stock">
                </div>
                </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Observation</label>
                    <input type="text"  id="RAISON" class="form-control " name="RAISON" placeholder="Observation"/>
                    <a href="#" class="user-btn"><i class="fas fa-eye-dropper"></i></a>
                    <span id="raison" class="champ" ></span>
                </div>
            </div>
            
             <div style="display:flex">
                <div class="form-group ">
                    <div class="inputWithIcon">
                    <label>Quantité à sortir</label>
                    <input type="text"  id="QT_S" class="form-control "  name="QT_S" placeholder="Quantité"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-down"></i></a>
                    <span id="qts" class="champ" ></span>
                </div>
            </div>

            <div style="margin-left:20px;" class="form-group">
            <div class="inputWithIcon" id="prix">
                    <label>Prix de vente</label>
                    <input type="text" id="PV" class="form-control "  name="PV" placeholder="Prix en Ar"/>
                    <!-- <input type="number" id="Number" name="Number" min="1" max="100"> -->
                    <a href="#" class="user-btn"><i class="fas fa-money-check-alt"></i></a>
                    <span id="qts" class="champ" ></span>
                </div>
            </div>

                <div style="margin-left:20px;" class="form-group">
                <div class="inputWithIcon">
                <label>Date de sortie</label>
                    <input type="date" style="padding-left:40px;"  id="DATE_S" class="form-control "  name="DATE_S" placeholder="Date de sortie"/>
                    <a href="#" class="user-btn"><i class="fas fa-calendar-alt"></i></a>
                    <span id="date" class="champ" ></span>
                </div>
            </div>
            </div>
            </div>             
            
            <div class="modal-footer">
                <div id="COUT"></div>
                <div id="nomprod"></div>
                <input type="hidden" value="<?=session()->get('NUM_UT') ?>" id="NUM_UT" class="form-control " name="NUM_UT" />
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier une sortie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Produit</label>
                    <select style="padding-left:40px;" name="NUM_PROD"  class="form-control NUM_PROD">
                        <?php foreach($produit1 as $row):?>
                        <option value="<?=$row->NUM_PROD;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                        <span id="numprod1" class="champ" ></span>
                </div>
                </div>
     
                <div class="form-group">
                <div class="inputWithIcon" id="stock1">
                </div>
                </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité à sortir</label>
                    <input type="text"  id="QT_S" class="form-control QT_S"  name="QT_S" placeholder="Quantité"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-down"></i></a>
                    <span id="qts1" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Observation</label>
                    <input type="text"  id="RAISON" class="form-control RAISON" name="RAISON" placeholder="Observation"/>
                    <a href="#" class="user-btn"><i class="fas fa-eye-dropper"></i></a>
                    <span id="raison1" class="champ" ></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Date de sortie</label>
                    <input type="date" style="padding-left:40px;"  id="DATE_S" class="form-control DATE_S"  name="DATE_S" placeholder="Date de sortie"/>
                    <a href="#" class="user-btn"><i class="fas fa-calendar-alt"></i></a>
                    <span id="date1" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="QTS">
                <input type="hidden" id="NUM_BS" name="NUM_BS" class="NUM_BS">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer une sortie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous supprimer cette sortie?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUMBS" name="NUM_BS" class="NUM_BS">
                <input type="hidden" id="NUMPROD" name="NUM_PROD" class="NUM_PROD">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
</body>
<script src="/assets/ajax/ajaxBs.js"></script> 
<script>
$(document).ready(function() {

    $("#cat").select2({    
        theme:'bootstrap4',
    });
   
    $("#NUM_PROD").select2({    
        theme:'bootstrap4',
    });

    $("#EMPR").select2({    
        theme:'bootstrap4',
    });

    
});
</script>

</html>