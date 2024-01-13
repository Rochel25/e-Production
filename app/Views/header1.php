<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GESTION DE PRODUCTION</title>
	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/atlantis.css">
	<link rel="stylesheet" href="/assets/css/demo.css">
	<link rel="stylesheet" href="/assets/css/select2.min.css">
	<link rel="stylesheet" href="/assets/css/select2.css">
</head>
<body>
	<div class="wrapper">
		<section>
		<div class="main-header" id="header">
			<!-- Logo Header -->
			<div class="logo-header" >
				
				<a href="index.html" class="logo">
				<img src="/assets/imgs/logo.png" style="margin-left:10px;">  
				</a>
				<button id="icon" class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span  class="navbar-toggler-icon">
						<i  class="icon-menu"></i>
					</span>
				</button>
				<button id="icon" class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button id="icon" class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" >
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<h2>GESTION DE PRODUCTION</h2>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<li class="nav-item">
							<a class="logo" href="/login/logout" >
								<i style="color:rgb(255, 190, 0);font-size:28px;margin-top:10px;" class="fas fa-power-off"></i>
							</a>
						</li>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		</section>

		<!-- Sidebar -->
		<div  class="sidebar sidebar-style-2">			
			<div id="icon"class="sidebar-wrapper scrollbar scrollbar-inner">
				<div  class="sidebar-content">
					<div  class="user">
					<div class="info">
							<a id="info" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<i id="ut" class="fas fa-user-circle"></i><span id="ut1" class="user-level"><?=session()->get('NOM_UT') ?> [<?=session()->get('ROLE') ?>]</span>	
								<input id="user" type="hidden" value="<?=session()->get('ROLE') ?>">
								<span id="carret" class="caret" <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?>></span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav" <?php if(session()->get('ROLE')!='admin') {echo "hidden='true'";} ?>>
									<li>
										<a href="/utilisateur">
										<span class="link-collapse"> Utilisateurs</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<ul  class="nav nav-primary" >

						<li class="nav-item"  id="list" >
							<a  href="/home" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>ACCUEIL</p>
							</a>
						</li>

						<li class="nav-item" >
							<a  href="/produit" class="collapsed" aria-expanded="false">
								<i class="fas fa-dolly"></i>
								<p>STOCKAGE</p>
							</a>
						</li>

						<li id="nav2" class="nav-item">
							<a  href="/fournisseur" class="collapsed" aria-expanded="false">
								<i class="fas fa-upload"></i>
								<p>FOURNISSEUR</p>
							</a>
						</li>

						<li id="nav2" class="nav-item">
							<a  href="/element" class="collapsed" aria-expanded="false">
								<i class="fas fa-toolbox"></i>
								<p>ELEMENT</p>
							</a>
						</li>

						<li id="nav2" class="nav-item">
							<a  href="/bnent" class="collapsed" aria-expanded="false">
								<i class="fas fa-calendar-plus"></i>
								<p>ENTREE</p>
							</a>
						</li>

						<li id="nav2" class="nav-item">
							<a  href="/bnsort" class="collapsed" aria-expanded="false">
								<i class="fas fa-calendar-minus"></i>
								<p>SORTIE</p>
							</a>
						</li>
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Personnel</h4>
						</li>

						<li <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?>  class="nav-item active">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>ETATS</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="/fichestock" class="collapsed">
											<span class="sub-item">FICHE DE STOCK</span>
										</a>
									</li>
									<li>
										<a href="/emprunt" class="collapsed">
											<span class="sub-item">EMPRUNT</span>
										</a>
									</li>
									<li>
										<a href="/etatstock" class="collapsed">
											<span class="sub-item">ETAT DE STOCK</span>
										</a>
									</li>
									<li>
										<a href="/etatfinancier" class="collapsed">
											<span class="sub-item">ETAT FINANCIER</span>
										</a>
									</li>
									<li>
										<a href="/absence" class="collapsed">
											<span class="sub-item">ABSENCE</span>
										</a>
									</li>
									<li>
										<a href="/retard" class="collapsed">
											<span class="sub-item">RETARD</span>
										</a>
									</li>
									<li>
										<a href="/historique" class="collapsed">
											<span class="sub-item">HISTORIQUE DU POINTAGE</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?> id="nav2" class="nav-item">
							<a  href="/employe" class="collapsed" aria-expanded="false">
								<i class="fas fa-users"></i>
								<p>EMPLOYE</p>
							</a>
						</li>
						<li <?php if (session()->get('ROLE')!='admin') {echo "hidden='true'";} ?> id="nav2" class="nav-item">
							<a  href="/service" class="collapsed" aria-expanded="false">
								<i class="fas fa-briefcase"></i>
								<p>SERVICE</p>
							</a>
						</li>
						<li id="nav2" class="nav-item">
							<a  href="/fiche" class="collapsed" aria-expanded="false">
								<i class="fas fa-clipboard-list"></i>
								<p>FICHE TECHNIQUE</p>
							</a>
						</li>
						<!-- <li id="nav2" class="nav-item">
							<a  href="/pointage" class="collapsed" aria-expanded="false">
								<i class="fas fa-address-card"></i>
								<p>POINTAGE</p>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		
	<!--   Core JS Files   -->
	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	
   <script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = false;
			}
		});
	</script>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/js/atlantis.min.js"></script>
	<script src="/assets/js/sweetalert.min.js"></script>
	<!-- jQuery UI -->
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="/assets/Datatables/js/jquery.dataTables.js"></script> 
	<script src="/assets/Datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/js/select2.min.js"></script>
</body>
<script>
	$(document).ready(function () {
   	 	$(".nav-item a")
        	.filter(function() {
            return location.href == this.href;
        })
		
        .parent()
		.addClass("active");
		
	});
</script>

 <!-- <script>
	$(".nav-item").click(function(){
    	$('.active').removeClass('active');
		$(this).addClass('active');
    
	}); 
</script>  -->
</html>