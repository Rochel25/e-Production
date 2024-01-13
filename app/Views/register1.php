<!DOCTYPE html>
<html>
<head>
	<title>Insription</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style1.css'); ?>">
	<style>
.reg{
margin-bottom:22px;

margin-top:30px;
}
</style>
	
</head>
<body>

	

	
<section>

	<div class="container1">
	<div class="reg" style="margin-top:20px">
	<h1>S'INSCRIRE</h1>
	<span>ou <a href="/login">SE CONNECTER</a></span>
	
                <form action="/register/save1" method="post">
        <div class="icons">
		<img src="/assets/imgs/logo.png">  
        </div>
		<input type="text" placeholder="Entrer votre nom"name="name" class="form-control" id="InputForName" >
		<select id="select" type="text" class="form-control"  name="role" required>
                    <option value="">Rôle</option>
                    <option value="admin">Admin</option>
                    <option value="utilisateur">utilisateur</option>
					<!-- <option value="RH">R.H</option>
					<option value="Finance">Finance</option> -->
                    </select>
        <input type="email" placeholder="Entrer votre email" name="email"  required>
		<input type="password" id="psw" placeholder="et mot de passe" name="password" required>
		<input id="mdp1" type="checkbox" onclick="show_password()">
        <button class="btn1">S'inscrire</button>
        
    </div>
	
</form>
<div>
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