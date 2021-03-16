<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>ADMIN-Käyttäjätiedot</title>
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
	padding: 8px;
  }
  
  tr:nth-child(even){background-color: #f2f2f2}
  
  th {
	background-color: #d54b4c;
	color: white;
  }

input[type=text], select {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 60%;
  background-color: white;
  color: black;
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

            <! Tästä alkaa profiilin sisäiset linkit ja php-toiminnallisuus>
            <div style="position: relative; top: 240px; left: 440px;" align="center" id="kehys4">
            <br>
            <a style="position:relative; top:20px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
            <a style="position:relative; bottom:90px; left:200px;" href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
            <a style="position:relative; bottom:200px;" href="admin-index.php"><img src="kuvat/tilaustenhallinta.jpg" style="width:50px;height:50px;"> <h3> Tilausten hallinta </a> </h3> </a> <br>
            <a style="position:relative; bottom:328px; right:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> <br>
            <a style="position:relative; bottom:456px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3>  
            <h3> Tässä ajankohtaisesti kaikki käyttäjät, jotka ovat rekisteröityneet SK-Valmennuspalveluihin. </h3> <br> <br> <br>

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


                    $qry1 = "SELECT * FROM members";
                    $qry2 = "SELECT * FROM members";
                    $qry3 = "SELECT * FROM members";
                    $seequl = mysqli_fetch_all(mysqli_query($link, $qry1));
                    $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
                    $seequl3 = mysqli_fetch_all(mysqli_query($link, $qry3));
                    ?>



                        <! Tästä alkaa sivun taulu>
                        <h3 style="position:relative; bottom:400px;"> Poista käyttäjä </h3>
                        <form style="position:relative; bottom:400px;" action="delete-member.php" method="post">
                        <select name="member_id">
                        <?php foreach ($seequl2 as $member_id): ?>
                        <option value="<?php echo $member_id[0]; ?>">
                        ID <?php echo $member_id[0];?> <br> <?php echo $member_id[1];?> 
                        <br> <?php echo $member_id[2];?> 
                    
                        </option>
                        <?php endforeach;?>
                        </select> <br> <br>
                        <input type="submit" value="Poista">
                        </form>


                        <table style="position:relative; bottom:300px;">
                        <thead>
                        <th> Käyttäjän ID </th> 
                        <th> Etunimi </th>
                        <th> Sukunimi </th>
                        <th> Sähköposti </th>
                        <th> Postiosoite </th>
                        <th> Käyttäjätunnus </th>
                        </thead>
                        <tbody>
                        <?php foreach ($seequl as $file): ?>
                        <tr>
                        <td><?php echo $file[0];?></td>
                        <td><?php echo $file[1];?></td>
                        <td><?php echo $file[2];?></td>
                        <td><?php echo $file[3];?></td>
                        <td><?php echo $file[4];?></td>
                        <td><?php echo $file[5];?></td>
                        <td><a href="update-process.php?member_id=<?php echo $file[0]; ?>">Päivitä tietoja</a></td>
                        </tr>
                        <?php endforeach;
                        ?>
                        <! Tähän päätyy sivun taulu>
                        <! Tähän päättyy sivun php-toiminnallisuus>
</div>
</body>
</html>



