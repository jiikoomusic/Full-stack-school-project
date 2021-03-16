<!DOCTYPE html>
<html>
<head>
<body>
<style>
table {
    border-collapse: collapse;
	width: 100%;
  }
  
  th, td {
    text-align: left;
    border: 3px solid #000000;
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
<! Tässä tiedoston charset-määritykset, jotta ääkköset toimii>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<! Tähän päättyy kielimääritykset>


	<! Tässä mobiiliskaalaus>
	<meta name="viewport" content="width=device-width, initial-scale=0.315">
	<! Tähän päättyy mobiiliskaalaus>


		<link href="css/tyyli.css" rel="stylesheet" type="text/css">
		<link href="css/media-query.css" rel="stylesheet" type="text/css">
		<title>Housut</title>
		</head>
						

			<! Tästä alkaa navigointivalikko>
			<ul style="position:relative;">
			<li><a style="position:relative; left:450px;" href="index.html"><h4>Etusivu</h4></a></li>
			<li><a style="position:relative; left:450px;" href="chat.html"><h4>Chat</h4></a></li>
			<li><a style="position:relative; left:450px;" href="valmennuspalvelut.html"><h4>Valmennuspalvelut</h4></a></li>
			<li><a style="position:relative; left:450px;" href="ravintopalvelut.html"><h4>Ravintopalvelut</h4></a></li>
			<li><a style="position:relative; left:450px;" href="kuvagalleria.html"><h4>Kuvagalleria</h4></a></li>
			<li><a style="position:relative; left:450px;" href="treenivideot.html"><h4>Treenivideoita</h4></a></li>
			<li><a style="position:relative; left:450px;" href="tietoaminusta.html"><h4>Tietoa minusta</h4></a></li>
			<li><a style="position:relative; left:450px;" href="yhteystiedot.html"><h4>Yhteystiedot</h4></a></li>
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
			
            <br>

				<! Tästä alkaa sivun php-toiminnallisuus>
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


				$qry1 = "SELECT * FROM housut";
				$qry2 = "SELECT * FROM housut";
				$qry3 = "SELECT * FROM housut";
				$seequl = mysqli_fetch_all(mysqli_query($link, $qry1));
				$seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
				$seequl3 = mysqli_fetch_all(mysqli_query($link, $qry3));
				?>



					<! Tästä alkaa sivun taulu> 
                <div style="position: relative; top:240px; left: 240px;" align="center" id="kehys44">
                <a style="position:relative; top:50px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
                <a style="position:relative; bottom:65px; left:200px;" href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
                <a style="position:relative; bottom:180px;" href="admin-index.php"><img src="kuvat/tilaustenhallinta.jpg" style="width:50px;height:50px;"> <h3> Tilausten hallinta </a> </h3> </a> <br>
                <a style="position:relative; bottom:312px; right:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> <br>
				<a style="position:relative; bottom:444px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3> 
				<br> <br>   <a href="tuotteet.html"> <h3> Tästä pääset selaamaan muita tuotteita </a> </h3>  
                <table>
                <thead>
                <th> Tuotenimi</th> 
                <th> Hinta </th>
                <th> Tuotetiedot </th>
                <th> Kuva </th>
                </thead>
                <tbody>
                <?php foreach ($seequl as $file): ?>
                <tr>
                <td><h3><?php echo $file[1];?></h3></td>
                <td><h4><?php echo $file[2];?></h4></td>
                <td><h4><?php echo $file[4];?></h4></td>
                <td><img src="<?php echo 'uploads/' . $file[3] ?>" width="400" height="400" alt=""> </td>
                
                </tr>
                <?php endforeach;
                ?>
                <! Tähän päätyy sivun taulu>
                <! Tähän päättyy sivun php-toiminnallisuus>

						<! Tästä alkaa dropdownin skriptilinkitys>
						<script src="scripts/script.js">
						</script>
						<! Tähän päättyy dropdownin skriptilinkitys>

												
</meta>											
</body>
</html>