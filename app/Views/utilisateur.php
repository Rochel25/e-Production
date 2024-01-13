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
					<h3 class="page-title">LISTE DES UTILISATEURS</h3>
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
                                                         <th>NOM D'UTILISATEUR</th>
                                                         <th>ROLE</th>
                                                         <th>EMAIL</th>
                                                         <th>MOT DE PASSE</th>
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
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom d'utilisateur</label>
                    <input type="text"  id="NOM" class="form-control"  name="NOM" placeholder="Nom"/>
                    <a href="#" class="user-btn"><i class="fas fa-user  "></i></a>
                    <span id="nom" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Rôle</label>
                    <select style="padding-left:40px;"  name="ROLE"  id="ROLE" class="form-control">
                        <option value="">-Rôle-</option>
                        <option value="admin">admin</option>
                        <option value="utilisateur">utilisateur</option>
                        <!-- <option value="RH">R.H</option>
					    <option value="Finance">Finance</option> -->
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                        <span id="role" class="champ" ></span>
                </div>
            </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Email</label>
                    <input style="padding-left:40px;" type="email"  id="MAIL" class="form-control"  name="MAIL" placeholder="Email"/>
                    <a href="#" class="user-btn"><i class="fas fa-envelope"></i></a>
                    <span id="mail" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Mot de passe</label>
                    <input  style="padding-left:40px;" type="text"  id="MDP" class="form-control"  name="MDP" placeholder="Mot de passe"/>
                    <a href="#" class="user-btn"><i class="fas fa-key"></i></a>
                    <span id="mdp" class="champ" ></span>
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Nom d'utilisateur</label>
                    <input type="text"  id="NOM" class="form-control NOM"  name="NOM" placeholder="Nom"/>
                    <a href="#" class="user-btn"><i class="fas fa-user  "></i></a>
                    <span id="nom1" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Rôle</label>
                    <select style="padding-left:40px;"  name="ROLE"  id="ROLE" class="form-control ROLE">
                        <option value="">-Rôle-</option>
                        <option value="admin">admin</option>
                        <option value="utilisateur">utilisateur</option>
                        <!-- <option value="RH">R.H</option>
					    <option value="Finance">Finance</option> -->
                        </select>
                        <a href="#" class="user-btn"><i class="fas fa-suitcase  "></i></a>
                        <span id="role1" class="champ" ></span>
                </div>
            </div>
                
            <div class="form-group">
                <div class="inputWithIcon">
                    <label>Email</label>
                    <input style="padding-left:40px;" type="email"  id="MAIL" class="form-control MAIL"  name="MAIL" placeholder="Email"/>
                    <a href="#" class="user-btn"><i class="fas fa-envelope"></i></a>
                    <span id="mail1" class="champ" ></span>
                </div>
            </div>

            <div class="form-group">
                <div class="inputWithIcon" >
                    <label>Mot de passe</label>
                    <input type="text"  id="MDP1" class="form-control MDP"  name="MDP" placeholder="Mot de passe"/>
                    <a href="#" class="user-btn"><i class="fas fa-key"></i></a>
                    <span id="mdp1" class="champ" ></span>
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_UT" name="NUM_UT" class="NUM_UT">
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
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Voulez-vous supprimer cet utilisateur?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="NUM_UT" name="NUM_UT" class="NUM_UT">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <button type="button"  id="btn-delete" class="btn btn-primary">Oui</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- Fin Modal suppression-->

</body>
<script type="text/javascript">
function show_password() {
	var x = document.getElementById("MDP1");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
} 
</script>
<script src="/assets/ajax/ajaxUtilisateur.js"></script> 
</html>