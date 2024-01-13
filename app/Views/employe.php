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
					<h3 class="page-title">LISTE DES EMPLOYES</h3>
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
                                                         <th>N° EMPLOYE</th>
                                                         <th>NOM EMPLOYE</th>
                                                         <th>SERVICE</th>
                                                         <th>TEL</th>
                                                         <th>ACTION</th>
                                                         </tr>
                                                </thead>
                                                <tbody id="showdata">
                                                </tbody>
                                            </table>
				
                 </div>
			</div>
		</div>
	</div>
</section>



    <!-- Modal ajout employé-->
     <form   method="post">  
        <div class="modal fade" id="Modal_Add" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Service</label>
                    <select style="padding-left:40px;"  name="NUM_SERV"  id="NUM_SERV" class="form-control">
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
                    <label>Nom et prénoms</label>
                    <input type="text"  id="NOM" class="form-control "  name="NOM" placeholder="Nom + prénoms"/>
                    <a href="#" class="user-btn"><i class="fas fa-user  "></i></a>
                    <span id="nom" class="champ" ></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Contact</label>
                    <input type="text"  id="TEL" class="form-control "  name="TEL" placeholder="Contact"/>
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
    <!-- fin modal ajout employé-->

    <!-- Modal modification-->
    <form  method="post">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Service</label>
                    <select name="NUM_SERV" style="padding-left:40px;" class="form-control NUM_SERV">
                        <?php foreach($service as $row):?>
                        <option value="<?=$row->NUM_SERV;?>"><?=$row->RESP;?></option>
                        <?php endforeach;?>
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                </div>
                </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom et Prénoms</label>
                    <input type="text"  class="form-control NOM"  name="NOM" placeholder="Nom et prénoms"/>
                    <a href="#" class="user-btn"><i class="fas fa-user  "></i></a>
                    <span id="nom" class="champ" ></span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Contact</label>
                    <input type="text"  class="form-control TEL"  name="TEL" placeholder="Contact"/>
                    <a href="#" class="user-btn"><i class="fas fa-phone"></i></a>
                    <span id="tel" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_EMP" name="NUM_EMP" class="NUM_EMP">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un employé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous supprimer cet employé?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_EMP" name="NUM_EMP" class="NUM_EMP">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- Fin Modal suppression-->

</body>
<script src="/assets//ajax/ajaxEmploye.js"></script> 
<script>
$(document).ready(function() {
    $("#NUM_SERV").select2({    
        theme:'bootstrap4',
    });
});
</script>
</html>