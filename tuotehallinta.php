<?php
	require_once('admin-auth.php');
    require_once('config.php');
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>ADMIN-Tuotehallinta</title>
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
		<div style="position:relative; bottom: 290px; left:30px;" class="dropdown">
		<button onclick="myFunction()" class="dropbtn">Kirjaudu palveluun</button>
		<div id="myDropdown" class="dropdown-content">
		<a href="login-form.php">Kirjautuminen</a>
		<a href="register-form.php">Rekisteröityminen</a>
		<a href="newpasswordblank.php">Salasanan uusiminen</a>
		</div>
        <! Tähän päättyy dropdown-menu>		
        

            <! Tästä alkaa tietojen editointilomake>
            <div style="position: relative; top: 240px; left: 230px;" align="center" id="tuotehallinta">
            <br>
            <h2> Tervetuloa SK-Palvelujen tuotehallintaan! </h2>
            <br>
            <h4> Täällä pystyt poistamaan ja lisäämään tuotteita kategorioittain. </h4>
            <a style="position:relative; top:20px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
            <a style="position:relative; bottom:90px; left:200px;" href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Etusivulle </a> </h3>  
            <a style="position:relative; bottom:200px;" href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:50px;height:50px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> 
            <a style="position:relative; bottom:310px; right:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> 
            <a style="position:relative; bottom:418px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3> 
        

            <! Tästä t-paitojen editointi>
            <img style="position:relative; right:180px; top:60px;" src="kuvat/tpaidat.jpg"  width="350px" height="350px">
            <form style="position:relative; left:270px; bottom:340px;" action="filesLogic.php" method="post" enctype="multipart/form-data" >
            <h3>Lisää T-paita valikoimaan </h3>
            <h4>Tuotenimi</h4>
            <input type="text" name="tpaidat"> <br>
            <h4>Tuotteen hinta</h4>
            <input type="text" name="hinta"> <br>
            <h4>Tuotetiedot</h4>
            <input type="textarea" name="tuotetiedot"> <br>
            <h4>Tuotekuva</h4>
            <input type="file" name="myfile"><br><br>
            <button type="submit" name="save">Tallenna tuote</button>
            </form>

            <?php
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysql_error());
            }

            //Select database
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Unable to select database");
            }
            $qry2 = "SELECT * FROM tpaidat";
            $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
            ?>
            <h3 style="position:relative; left:270px; bottom:300px;"> Poista T-paita valikoimasta </h3>
            <form style="position:relative; left:270px; bottom:300px;" action="delete-product.php" method="post">
                <select name="tpaidat">
                    <?php foreach ($seequl2 as $tpaidat): ?>
                        <option value="<?php echo $tpaidat[0]; ?>">
                        <?php echo $tpaidat[1]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista">
                    </form>
                    
                



                    <! Tässä hupparien editointi>
                    <img style="position:relative; right:180px; top:60px;" src="kuvat/hupparit.jpg"  width="350px" height="350px">
            <form style="position:relative; left:270px; bottom:340px;" action="fileshuppari.php" method="post" enctype="multipart/form-data" >
            <h3>Lisää huppari valikoimaan </h3>
            <h4>Tuotenimi</h4>
            <input type="text" name="hupparit"> <br>
            <h4>Tuotteen hinta</h4>
            <input type="text" name="hinta"> <br>
            <h4>Tuotetiedot</h4>
            <input type="textarea" name="tuotetiedot"> <br>
            <h4>Tuotekuva</h4>
            <input type="file" name="myfile"><br><br>
            <button type="submit" name="save">Tallenna tuote</button>
            </form>
            <?php
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysql_error());
            }
        
            //Select database
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Unable to select database");
            }
            $qry2 = "SELECT * FROM hupparit";
            $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
            ?>
            <h3 style="position:relative; left:270px; bottom:340px;"> Poista huppari valikoimasta </h3>
            <form style="position:relative; left:270px; bottom:340px;" action="delete-producthupparit.php" method="post">
                <select name="hupparit">
                    <?php foreach ($seequl2 as $hupparit): ?>
                        <option value="<?php echo $hupparit[0]; ?>">
                        <?php echo $hupparit[1]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista">
                    </form> <br> <br> <br> <br> <br> <br> <br> <br>  


                    <! Tässä takkien editointi>
                    <img style="position:relative; right:180px; top:60px;" src="kuvat/takit.jpg"  width="350px" height="350px">
                    <form style="position:relative; left:270px; bottom:340px;" action="filestakit.php" method="post" enctype="multipart/form-data" >
            <h3>Lisää takki valikoimaan </h3>
            <h4>Tuotenimi</h4>
            <input type="text" name="takit"> <br>
            <h4>Tuotteen hinta</h4>
            <input type="text" name="hinta"> <br>
            <h4>Tuotetiedot</h4>
            <input type="textarea" name="tuotetiedot"> <br>
            <h4>Tuotekuva</h4>
            <input type="file" name="myfile"><br><br>
            <button type="submit" name="save">Tallenna tuote</button>
            </form>
            <?php
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysql_error());
            }
        
            //Select database
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Unable to select database");
            }
            $qry2 = "SELECT * FROM takit";
            $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
            ?>
            <h3 style="position:relative; left:270px; bottom:340px;"> Poista takki valikoimasta </h3>
            <form style="position:relative; left:270px; bottom:340px;" action="delete-producttakit.php" method="post">
                <select name="takit">
                    <?php foreach ($seequl2 as $takit): ?>
                        <option value="<?php echo $takit[0]; ?>">
                        <?php echo $takit[1]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista">
                    </form> <br> <br> <br> <br> <br> <br> <br> <br>  

            <! Tässä housujen editointi>
            <img style="position:relative; right:180px; top:60px;" src="kuvat/housut.jpg"  width="350px" height="350px">
            <form style="position:relative; left:270px; bottom:340px;" action="fileshousut.php" method="post" enctype="multipart/form-data" >
            <h3>Lisää housut valikoimaan </h3>
            <h4>Tuotenimi</h4>
            <input type="text" name="housut"> <br>
            <h4>Tuotteen hinta</h4>
            <input type="text" name="hinta"> <br>
            <h4>Tuotetiedot</h4>
            <input type="textarea" name="tuotetiedot"> <br>
            <h4>Tuotekuva</h4>
            <input type="file" name="myfile"><br><br>
            <button type="submit" name="save">Tallenna tuote</button>
            </form>
            <?php
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysql_error());
            }
        
            //Select database
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Unable to select database");
            }
            $qry2 = "SELECT * FROM housut";
            $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
            ?>
            <h3 style="position:relative; left:270px; bottom:340px;"> Poista housut valikoimasta </h3>
            <form style="position:relative; left:270px; bottom:340px;" action="delete-producthousut.php" method="post">
                <select name="housut">
                    <?php foreach ($seequl2 as $housut): ?>
                        <option value="<?php echo $housut[0]; ?>">
                        <?php echo $housut[1]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista">
                    </form> <br> <br> <br> <br> <br> <br> <br> <br>  

                    <! Tässä shortsien editointi>
                    <img style="position:relative; right:180px; top:60px;" src="kuvat/shortsit.jpg"  width="350px" height="350px">
                    <form style="position:relative; left:270px; bottom:340px;" action="filesshortsit.php" method="post" enctype="multipart/form-data" >
            <h3>Lisää shortsit valikoimaan </h3>
            <h4>Tuotenimi</h4>
            <input type="text" name="shortsit"> <br>
            <h4>Tuotteen hinta</h4>
            <input type="text" name="hinta"> <br>
            <h4>Tuotetiedot</h4>
            <input type="textarea" name="tuotetiedot"> <br>
            <h4>Tuotekuva</h4>
            <input type="file" name="myfile"><br><br>
            <button type="submit" name="save">Tallenna tuote</button>
            </form>
            <?php
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysql_error());
            }
        
            //Select database
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Unable to select database");
            }
            $qry2 = "SELECT * FROM shortsit";
            $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
            ?>
            <h3 style="position:relative; left:270px; bottom:340px;"> Poista shortsit valikoimasta </h3>
            <form style="position:relative; left:270px; bottom:340px;" action="delete-productshortsit.php" method="post">
                <select name="shortsit">
                    <?php foreach ($seequl2 as $shortsit): ?>
                        <option value="<?php echo $shortsit[0]; ?>">
                        <?php echo $shortsit[1]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista">
                    </form> <br> <br> <br> <br> <br> <br> <br> <br>  

                    <! Tässä kenkien editointi>
                    <img style="position:relative; right:180px; top:60px;" src="kuvat/kengat.jpg"  width="350px" height="350px">
                    <form style="position:relative; left:270px; bottom:340px;" action="fileskengät.php" method="post" enctype="multipart/form-data" >
            <h3>Lisää kengät valikoimaan </h3>
            <h4>Tuotenimi</h4>
            <input type="text" name="kengät"> <br>
            <h4>Tuotteen hinta</h4>
            <input type="text" name="hinta"> <br>
            <h4>Tuotetiedot</h4>
            <input type="textarea" name="tuotetiedot"> <br>
            <h4>Tuotekuva</h4>
            <input type="file" name="myfile"><br><br>
            <button type="submit" name="save">Tallenna tuote</button>
            </form>
            <?php
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysql_error());
            }
        
            //Select database
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Unable to select database");
            }
            $qry2 = "SELECT * FROM kengät";
            $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
            ?>
            <h3 style="position:relative; left:270px; bottom:340px;"> Poista kengät valikoimasta </h3>
            <form style="position:relative; left:270px; bottom:340px;" action="delete-productkengät.php" method="post">
                <select name="kengät">
                    <?php foreach ($seequl2 as $kengät): ?>
                        <option value="<?php echo $kengät[0]; ?>">
                        <?php echo $kengät[1]; ?>
                    </option>
                    <?php endforeach;?>
                    </select>
                    <input type="submit" value="Poista">
                    </form> 
            <! Tähän päättyy tietojen editointilomake>

            


                    <! Tästä alkaa dropdownin skriptilinkitys>
                            <script src="scripts/script.js">
                            </script>
                    <! Tähän päättyy dropdownin skriptilinkitys>
  
</div>
</body>
</html>
