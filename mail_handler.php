<?php

include('orderinfo.php');

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

$to = "jiikoomusic@gmail.com";

    $nimi=$_POST['nimi'];
    $osoite=$_POST['osoite'];
    $spostiosoite=$_POST['spostiosoite'];
    $tpaidat=$_POST['tpaidat'];
    $hupparit=$_POST['hupparit'];
    $takit=$_POST['takit'];
    $housut=$_POST['housut'];
    $shortsit=$_POST['shortsit'];
    $kengät=$_POST['kengät'];
    $tuotekoko=$_POST['tuotekoko'];
    $kenkäkoko=$_POST['kenkäkoko'];
    $shaker700ml=$_POST['shaker700ml'];
    $shaker1200ml=$_POST['shaker1200ml'];
    $proteiinipatukat=$_POST['proteiinipatukat'];
    $lisatietoja=$_POST['lisatietoja'];
    $sql = "INSERT INTO tilauslomake (tilaajan_id, nimi, osoite, spostiosoite, tpaidat, hupparit, takit, housut, shortsit, kengät, tuotekoko, kenkäkoko, shaker700ml, shaker1200ml, proteiinipatukat, lisatietoja)
    VALUES ('$tilaajan_id', '$nimi', '$osoite', '$spostiosoite', '$tpaidat', '$hupparit', '$takit', '$housut', '$shortsit', '$kengät' , '$tuotekoko', '$kenkäkoko',  '$shaker700ml', '$shaker1200ml', '$proteiinipatukat', '$lisatietoja')";

         $subject = "Tilausvahvistus";
        
         $message = "Kiitos tilauksestasi SK-Palvelut Oy:n verkkokaupasta, tässä tilausvahvistuksesi: <br> <br>";
         $message .= "  <br> Osoite:    <br> " . $osoite ; 
         $message .= " <br> <br> Sähköpostiosoite: <br>    " . $spostiosoite;
         $message .= " <br> <br> T-paita:   <br>  " . $tpaidat;
         $message .= " <br> <br> Huppari:   <br>  " . $hupparit;
         $message .= " <br> <br> Takki:  <br>   " . $takit;
         $message .= " <br> <br> Housut:   <br>  " . $housut;
         $message .= " <br> <br> Shortsit  <br>   " . $shortsit;
         $message .= " <br> <br> Valittu vaatekoko:  <br>   " . $tuotekoko;
         $message .= " <br> <br> Kengät   <br>  " . $kengät;
         $message .= " <br> <br> Valittu kenkäkoko:   <br>  " . $kenkäkoko;
         $message .= " <br> <br> Valinnainen tuote SK-Palvelut Shaker 700ml:   <br>  " . $shaker700ml;
         $message .= " <br> <br> Valinnainen tuote SK-Palvelut Shaker 1200ml:   <br>  " . $shaker1200ml;
         $message .= " <br> <br> Valinnainen tuote proteiinipatukat-mix:   <br>  " . $proteiinipatukat;
         $message .= " <br> <br> Lisätietoja tilaukselle:   <br>  " . $lisatietoja;
         
         $header = "From:info@skpalvelut.fi \r\n";
         $header .= "Cc:tilaus@skpalvelut.fi \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);

         
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }

if ($link->query($sql) === TRUE) {
                echo "<h3> Tilauksesi onnistui! </h3>";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }

            $link->close();

         ?>


