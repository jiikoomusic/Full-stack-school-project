<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Salasanan päivitys</title>
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
      <div style="position:relative; bottom:270px; left:30px;" class="dropdown">
      <button onclick="myFunction()" class="dropbtn">Kirjaudu palveluun</button>
      <div id="myDropdown" class="dropdown-content">
      <a href="login-form.php">Kirjautuminen</a>
      <a href="register-form.php">Rekisteröityminen</a>
      <a href="newpasswordblank.php">Salasanan uusiminen</a>
      </div>
      <! Tähän päättyy dropdown-menu>

        <! Tästä alkaa salasanan tilauslomake>
        <div style="position: relative; top: 240px; left: 680px;" align="center" id="kehys">
        <p>&nbsp;</p>
        <br>
        <br>
        <h3> Tilaa itsellesi uusi salasana! </h3> <br> <br>
        <form id="newpassword" name="newpassword" method="post" action="newpassword.php">
          <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td width="112"><b>Sähköpostiosoitteesi</b></td>
              <td width="188"><input name="email" type="text" class="textfield" id="Sähköpostiosoite" required/></td>
              <tr>
              <td width="112"><b>Kirjautumistunnuksesi</b></td>
              <td width="188"><input name="login" type="text" class="textfield" id="Kirjautumistunnus" required/></td>
            </tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Tilaa uusi salasana" /></td>
            </tr>
          </table>
          <br>
          <br>
          <br>
          <br>
          <a href="register-form.php"><h3>Tästä pääset takaisin rekisteröintilomakkeelle!</h3></a>
          <a href="login-form.php"><h3>Tästä pääset kirjautumaan tunnuksillesi!</h3></a>
          <! Tähän päättyy salasanan tilauslomake>
          </div>

            <! Tästä alkaa dropdownin skriptilinkitys>
            <script src="scripts/script.js">
            </script>
            <! Tähän päättyy dropdownin skriptilinkitys>
</form>
</body>
</html>
