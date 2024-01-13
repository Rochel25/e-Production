<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>	
<section>
	<div class="container">
	<a href="/register1" type="button" class="btn" style=" background-color: #0f0f0faf;  opacity:0.0008;"></a>
	<h1>CONNEXION</h1>
	
	<form action="/login/auth" method="post">
	<div class="icons">
		<img src="/assets/imgs/logo.png">  
        </div>
		<?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger" id="alert"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
  		<input type="text" placeholder="Entrer votre nom" name="name"  required>
		<input type="password" placeholder="et mot de passe" id="psw" name="password" required>
		<input id="mdp" type="checkbox" onclick="show_password()">
		   
        <button id="btn" class="btn">Se connecter</button>
       </form>
    </div>
	</section>
	<script type="text/javascript">
function show_password() {
	var x = document.getElementById("psw");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
} 
</script>
</body>

</html>