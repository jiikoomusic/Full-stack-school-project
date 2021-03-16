<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Kirjaudu palveluun</title>
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


      <! Tästä alkaa kirjautumislomake>
        <div style="position: relative; top: 240px; left: 680px;" align="center" id="kehys">
        <br>
        <br>
        <h3> Tervetuloa kirjautumaan SK-Valmennuspalveluihin! </h3> <br> <br>
        <form id="loginForm" name="loginForm" method="post" action="login-exec.php">
          <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td width="112"><b>Tunnus</b></td>
              <td width="188"><input name="login" type="text" class="textfield" id="login" required/></td>
            </tr>
            <tr>
              <td><b>Salasana</b></td>
              <td><input name="password" type="password" class="textfield" id="password" required/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Kirjaudu" /></td>
            </tr>
          </table>
          <br>
        <br>
        <br>
        <br>
        <a href="newpasswordblank.php"> <h4>Salasana unohtunut? Tilaa tästä uusi!</h4></a>
        <a href="register-form.php"><h4>Tästä pääset takaisin rekisteröintilomakkeelle!</h4></a>
        </div>
        <! Tähän päättyy kirjautumislomake>


          <! Tästä alkaa dropdownin skriptilinkitys>
          <script src="scripts/script.js">
          </script>
          <! Tähän päättyy dropdownin skriptilinkitys>
</form>
</body>
</html>
