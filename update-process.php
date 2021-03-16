<?php
include_once 'database.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE members set member_id='" . $_POST['member_id'] . "', firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "' ,postiosoite='" . $_POST['postiosoite'] . "' WHERE member_id='" . $_POST['member_id'] . "'");
$message = "<h2> Tiedot päivitetty onnistuneesti! </h3";
}
$result = mysqli_query($conn,"SELECT * FROM members WHERE member_id='" . $_GET['member_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<link href="css/tyyli.css" rel="stylesheet" type="text/css">
<link href="css/media-query.css" rel="stylesheet" type="text/css">
<title>ADMIN-Käyttäjätietojen muutos</title>
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
            <h4> Käyttäjä ID: </h4>
            <input type="hidden" name="member_id" class="txtField" value="<?php echo $row['member_id']; ?>">
            <input type="text" name="member_id"  value="<?php echo $row['member_id']; ?>">
            <br> <br> 
            <h4> Etunimi: </h4>
            <input type="text" name="firstname" class="txtField" value="<?php echo $row['firstname']; ?>">
            <br> <br>
            <h4> Sukunimi: </h4>
            <input type="text" name="lastname" class="txtField" value="<?php echo $row['lastname']; ?>">
            <br> <br>
            <h4> Sähköposti: </h4>
            <input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
            <br> <br>
            <h4> Postiosoite: </h4>
            <input type="text" name="postiosoite" class="txtField" value="<?php echo $row['postiosoite']; ?>">
            <br> <br>
            <h4> Käyttäjätunnus: </h4>
            <input type="text" name="login" class="txtField" value="<?php echo $row['login']; ?>">
            <br> <br>
            <h4> Admin-oikeudet (1 = täydet oikeudet, 0 = ei oikeuksia) </h4>
            <input type="text" name="admin" class="txtField" value="<?php echo $row['admin']; ?>">
            <br> <br>
            <input type="submit" name="submit" value="Submit" class="buttom">
            <! Tähän päättyy lomakkeen muutostiedot ja php-toiminnallisuus>

                <! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
				<! Tähän päättyy dropdownin skriptilinkitys>

</form>
</body>
</html>