<?php
if($_POST) {
$sql = "UPDATE tilauslomake(nimi, osoite, tuote, tuotekoko, shaker700ml, shaker1200ml, proteiinipatukat, lisatietoja, tilaushetki)
 WHERE id=$_GET[id]' SET ('$_POST[nimi]', '$_POST[osoite]', '$_POST[tuote]', '$_POST[tuotekoko]'
, '$_POST[shaker700ml]', '$_POST[shaker1200ml]', '$_POST[proteiinipatukat]', '$_POST[lisatietoja]', '$_POST[tilaushetki]')";
$result = mysqli_query($conn, $sql);

if($result) {
echo("<h3> Tilaus päivitetty onnistuneesti! </h3>");
} }
$sql2 = "SELECT * FROM tilauslomake WHERE id='$_GET[id]'";
$row= mysqli_fetch_array(mysqli_query($conn, $sql2));
?>
<html>
<head>
<link href="css/tyyli.css" rel="stylesheet" type="text/css">
<link href="css/media-query.css" rel="stylesheet" type="text/css">
<title>ADMIN-Tilauksen muutos</title>
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
            <div style="position: relative; top: 240px; left: 240px;" align="center" id="kehys3">
            <br>
            <a href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
            <a href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
            <a href="admin-index.php"><img src="kuvat/tilaustenhallinta.jpg" style="width:50px;height:50px;"> <h3> Tilausten seuranta ja hallinta </a> </h3> </a> <br>
            <a href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:50px;height:50px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> <br>
            <a href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> <br>
            <a href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3> <br> <br>
            <form name="frmUser" method="post" action="">
            <div><?php if(isset($message)) { echo $message; } ?>
            </div>
            <div style="padding-bottom:5px;">
            </div>
            <h4> Tilaajan ID: </h4>
            <input type="hidden" name="tilaajan_id" class="txtField" value="<?php echo $row['tilaajan_id']; ?>">
            <input type="text" name="tilaajan_id"  value="<?php echo $row['tilaajan_id']; ?>">
            <br> <br> 
            <h4> Tilaus ID </h4>
            <input type="text" name="id" class="txtField" value="<?php echo $row['id']; ?>">
            <br> <br>
            <h4> Nimi: </h4>
            <input type="text" name="nimi" class="txtField" value="<?php echo $row['nimi']; ?>">
            <br> <br>
            <h4> Osoite: </h4>
            <input type="text" name="osoite" class="txtField" value="<?php echo $row['osoite']; ?>">
            <br> <br>
            <h4> Tuote: </h4>
            <input type="text" name="tuote" class="txtField" value="<?php echo $row['tuote']; ?>">
            <br> <br>
            <h4> Tuotekoko (S-M / L-XL / XXL-XXXL): </h4>
            <input type="text" name="tuotekoko" class="txtField" value="<?php echo $row['tuotekoko']; ?>">
            <br> <br>
            <h4> Valinnainen tuote: Shaker 700ml </h4>
            <input type="text" name="shaker700ml" class="txtField" value="<?php echo $row['shaker700ml']; ?>">
            <br> <br>
            <h4> Valinnainen tuote: Shaker 1200ml </h4>
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
            <input type="submit" name="submit" value="Submit" class="buttom">
            <! Tähän päättyy lomakkeen muutostiedot ja php-toiminnallisuus>

                <! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
				<! Tähän päättyy dropdownin skriptilinkitys>

</form>
</body>
</html>