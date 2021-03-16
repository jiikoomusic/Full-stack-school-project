<?php
	require_once('auth.php');
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Käyttäjätiedot</title>
<link href="css/tyyli.css" rel="stylesheet" type="text/css">
<link href="css/media-query.css" rel="stylesheet" type="text/css">
</head>
<body>

	<! Tästä alkaa navigointivalikko>
	<ul style="position:relative;">
	<li><a style="position:relative; left:460px;" href="index.html"><h4>Etusivu</h4></a></li>
	<li><a style="position:relative; left:460px;" href="chat.html"><h4>Chat</h4></a></li>
	<li><a style="position:relative; left:460px;" href="valmennuspalvelut.html"><h4>Valmennuspalvelut</h4></a></li>
	<li><a style="position:relative; left:460px;" href="ravintopalvelut.html"><h4>Ravintopalvelut</h4></a></li>
	<li><a style="position:relative; left:460px;" href="kuvagalleria.html"><h4>Kuvagalleria</h4></a></li>
	<li><a style="position:relative; left:460px;" href="treenivideot.html"><h4>Treenivideoita</h4></a></li>
	<li><a style="position:relative; left:460px;" href="tietoaminusta.html"><h4>Tietoa minusta</h4></a></li>
	<li><a style="position:relative; left:460px;" href="yhteystiedot.html"><h4>Yhteystiedot</h4></a></li>
	</ul>
	<! Tähän päättyy navigointivalikko>	

		<! Tästä alkaa dropdown-menu>
		<div style="position:relative; bottom: 290px; left:30px;" class="dropdown">
		<button onclick="myFunction()" class="dropbtn">Kirjaudu palveluun</button>
		<div id="myDropdown" class="dropdown-content">
		<a href="login-form.php">Kirjautuminen</a>
		<a href="register-form.php">Rekisteröityminen</a>
		<a href="newpasswordblank.php">Salasanan uusiminen</a>
		</div>
		<! Tähän päättyy dropdown-menu>

			<! Tästä alkaa profiilin sisäiset linkit ja php-toiminnallisuus>
			<div style="position: relative; top: 240px; left: 240px;" align="center" id="kehys2">
			<p> <h4>Tämä on salasanasuojattu palvelu vain jäsenillemme. </h4></p><br>
			<h1>Tervetuloa <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
			<br> 
			<a style="position:relative; top:30px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:100px;height:100px;"> <h3> Profiilini </a> </h3> 
			<a style="position:relative; top:50px; left:300px;" href="tuotteet.html"><img src="kuvat/tuote.png" style="width:100px;height:100px;"> <h3> Tuotteet </a> </h3> 
			<a style="position:relative; bottom:110px;"  href="order.php"><img src="kuvat/tilauslomake.jpg" style="width:100px;height:100px;"> <h3> Tilauslomakkeelle </a> </h3> </a> 
			<a style="position:relative; bottom:70px; left:300px;" href="admin-index.php"><img src="kuvat/tilaustenhallinta.jpg" style="width:100px;height:100px;"> <h3> Tilausten seuranta ja hallinta </a> </h3> </a> 
			<a style="position:relative; bottom:430px; right:300px;" href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:100px;height:100px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> 
			<a style="position:relative; bottom:390px; right:300px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:100px;height:100px;"> <h3> Tuotehallinta </a> </h3> </a> 
			<a style="position:relative; bottom:550px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:100px;height:100px;"> <h3> Kirjaudu ulos </a> </h3> </a> 
			<! Tähän päättyy profiilin sisäiset linkit ja php-toiminnallisuus>

				<! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
				<! Tähän päättyy dropdownin skriptilinkitys>

</div>
</body>
</html>
