<?php
include_once 'database.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tilauslomake SET nimi='" . $_POST['nimi'] . "', osoite='" . $_POST['osoite'] . "', spostiosoite='" . $_POST['spostiosoite'] . "', tpaidat='" . $_POST['tpaidat'] . "' ,hupparit='" . $_POST['hupparit'] . "' ,takit='" . $_POST['takit'] . "' ,housut='" . $_POST['housut'] . "' ,shortsit='" . $_POST['shortsit'] . "' ,kengät='" . $_POST['kengät'] . "' ,tuotekoko='" . $_POST['tuotekoko'] . "' ,kenkäkoko='" . $_POST['kenkäkoko'] . "' ,shaker700ml='" . $_POST['shaker700ml'] . "' ,shaker1200ml='" . $_POST['shaker1200ml'] . "' ,proteiinipatukat='" . $_POST['proteiinipatukat'] . "' ,lisatietoja='" . $_POST['lisatietoja'] . "' ,tilaushetki='" . $_POST['tilaushetki'] . "' WHERE tilaus_id='" . $_POST['tilaus_id'] . "'");
$message = "<h2> Tiedot päivitetty onnistuneesti! </h3";
}
$result = mysqli_query($conn,"SELECT * FROM tilauslomake WHERE tilaus_id='" . $_GET['tilaus_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<link href="css/tyyli.css" rel="stylesheet" type="text/css">
<link href="css/media-query.css" rel="stylesheet" type="text/css">
<title>ADMIN-Tilausten muutos</title>
</head>
<body>
<style>
input[type=text], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 80%;
  background-color: #d54b4c;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>

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
		<a href="login-form.php"> Kirjautuminen</a>
		<a href="register-form.php">Rekisteröityminen</a>
		<a href="newpasswordblank.php">Salasanan uusiminen</a>
		</div>
		<! Tähän päättyy dropdown-menu>



             <! Tästä alkaa lomakkeen muutostiedot ja php-toiminnallisuus>
             <div style="position: relative; top: 240px; left: 230px;" align="center" id="tuotehallinta">
            <br>
            <br>
            <h4> Täällä pystyt poistamaan ja lisäämään tuotteita kategorioittain. </h4>
            <a style="position:relative; top:20px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
            <a style="position:relative; bottom:90px; left:200px;" href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
            <a style="position:relative; bottom:200px;" href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:50px;height:50px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> 
            <a style="position:relative; bottom:310px; right:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> 
            <a style="position:relative; bottom:418px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3> 
        
            <form style="position:relative; bottom:300px;" name="frmUser" method="post" action="">
            <div><?php if(isset($message)) { echo $message; } ?>
            </div>
            <div style="padding-bottom:5px;">
            </div>
            <h4> Tilauksen ID: </h4>
            <input type="hidden" name="tilaus_id" class="txtField" value="<?php echo $row['tilaus_id']; ?>">
            <input type="text" name="tilaus_id"  value="<?php echo $row['tilaus_id']; ?>">
            <br> <br> 
            <h4> Nimi: </h4>
            <input type="text" name="nimi" class="txtField" value="<?php echo $row['nimi']; ?>">
            <br> <br>
            <h4> Osoite: </h4>
            <input type="text" name="osoite" class="txtField" value="<?php echo $row['osoite']; ?>">
            <br> <br>
            <h4> Sähköpostiosoite: </h4>
            <input type="text" name="spostiosoite" class="txtField" value="<?php echo $row['spostiosoite']; ?>">
            <br> <br>
            <h4> T-Paidat: </h4>
            <input type="text" name="tpaidat" class="txtField" value="<?php echo $row['tpaidat']; ?>">
            <br> <br>
            <h4> Hupparit: </h4>
            <input type="text" name="hupparit" class="txtField" value="<?php echo $row['hupparit']; ?>">
            <br> <br>
            <h4> Takit: </h4>
            <input type="text" name="takit" class="txtField" value="<?php echo $row['takit']; ?>">
            <br> <br>
            <h4> Housut: </h4>
            <input type="text" name="housut" class="txtField" value="<?php echo $row['housut']; ?>">
            <br> <br>
            <h4> Shortsit: </h4>
            <input type="text" name="shortsit" class="txtField" value="<?php echo $row['shortsit']; ?>">
            <br> <br>
            <h4> Kengät: </h4>
            <input type="text" name="kengät" class="txtField" value="<?php echo $row['kengät']; ?>">
            <br> <br>
            <h4> Tuotekoko: </h4>
            <input type="text" name="tuotekoko" class="txtField" value="<?php echo $row['tuotekoko']; ?>">
            <br> <br>
            <h4> Kenkäkoko: </h4>
            <input type="text" name="kenkäkoko" class="txtField" value="<?php echo $row['kenkäkoko']; ?>">
            <br> <br>
            <h4> Valinnainen tuote: SK-Palvelut Shaker 700ml </h4>
            <input type="text" name="shaker700ml" class="txtField" value="<?php echo $row['shaker700ml']; ?>">
            <br> <br>
            <h4> Valinnainen tuote: SK-Palvelut Shaker 1200ml </h4>
            <input type="text" name="shaker1200ml" class="txtField" value="<?php echo $row['shaker1200ml']; ?>">
            <br> <br>
            <h4> Valinnainen tuote: Proteiinipatukka-mix </h4>
            <input type="text" name="proteiinipatukat" class="txtField" value="<?php echo $row['proteiinipatukat']; ?>">
            <br> <br>
            <h4> Lisätietoja: </h4>
            <input type="text" name="lisatietoja" class="txtField" value="<?php echo $row['lisatietoja']; ?>">
            <br> <br>
            <h4> Tilaushetki: </h4>
            <input type="text" name="tilaushetki" class="txtField" value="<?php echo $row['tilaushetki']; ?>">
            <br> <br>
            <input type="submit" name="submit" value="Päivitä tiedot" class="button">
            <! Tähän päättyy lomakkeen muutostiedot ja php-toiminnallisuus>

                <! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
				<! Tähän päättyy dropdownin skriptilinkitys>

</form>
</body>
</html>