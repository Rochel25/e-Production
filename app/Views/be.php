<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include "header.php" ?>
</head>
<body>

<setion class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">LISTE D'ENTREES</h3>
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
									        <table class=" table table-sm table-bordered table-striped" id="mydata">
                                                <thead>
                                                    <tr>
                                                         <th>PRODUIT</th>
                                                         <th>FOURNISSEUR</th>
                                                         <th>QUANTITE</th>
                                                         <th>PRIX UNITAIRE</th>
                                                         <th>DATE</th>
                                                         <th>EMPRUNTEUR</th>
                                                         <th>UTILISATEUR</th>
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
</section>



    <!-- Modal Add Product-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle entrée</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        
            <div class="form-group">
                <div class="inputWithIcon" >
                    <label>Catégorie</label>
                    <select style="padding-left:40px;" name="CAT" id="cat" class="form-control">
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
                    <select style="padding-left:35px;" name="NUM_PROD"  id="NUM_PROD" class="form-control PROD1">
                    <option value="">-Produit-</option>
                    </select>
                    <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon" id="aff">
                    <label>Affectation</label>
                    <select style="padding-left:40px;" name="AFFECTATION" id="AFFECTATION" class="form-control">
                        <option value="">-Affectation-</option>
                        <?php foreach($produit2 as $row):?>
                        <option value="<?=$row->DESIGNATION;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-stamp"></i></a>
                        <span id="affectation" class="champ" ></span>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon" id="SERIE">
                    
                </div>
                </div>

                <div class="form-group" id="ach">
                <div class="inputWithIcon" id="ACHAT">
                    <label>Achat :</label>
                    <input style="margin-left:5px;" name="myRadios" type="radio"  id="choix1" value="1" />
                    <label style="margin-right:50px;"class="form-check-label" >Oui</label>
                    <input type="radio" name="myRadios" id="choix2" value="2" checked/>
                    <label class="form-check-label" >Non</label>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon" id="empr">
                    <label>Emprunteur</label>
                    <select style="padding-left:40px;" name="NUM_E" id="NUM_E" class="form-control">
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-address-book"></i></a>
                        <span id="emp" class="champ" ></span>
                </div>
                </div>

                <div class="form-group">
                <div class="inputWithIcon" id="fournisseur">
                    <label>Fournisseur</label>
                    <select style="padding-left:40px;" name="NUM_F" id="NUM_F" class="form-control">
                        
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-address-book"></i></a>
                        <span id="fr" class="champ" ></span>
                </div>
                </div>

                <div class="form-group" >
                <div class="inputWithIcon" id="obs1">
                    <label>Observation</label>
                    <input type="text"  id="OBS" class="form-control " name="OBS" placeholder="Observation"/>
                    <a href="#" class="user-btn"><i class="fas fa-eye-dropper"></i></a>
                    <span id="obs" class="champ" ></span>
                </div>
            </div>

                <div style="display:flex;">
                <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité à entrer</label>
                    <input type="text"  id="QT_E" class="form-control "  name="QT_E" placeholder="Quantité"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up"></i></a>
                    <span id="qte" class="champ" ></span>
                </div>
                </div>
            
                <div style="margin-left:20px;" class="form-group">
                <div class="inputWithIcon">
                    <label>Prix unitaire</label>
                    <input type="text"  id="PU" class="form-control "  name="PU" placeholder="Prix en Ar"/>
                    <a href="#" class="user-btn"><i class="fas fa-money-check-alt"></i></a>
                    <span id="pu" class="champ" ></span>
                </div>
                </div>

                <div style="margin-left:20px; width: 150px;" class="form-group">
                <div class="inputWithIcon">
                    <label>Date d'entrée</label>
                    <input type="date" style="padding-left:40px;"  id="DATEE" class="form-control "  name="DATEE" />
                    <a href="#" class="user-btn"><i class="fas fa-calendar-alt"></i></a>
                    <span id="date" class="champ" ></span>
                </div>
                </div>
                </div>
           
            
                </div>
                <div class="modal-footer">
                <div id="nomprod"></div>
                <div id="test"></div>
                    <input type="hidden" id="QTRESTE" />
                    <input type="hidden" value="<?=session()->get('NUM_UT') ?>" id="NUM_UT" name="NUM_UT" />
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier une entrée</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Produit</label>
                    <select style="padding-left:40px;" name="NUM_PROD" class="form-control NUM_PROD">
                        <?php foreach($produit1 as $row):?>
                        <option value="<?=$row->NUM_PROD;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                        <span id="numprod" class="champ" ></span>
                </div>
                </div>
            

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Fournisseur</label>
                    <select style="padding-left:40px;" name="NUM_F"  class="form-control NUM_F">
                        <?php foreach($fournisseur as $row):?>
                        <option value="<?=$row->NUM_F;?>"><?=$row->NOM;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-address-book"></i></a>
                        <span id="fr1" class="champ" ></span>
                </div>
                </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité à entrer</label>
                    <input type="text"  class="form-control QT_E"  name="QT_E" placeholder="Quantité"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up"></i></a>
                    <span id="qte1" class="champ" ></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Prix unitaire</label>
                    <input type="text"  class="form-control PU"  name="PU" placeholder="Prix unitaire"/>
                    <a href="#" class="user-btn"><i class="fas fa-money-check-alt"></i></a>
                    <span id="pu1" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Date d'entrée</label>
                    <input style="padding-left:40px;" type="date" class="form-control DATEE"  name="DATEE" placeholder="Date d'entrée"/>
                    <a href="#" class="user-btn"><i class="fas fa-calendar-alt"></i></a>
                    <span id="date1" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" class="CAT">
                <input type="hidden" id="NUM_BE" name="NUM_BE" class="NUM_BE">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer une entrée</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer cette entrée?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUMBE" name="NUM_BE" class="NUM_BE">
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
<script src="/assets/ajax/ajaxBe.js"></script> 
<script>

$(document).ready(function() {

$('#cat').on('change',function(){
    var type=$('#cat').val();
    if (type == "Matière première") {
        document.getElementById('aff').style.display='block';
    }else{
        document.getElementById('aff').style.display='none';
    }

});

$("#cat").select2({    
       theme:'bootstrap4',
});

$("#NUM_PROD").select2({    
       theme:'bootstrap4',
});

$("#NUM_F").select2({    
       theme:'bootstrap4',
});

$("#NUM_E").select2({    
       theme:'bootstrap4',
});

});
</script>


</html>