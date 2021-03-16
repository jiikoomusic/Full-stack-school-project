<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Salasanan vaihto</title>
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


			<! Tästä alkaa salasanan tilauspalvelu ja sen php-toiminnallisuus>
			<div style="position: relative; top: 240px; left: 680px;" align="center" id="kehys">



			<?php
			$servername = "localhost";
			$username = "karjon";
			$password = "karjon321";
			$dbname = "karjon";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			die("Yhteys katkaistu: " . $conn->connect_error);
			}

			$login = ($_POST['login']);
			$email = ($_POST['email']);
			$newpassword1 = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . rand(100, 100000);
			$newpassword2 = md5($newpassword1);
			echo "Uusi salasana lähetetty sähköpostiisi!" ;

			$subject = "Uusi salasanasi";
            $to = $email;
			$message = "Tässä uusi salasanasi SK-Palvelut Oy:n asiakasportaaliin: <br> <br>";
			$message .= "Käyttäjätunnus: <br>";
			$message .= $login . "<br> <br> <br>";
			$message .= "Salasana: <br>";
			$message .= $newpassword1 . "<br> <br> <br>";
			$message .= "Tervetuloa kirjautumaan palveluumme: <br>";
			$message .= "https://geronimo.okol.org/~karjon/PHP/skvalmennuslogin/login-form.php <br> <br> <br>";
			$message .= "Ystävällisin terveisin, <br>";
			$message .= "SK-Palvelut Oy"; 
            $header = "From:info@skpalvelut.fi \r\n";
            $header .= "Cc:tilaus@skpalvelut.fi \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail ($to,$subject,$message,$header);

			$sql = "UPDATE members SET passwd='$newpassword2' WHERE login='$login'";

			if ($conn->query($sql) === TRUE) {
			echo "<br> <h4> Salasana vaihdettu! </h4>";
			} else {
			echo "Salasanan päivityksessä tapahtui odottamaton virhe: " . $conn->error;
			}

			$conn->close();
			?>
			<br>
			<br>
			<img src="kuvat/profiili.jpg" style="width:100px;height:100px;"> <br>
			<br>
			<br>
			<a href="login-form.php"><h3>Tästä pääset kirjautumaan tunnuksillesi!</h3></a> 
			<a href="register-form.php"><h3>Tästä pääset takaisin rekisteröintilomakkeelle!</h3></a>
			<! Tähän päättyy salasanan tilauspalvelu ja sen php-toiminnallisuus>

				<! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
				<! Tähän päättyy dropdownin skriptilinkitys>
</div>
</body>
</html>