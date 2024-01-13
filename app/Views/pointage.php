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
					<h3 class="page-title">POINTAGE DU PERSONNEL</h3>
                    <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header ">
                                    
                                    <div style="display:flex; margin-left:-15px; margin-right:-10px;" >
                                            <div class="col-auto mr-auto" id="da">
                                            
                                            </div>
                                    </div>
                                    <div class="table-responsive">
									        <table class=" table  table-sm table-bordered table-striped" id="mydata">
                                                <thead>
                                                    <tr>
                                                         <th>EMPLOYE</th>
                                                         <th>SERVICE</th>
                                                         <th>ENTREE MATIN</th>
                                                         <th>SORTIE MATIN</th>
                                                         <th>ENTREE SOIR</th>
                                                         <th>SORTIE SOIR</th>
                                                         <th>OBSERVATION</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="showdata">   
                                                </tbody>
                                            </table>
                                    </div>      
				</div>			
			</div>
		</div>
	</div>
</div>


<form  method="post" >
        <div class="modal fade" id="heureMaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure d'entrée matin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous confirmer?</h4>
               <input type="hidden" id="HEUREENTMA"  class="HEUREENTMA" type="time" name="HEUREENTMA" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-arriv" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
    
    <!-- Modal Add Product-->
    <form  method="post" >
        <div class="modal fade" id="sortma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure de sortie matin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous confirmer?</h4>
               <input type="hidden" id="HEURESORTMA"  class="HEURESORTMA" type="time" name="HEURESORTMA" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-sort1" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->



     <!-- Modal Add Product-->
     <form  method="post" >
        <div class="modal fade" id="entso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure d'entrée soir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous confirmer?</h4>
                <input type="hidden" id="HEUREENTSO"  class="HEUREENTSO" type="time" name="HEUREENTSO" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-ent1" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

    <!-- Modal Add Product-->
    <form  method="post" >
        <div class="modal fade" id="sortso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Heure de sortie soir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous confirmer?</h4>
               <input type="hidden" id="HEURESORTSO"  class="HEURESORTSO" type="time" name="HEURESORTSO" step="2">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-sort2" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

    <!-- Modal Add Product-->
    <form  method="post" >
        <div class="modal fade" id="obsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'observation </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                    <label>Observation</label>
                    <input type="text" id="OBSERVATION" class="form-control" name="OBSERVATION" placeholder="Observation">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="IDPOINTAGE" name="IDPOINTAGE" class="IDPOINTAGE">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-obs" class="btn btn-primary"  >Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->

</body>
<script src="/assets/ajax/ajaxPointage.js"></script> 
</html>