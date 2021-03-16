<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>ADMIN-Tilaushistoria</title>
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
		<a href="login-form.php"> Kirjautuminen</a>
		<a href="register-form.php">Rekisteröityminen</a>
		<a href="newpasswordblank.php">Salasanan uusiminen</a>
		</div>
		<! Tähän päättyy dropdown-menu>

            <! Tästä alkaa profiilin sisäiset linkit ja php-toiminnallisuus>
            <div style="position: relative; top: 240px; right:33px;" align="center" id="kehys3">
            <br>
            <a style="position:relative; top:20px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
            <a style="position:relative; bottom:90px; left:200px;" href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
            <a style="position:relative; bottom:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> <br>
            <a style="position:relative; bottom:328px; right:200px;" href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:50px;height:50px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> <br>
            <a style="position:relative; bottom:456px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3>  
            <h3 style="position:relative; bottom:400px;"> Tässä ajankohtaisesti kaikki tilaukset, jotka on tehty SK-Valmennuspalvelujen verkkokaupassa. </h3> <br> <br> <br>


                <! Tästä alkaa dropdownin skriptilinkitys>
                <script src="scripts/script.js">
                </script>
                <! Tähän päättyy dropdownin skriptilinkitys>


                    <! Tästä alkaa sivun php-toiminnallisuus>
                    <?php 
                    require_once('admin-auth.php');
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


                    $qry1 = "SELECT * FROM tilauslomake";
                    $qry2 = "SELECT * FROM tilauslomake";
                    $qry3 = "SELECT * FROM tilauslomake";
                    $seequl = mysqli_fetch_all(mysqli_query($link, $qry1));
                    $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
                    $seequl3 = mysqli_fetch_all(mysqli_query($link, $qry3));
                    ?>

                    <h3 style="position:relative; bottom:400px;"> Poista tilaus tilauksen ID-numeron ja tilaajan nimen perusteella</h3>
                    <form style="position:relative; bottom:400px;" action="delete-order.php" method="post">
                    <select name="tilaus_id">
                    <?php foreach ($seequl2 as $id): ?>
                    <option value="<?php echo $id[1]; ?>">
                    ID <?php echo $id[1]; ?> / <br> <?php echo $id[2]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista tilaus">
                    </form>

                    <table style="position:relative; bottom:300px;">
                    <thead>
                    <th><h5> Tilaajan ID </h5></th>
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
                    <td><h6><?php echo $file[0];?></h6></td>
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
                    <td><a href="update-processtilaukset.php?tilaus_id=<?php echo $file[1]; ?>">Päivitä tietoja</a></td>
                    </tr>
                    <?php endforeach;
                    
                    ?>
                    <! Tähän päättyy sivun php-toiminnallisuus>
</div>
</body>
</html>



