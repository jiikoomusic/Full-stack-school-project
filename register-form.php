<?php
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Rekisteröidy palveluun!</title>
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

          <div style="position: relative; top: 240px; left: 680px;" align="center" id="register">

            <! Tästä alkaa php-toiminnallisuus>    
            <?php
              if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                echo '<ul class="err">';
                foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                  echo '<li class="errli">',$msg,'</li>'; 
                }
                echo '</ul>';
                unset($_SESSION['ERRMSG_ARR']);
              }
            ?>
            <br>
            <br>

                <! Tästä alkaa rekisteröitymislomake>              
                <h3> Tervetuloa rekisteröitymään SK-Valmennuspalveluihin! </h3> <br> <br>
                <form id="loginForm" name="loginForm" method="post" action="register-exec.php">
                  <table width="200" border="0" align="center" cellpadding="4" cellspacing="0">
                    <tr>
                      <th>Etunimi </th>
                      <td><input name="fname" type="text" class="textfield" id="fname" required/></td>
                    </tr>
                    <tr>
                      <th>Sukunimi </th>
                      <td><input name="lname" type="text" class="textfield" id="lname" required /></td>
                    </tr>
                    <tr>
                    <tr>
                      <th>Sähköposti </th>
                      <td><input name="email" type="email" class="textfield" id="email" required /></td>
                    </tr>
                    <tr>
                    <th>Postiosoite</th>
                  <td><input name="postiosoite" type="text" class="textfield" id="postiosoite"  required/></td>
                    </tr>
                    <tr>
                    <tr>
                      <th>Kirjautumistunnus</th>
                  <td><input name="login" type="text" class="textfield" id="login"  required/></td>
                    </tr>
                    <tr>
                      <th>Salasana</th>
                      <td><input name="password" type="password" class="textfield" id="password" required/></td>
                    </tr>
                    <tr>
                      <th>Salasana uudelleen </th>
                      <td><input name="cpassword" type="password" class="textfield" id="cpassword" required/></td>
                    </tr>
                    <tr>
                      <td><input type="submit" name="Submit" value="Valmis!" /></td>
                    </tr>
                  </table>  
                    <br>
                    <br>
                    <br>
                    <br>
                    <a href="login-form.php"><h4>Tästä pääset kirjautumaan tunnuksillesi!</h4></a>
                    <! Tähän päättyy rekisteröitymislomake> 

                      <! Tästä alkaa dropdownin skriptilinkitys>
                      <script src="scripts/script.js">
                      </script>
                      <! Tähän päättyy dropdownin skriptilinkitys>

  </div>
</form>
</body>
</html>
