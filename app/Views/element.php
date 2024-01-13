<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include "header.php" ?>
</head>
<body>

<section class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
                <hr style="background-color:#393d42; height:2px;">
					<h3 class="page-title">LISTE D'ELEMENTS DU PRODUIT FINI</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
									
                                    <div style="display:flex; margin-left:-15px; margin-right:-15px; margin-bottom:15px;" >
                                         <div  class="col-auto mr-auto"><button style="background-color:#1f283e;" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modal_Add"><i class="fas  fa-fw fa-plus" > </i>Ajouter</button></div>
                                    </div>
                                    <div class="table-responsive">
									        <table class=" table  table-sm table-bordered table-striped" id="mydata">
                                                <thead>
                                                    <tr>
                                                         <th>MATIERE PREMIERE</th>
                                                         <th>PRODUIT FINI</th>
                                                         <th>QUANTITE NECESSAIRE</th>
                                                         <th>COUT</th>
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
</section>



    <!-- Modal ajout employé-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel élément</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            
            <div class="form-group">
            <div class="inputWithIcon">
                    <label>Matière première</label>
                    <select style="padding-left:40px;"  name="NUM_PROD" id="NUM_PROD" class="form-control" >
                    <option value="">-Matière première-</option>
                        <?php foreach($produit as $row):?>
                        <option value="<?=$row->NUM_PROD;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <span id="mat" class="champ" ></span>
                        <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                        </div>
               
            </div>
            

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Produit fini</label>
                    <select style="padding-left:40px;"  name="PROD_FINI" id="PROD_FINI" class="form-control">
                        <option value="">-Produit fini-</option>
                        <?php foreach($produit1 as $row):?>
                        <option value="<?=$row->DESIGNATION;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                        <span id="prodfini" class="champ" ></span>
                        </div>
            
            </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité nécessaire</label>
                    <input type="text"  id="QT_EL" class="form-control " name="QT_EL" placeholder="Quantité nécessaire"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up "></i></a>
                    <span id="qt_el" class="champ" ></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Coût</label>
                    <input type="text"  id="COUT" class="form-control "  name="COUT" placeholder="Coût"/>
                    <a href="#" class="user-btn"><i class="fas fa-money-check-alt"></i></a>
                    <span id="cout" class="champ" ></span>
                </div>
            </div>
            </div>

        
            <div class="modal-footer">
                <div id="prix"></div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button"  id="btn_save" class="btn btn-primary">Enregistrer</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- fin modal ajout employé-->

    <!-- Modal modification-->
    <form  method="post">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un élément</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Matière première</label>
                    <select style="padding-left:40px;"  name="NUM_PROD"   class="form-control NUM_PROD">
                        <option value="">-Matière première-</option>
                        <?php foreach($produit as $row):?>
                        <option value="<?=$row->NUM_PROD;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                        <span id="mat1" class="champ" ></span>
            </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Produit fini</label>
                    <select style="padding-left:40px;"  name="PROD_FINI"   class="form-control PROD_FINI">
                        <option value="">-Produit-</option>
                        <?php foreach($produit1 as $row):?>
                        <option value="<?=$row->DESIGNATION;?>"><?=$row->DESIGNATION;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-shopping-cart "></i></a>
                        <span id="prof1" class="champ" ></span>
            </div>
            </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Quantité nécessaire</label>
                    <input type="text" class="form-control QT_EL"  name="QT_EL" placeholder="Quantité nécessaire"/>
                    <a href="#" class="user-btn"><i class="fas fa-sort-numeric-up "></i></a>
                    <span id="qt_el1" class="champ" ></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Coût</label>
                    <input type="text"  class="form-control COUT"  name="COUT" placeholder="Coût"/>
                    <a href="#" class="user-btn"><i class="fas fa-money-check-alt"></i></a>
                    <span id="cout1" class="champ" ></span>
                </div>
            </div>


            </div>
            <div class="modal-footer">
                <div id="prix1"></div>
                <input type="hidden" name="ID_EL" class="ID_EL">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button  type="button" id="btn-update" class="btn btn-primary">Modifier</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- fin Modal Modif-->

    <!-- Modal suppression-->
    <form  method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un élément</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous supprimer cet élément?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="ID_EL" name="ID_EL" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- Fin Modal suppression-->

</body>

<script src="/assets/ajax/ajaxElement.js"></script> 
<script>
$(document).ready(function() {
   
    $("#NUM_PROD").select2({    
        theme:'bootstrap4',
});

$("#PROD_FINI").select2({    
        theme:'bootstrap4',
});

    
});
</script>
</html>