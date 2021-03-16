<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Tilauslomake</title>
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

                <! Tästä alkaa php-toiminnallisuus>
                <?php
                require_once('config.php');

                $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if(!$link) {
                    die ('Virhe yhdistäessä palvelimeen: ' . mysql_error());
                }

                $db = mysqli_select_db($link, DB_DATABASE);
                if(!$db) {
                    die("Virhe valittaessa tietokantaa");
                }

                if($_POST['hupparit']){
                    $qry = "DELETE FROM hupparit WHERE id='$_POST[hupparit]'";
                    $sql = mysqli_query($link, $qry);
                }

                if($sql){
                    echo('');
                }else{
                    echo('Virhe');
                }
                ?>
                <! Tähän päättyy php-toiminnallisuus>

                    <! Tästä alkaa tietojen editointilomake>
                    <div style="position: relative; top: 240px; left: 240px;" align="center" id="tuotehallinta4">
                    <br>
                    <h3>Tuote poistettu valikoimasta!</h3> <br> <br> <br>
                    <a style="position:relative; top:37px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
                    <a style="position:relative; bottom:71px; left:200px;" href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:50px;height:50px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> <br>
                    <a style="position:relative; bottom:200px;" href="admin-index.php"><img src="kuvat/tilaustenhallinta.jpg" style="width:50px;height:50px;"> <h3> Tilausten hallinta </a> </h3> </a> <br>
                    <a style="position:relative; bottom:328px; right:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> <br>
                    <a style="position:relative; bottom:456px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3>    
                    
                    
                    
</div>
</body>
</html>
