<?php
	session_start();
?>

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


            <! Tästä alkaa tilauslomake>
            <div style="position: relative; top: 240px; left: 300px;" align="center" id="order">

            <br> <br>
            <h3> Mikäli mieltäsi askarruttaa jokin asia, voit ottaa yhteyttä
            myös soittamalla numeroon 0400 345 9383 tai laittamalla
            meille sähköpostia osoitteeseen seija@skpalvelut.fi </h3> <br> <br> <br> <br>
        
        
            <?php
            //Hae tietokantayhteyden tiedot
            require_once('config.php');

            //Taulukko, johon varastoidaan varmistusvirheet
            $errmsg_arr = array();

            //Varmistusvirheen lippu
            $errflag = false;

            //Yhdistä mysql–palvelimelle
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
            if(!$link) {
                die('Failed to connect to server: ' . mysqli_error());
            }

            //Valitse tietokanta
            $db = mysqli_select_db($link, DB_DATABASE);
            if(!$db) {
                die("Ei voida valita tietokantaa");
            }

            $tilaajan_id = $_SESSION['SESS_MEMBER_ID'];
            $nimi = $_POST["nimi"];
            $osoite = $_POST["osoite"];
            $spostiosoite= $_POST["spostiosoite"];
            $tpaidat = $_POST["tpaidat"];
            $hupparit = $_POST["hupparit"];
            $takit = $_POST["takit"];
            $housut = $_POST["housut"];
            $shortsit = $_POST["shortsit"];
            $kengät = $_POST["kengät"];
            if(isset($_POST["tuotekoko"])){
            $tuotekoko = $_POST["tuotekoko"];}else{$tuotekoko = "Ei valittu";}
            if(isset($_POST["kenkäkoko"])){
            $kenkäkoko = $_POST["kenkäkoko"];}else{$kenkäkoko = "Ei valittu";}
            if(isset($_POST["shaker700ml"])){
            $shaker700ml = $_POST["shaker700ml"];}else{$shaker700ml = "Ei valittu";}
            if(isset($_POST["shaker1200ml"])){
            $shaker1200ml = $_POST["shaker1200ml"];}else{$shaker1200ml = "Ei valittu";}
            if(isset($_POST["proteiinipatukat"])){
            $proteiinipatukat = $_POST["proteiinipatukat"];}else{$proteiinipatukat = "Ei valittu";}
            if(isset($_POST["lisatietoja"])){
            $lisatietoja = $_POST["lisatietoja"];}else{$lisatietoja = "Ei valittu";}
            $sql = "INSERT INTO tilauslomake (tilaajan_id, nimi, osoite, spostiosoite, tpaidat, hupparit, takit, housut, shortsit, kengät, tuotekoko, kenkäkoko, shaker700ml, shaker1200ml, proteiinipatukat, lisatietoja)
            VALUES ('$tilaajan_id', '$nimi', '$osoite', '$spostiosoite', '$tpaidat', '$hupparit', '$takit', '$housut', '$shortsit', '$kengät' , '$tuotekoko', '$kenkäkoko',  '$shaker700ml', '$shaker1200ml', '$proteiinipatukat', '$lisatietoja')";
            $subject = "Tilausvahvistus";
            $to = $spostiosoite;
            $message = "<h2>Kiitos tilauksestasi SK-Palvelut Oy:n verkkokaupasta, tässä tilausvahvistuksesi: </h2> <br> <br>";
            $message .= " <h3>  <br> Tilaajan nimi:   </h3> <br> " . $nimi ; 
            $message .= " <h3>  <br> Osoite:   </h3> <br> " . $osoite ; 
            $message .= " <h3> <br> <br> Sähköpostiosoite: </h3> <br>    " . $spostiosoite;
            $message .= " <h3> <br> <br> T-paita:  </h3> <br>  " . $tpaidat;
            $message .= " <h3> <br> <br> Huppari: </h3>  <br>  " . $hupparit;
            $message .= " <h3> <br> <br> Takki: </h3> <br>   " . $takit;
            $message .= " <h3> <br> <br> Housut: </h3>  <br>  " . $housut;
            $message .= " <h3> <br> <br> Shortsit: </h3> <br>   " . $shortsit;
            $message .= " <h3> <br> <br> Valittu vaatekoko: </h3> <br>   " . $tuotekoko;
            $message .= " <h3> <br> <br> Kengät: </h3>  <br>  " . $kengät;
            $message .= " <h3> <br> <br> Valittu kenkäkoko: </h3>  <br>  " . $kenkäkoko;
            $message .= " <h3> <br> <br> Valinnainen tuote SK-Palvelut Shaker 700ml: </h3>  <br>  " . $shaker700ml;
            $message .= " <h3> <br> <br> Valinnainen tuote SK-Palvelut Shaker 1200ml: </h3>  <br>  " . $shaker1200ml;
            $message .= " <h3> <br> <br> Valinnainen tuote proteiinipatukat-mix: </h3>  <br>  " . $proteiinipatukat;
            $message .= " <h3> <br> <br> <br> Mikäli haluat muuttaa tilaustasi, voit ottaa yhteyttä sähköpostiin: info@skpalvelut.fi  </h3> <br> <br>";
            $message .= "<h3> Ystävällisin terveisin, <br> SK-Palvelut Oy!</h3>";
            $message .= "<h3> <br> <br> <br> <br> <br> Takaisin SK-Palvelut Oy:n sivuille: https://geronimo.okol.org/~karjon/PHP/skvalmennuslogin/ </h3>";

            $header = "From:info@skpalvelut.fi \r\n";
            $header .= "Cc:tilaus@skpalvelut.fi \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail ($to,$subject,$message,$header);




            if ($link->query($sql) === TRUE) {
                echo "<h3> Tilauksesi onnistui! </h3>";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }

            $link->close();
            ?>
            <br> <br> <br>
            <a href="order.php"><img src="kuvat/tilauslomake.jpg" style="width:100px;height:100px;"> <h3> Takaisin pikatilauslomakkeelle </a> </h3> </a> <br>
            <a href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:100px;height:100px;"> <h3> Etusivulle </a> </h3>  <br>
            <a href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:100px;height:100px;"> <h3> Profiili </a> </h3> <br>
            <a href="logout.php"><img src="kuvat/logout.jpg" style="width:100px;height:100px;"> <h3> Kirjaudu ulos </a> </h3> <br>
            <! Tähän päättyy tilauslomake>

                <! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
                <! Tähän päättyy dropdownin skriptilinkitys>
                