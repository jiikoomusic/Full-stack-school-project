<?php
	require_once('auth.php');
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Profiilisi</title>
<link href="css/tyyli.css" rel="stylesheet" type="text/css">
<link href="css/media-query.css" rel="stylesheet" type="text/css">
</head>
<body>
<style>
table {
	border-collapse: collapse;
	width: 100%;
  }
  
  th, td {
  text-align: left;
  border: 1px solid #ddd;
	padding: 8px;
  }
  
  tr:nth-child(even){background-color: #f2f2f2}
  
  th {
	background-color: #d54b4c;
	color: white;
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
		<a href="login-form.php">Kirjautuminen</a>
		<a href="register-form.php">Rekisteröityminen</a>
		<a href="newpasswordblank.php">Salasanan uusiminen</a>
		</div>
		<! Tähän päättyy dropdown-menu>		

			<! Tästä alkaa linkit tiedoston sisällä>
			<div style="position: relative; top: 240px; right: 33px;" align="center" id="memberprofile">
			<h1>Profiilini </h1> 
			<a href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
			<a href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3>  
			<p>Tämä on suojattu sivusto. </p> <br> <br>

			<h2> Käyttäjätiedot </h2>
			<h4>Etunimi: <?php echo $_SESSION['SESS_FIRST_NAME'];?></h4>
			<h4>Sukunimi: <?php echo $_SESSION['SESS_LAST_NAME'];?></h4>
			<h4>Sähköposti: <?php echo $_SESSION['SESS_EMAIL'];?></h4>
			<h4>Postiosoite: <?php echo $_SESSION['SESS_POSTIOSOITE'];?></h4> <br> <br> <br> <br>
			<h2> Tilaushistoriasi </h2>





			<?php 
                    require_once('config.php');


                    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
                    if(!$link) {
                        die('Virhe yhdistäessä serverille: ' . mysql_error());
                    }

                    //Select database
                    $db = mysqli_select_db($link, DB_DATABASE);
                    if(!$db) {
                        die("Virhe yhdistäessä tietokantaan");
                    }
					$spostiosoite = ($_SESSION['SESS_EMAIL']);
                    $qry1 = "SELECT * FROM tilauslomake WHERE spostiosoite = '$spostiosoite'";
                    $seequl = mysqli_fetch_all(mysqli_query($link, $qry1));
					?>
					

					<table style="position:relative;">
                    <thead>
                    <th><h5> Tilauksen ID </h5></th>
                    <th><h5> Tilaajan nimi </h5> </th>
                    <th><h5> Osoite </h5> </th>
                    <th><h5> Sähköpostiosoite </h5> </th>
                    <th><h5> T-paita </h5> </th>
                    <th><h5> Huppari </h5> </th>
                    <th><h5> Takki </h5> </th>
                    <th><h5> Housut </h5> </th>
                    <th><h5> Shortsit </h5> </th>
                    <th><h5> Kengät </h5> </th>
                    <th><h5> Tuotekoko </h5> </th>
                    <th><h5> Kenkäkoko </h5> </th>
                    <th><h5> Valinnaistuote: Shaker 700ml </h5> </th>
                    <th><h5> Valinnaistuote: Shaker 1200ml </h5> </th>
                    <th><h5> Valinnaistuote: Proteiinipatukat </h5> </th>
                    <th><h5> Lisätietoja </h5> </th>
                    <th><h5> Tilausaika </h5> </th>
                    <th>  </th>
                    </thead>
                    <tbody>
                    <?php foreach ($seequl as $file): ?>
                    <tr>
                    <td><h6><?php echo $file[1];?></h6></td>
					<td><h6><?php echo $file[2];?></h6></td>
					<td><h6><?php echo $file[3];?></h6></td>
					<td><h6><?php echo $file[4];?></h6></td>
					<td><h6><?php echo $file[5];?></h6></td>
					<td><h6><?php echo $file[6];?></h6></td>
					<td><h6><?php echo $file[7];?></h6></td>
					<td><h6><?php echo $file[8];?></h6></td>
					<td><h6><?php echo $file[9];?></h6></td>
					<td><h6><?php echo $file[10];?></h6></td>
					<td><h6><?php echo $file[11];?></h6></td>
					<td><h6><?php echo $file[12];?></h6></td>
					<td><h6><?php echo $file[13];?></h6></td>
					<td><h6><?php echo $file[14];?></h6></td>
					<td><h6><?php echo $file[15];?></h6></td>
					<td><h6><?php echo $file[16];?></h6></td>
					<td><h6><?php echo $file[17];?></h6></td>
                    </tr>
                    <?php endforeach;
                    
                    ?>
			<! Tähän päättyy linkit tiedoston sisällä>

				<! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
				<! Tähän päättyy dropdownin skriptilinkitys>

</div>
</body>
</html>
