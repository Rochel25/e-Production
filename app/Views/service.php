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
					<h3 class="page-title">LISTE DE SERVICES</h3>
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
                                                         <th>N° SERVICE</th>
                                                         <th>DEPARTEMENT</th>
                                                         <th>RESPONSABILITE</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Departement</label>
                    <input type="text"  id="DEPARTEMENT" class="form-control " name="DEPARTEMENT" placeholder="Departement" >
                    <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                    <span id="dep" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Responsabilité</label>
                    <input type="text"  id="RESP" class="form-control "  name="RESP" placeholder="Responsabilité" />
                    <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                    <span id="resp" class="champ" ></span>
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier un service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Departement</label>
                    <input type="text"  id="DEPARTEMENT" class="form-control DEPARTEMENT" name="DEPARTEMENT" placeholder="Departement" >
                    <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                    <span id="dep1" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Responsabilité</label>
                    <input type="text"  id="RESP" class="form-control RESP"  name="RESP" placeholder="Responsabilité" />
                    <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                    <span id="resp1" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_SERV" name="NUM_SERV" class="NUM_SERV">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Voulez-vous supprimer ce service?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_SERV" name="NUM_SERV" class="NUM_SERV">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

    
  

</body>
<script src="/assets/ajax/ajaxService.js"></script> 
</html>