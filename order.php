
<?php
require_once('config.php');
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysql_error());
    }

    //Select database
    $db = mysqli_select_db($link, DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }
    ?>

<head>

<style> 
input[type=button], input[type=submit], input[type=reset] {
  background-color: #d54b4c;
  border: none;
  color: white;
  width:200px;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Pikatilauslomake</title>
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
      <div style="position: relative; top: 240px; left: 280px;" align="center" id="order">
      <br>
      <a style="position: relative; left:200px;" href="member-index.php"><img src="kuvat/etusivulle.jpg" style="width:50px;height:50px;"> <h3> Palvelun etusivulle </a> </h3>  
			<a style="position: relative; bottom:115px; right:240px;" href="tuotteet.html"><img src="kuvat/tuote.png" style="width:50px;height:50px;"> <h3> Tuotteet </a> </h3> </a> 
      <a style="position: relative; right:20px; bottom:220px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3>  



  


      <h3 style="position:relative; bottom:200px;"> Tervetuloa SK-Valmennuspalvelujen tilauslomakkeelle! </h3> <br> <br>  

      <form style="position:relative; bottom:200px;" action="orderinfo.php" method="post">

        <label style="position:relative; right:470px;" for="nimi"><h3>Tilaajan nimi:</h3></label><br>
        <input style="position:relative; right:470px;" type="text" id="nimi" name="nimi" required><br> <br> <br>

        <label style="position:relative; right:470px; top:50px;" for="osoite"><h3>Tilaajan osoite:</h3></label><br>
        <input style="position:relative; right:470px; top:50px;" type="text" id="osoite" name="osoite" required><br> <br> <br>

        <label style="position:relative; right:470px; top:100px;" for="spostiosoite"><h3>Tilaajan sähköpostiosoite:</h3></label><br>
        <input style="position:relative; right:470px; top:100px;" type="email" id="spostiosoite" name="spostiosoite" required><br> <br> <br>
 

        <?php
      $qry2 = "SELECT * FROM tpaidat";
      $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
      ?>
      <label style="position:relative; bottom:403px;" for="cars"><h3>Valitse T-paita:</h3></label> <br>
        <select style="position:relative; bottom:403px;" name="tpaidat" id="tpaidat">
        <?php foreach ($seequl2 as $tpaidat): ?>
          <option value="<?php echo $tpaidat[1]; ?>">  
            <?php echo $tpaidat[1]; ?> <h2> / </h2> 
            <h3>Hinta </h3><?php echo $tpaidat[2]; ?>
          </option>
          <?php endforeach;?>
        </select> <br> <br>


        <?php
      $qry2 = "SELECT * FROM hupparit";
      $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
      ?>
      <label style="position:relative; bottom:330px;" for="cars"><h3>Valitse huppari:</h3></label> <br>
        <select style="position:relative; bottom:330px;" name="hupparit" id="hupparit">
        <?php foreach ($seequl2 as $hupparit): ?>
          <option value="<?php echo $hupparit[1]; ?>">
          <?php echo $hupparit[1]; ?> <h2> / </h2>
          <h3>Hinta </h3><?php echo $hupparit[2]; ?>
          </option>
          <?php endforeach;?>
        </select> <br> <br>

        <?php
      $qry2 = "SELECT * FROM takit";
      $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
      ?>
      <label style="position:relative; bottom:260px;" for="cars"><h3>Valitse takki:</h3></label> <br>
        <select style="position:relative; bottom:260px;" name="takit" id="takit">
        <?php foreach ($seequl2 as $takit): ?>
          <option value="<?php echo $takit[1]; ?>">
          <?php echo $takit[1]; ?> <h2> / </h2>
          <h3>Hinta </h3> <?php echo $takit[2]; ?> 
          </option>
          <?php endforeach;?>
        </select> <br> <br>

        <?php
      $qry2 = "SELECT * FROM housut";
      $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
      ?>
      <label style="position:relative; bottom:745px; left:430px;" for="cars"><h3>Valitse housut:</h3></label> <br>
        <select style="position:relative; bottom:745px; left:430px;" name="housut" id="housut">
        <?php foreach ($seequl2 as $housut): ?>
          <option value="<?php echo $housut[1]; ?>">
          <?php echo $housut[1]; ?> <h2> / </h2>
          <h3>Hinta </h3><?php echo $housut[2]; ?>
          </option>
          <?php endforeach;?>
        </select> <br> <br>

        <?php
      $qry2 = "SELECT * FROM shortsit";
      $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
      ?>
      <label style="position:relative; bottom:675px; left:430px;"  for="cars"><h3>Valitse shortsit:</h3></label> <br>
        <select style="position:relative; bottom:675px; left:430px;"  name="shortsit" id="shortsit">
        <?php foreach ($seequl2 as $shortsit): ?>
          <option value="<?php echo $shortsit[1]; ?>">
          <?php echo $shortsit[1]; ?> <h2> / </h2>
          <h3>Hinta </h3> <?php echo $shortsit[2]; ?> 
          </option>
          <?php endforeach;?>
        </select> <br> <br>

        <?php
      $qry2 = "SELECT * FROM kengät";
      $seequl2 = mysqli_fetch_all(mysqli_query($link, $qry2));
      ?>
      <label style="position:relative; bottom:605px; left:430px;"  for="cars"><h3>Valitse kengät:</h3></label> <br>
        <select style="position:relative; bottom:605px; left:430px;"  name="kengät" id="kengät">
        <?php foreach ($seequl2 as $kengät): ?>
          <option value="<?php echo $kengät[1]; ?>">
          <?php echo $kengät[1]; ?> <h2> / </h2>
          <h3>Hinta </h3>  <?php echo $kengät[2]; ?>
          </option>
          <?php endforeach;?>
        </select> <br> <br>
      

        <a style="position:relative; right:450px; bottom:500px;"><h3> Tuotteen koko </h3></a> <br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="eivalintaa" name="tuotekoko" value="Ei valintaa">
        <label style="position:relative; right:470px; bottom:500px;" for="eivalintaa">Ei valintaa</label><br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="xs" name="tuotekoko" value="XS">
        <label style="position:relative; right:470px; bottom:500px;" for="xs">XS</label><br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="ss" name="tuotekoko" value="S">
        <label style="position:relative; right:470px; bottom:500px;" for="s">S</label><br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="m" name="tuotekoko" value="M">
        <label style="position:relative; right:470px; bottom:500px;" for="m">M</label><br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="l" name="tuotekoko" value="L">
        <label style="position:relative; right:470px; bottom:500px;" for="l">L</label><br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="xl" name="tuotekoko" value="XL">
        <label style="position:relative; right:470px; bottom:500px;" for="xl">XL</label><br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="xxl" name="tuotekoko" value="XXL">
        <label style="position:relative; right:470px; bottom:500px;" for="xxl">XXL</label> <br>
        <input style="position:relative; right:470px; bottom:500px;" type="radio" id="xxxl" name="tuotekoko" value="XXXL">
        <label style="position:relative; right:470px; bottom:500px;" for="xxxl">XXXL</label>
        
        <br>
        <br>

        <a style="position:relative; bottom:750px;"><h3> Kengän koko </h3></a> <br>
        <input style="position:relative; bottom:750px;" type="radio" id="Ei valittu" name="kenkäkoko" value="Ei valittu">
        <label style="position:relative; bottom:750px;" for="Ei valittu">Ei valintaa</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="36" name="kenkäkoko" value="36">
        <label style="position:relative; bottom:750px;" for="36">36</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="37" name="kenkäkoko" value="37">
        <label style="position:relative; bottom:750px;" for="37">37</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="38" name="kenkäkoko" value="38">
        <label style="position:relative; bottom:750px;" for="38">38</label> <br>
        <input style="position:relative; bottom:750px;" type="radio" id="39" name="kenkäkoko" value="39">
        <label style="position:relative; bottom:750px;" for="39">39</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="40" name="kenkäkoko" value="40">
        <label style="position:relative; bottom:750px;" for="40">40</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="41" name="kenkäkoko" value="41">
        <label style="position:relative; bottom:750px;" for="41">41</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="42" name="kenkäkoko" value="42">
        <label style="position:relative; bottom:750px;" for="42">42</label><br>
        <input style="position:relative; bottom:750px;" type="radio" id="43" name="kenkäkoko" value="43">
        <label style="position:relative; bottom:750px;" for="43">43</label><br>
        
        <br>
        <br>

       <a style="position:relative; bottom:1040px; left:430px;"><h3> Lisätuotteet </h3></a> <br>
        <input style="position:relative; bottom:1040px; left:430px;" type="checkbox" id="shaker700ml" name="shaker700ml" value="Valittu">
        <label style="position:relative; bottom:1040px; left:430px;" for="shaker"> 700ml Shaker </label><br>
        <input style="position:relative; bottom:1040px; left:430px;" type="checkbox" id="shaker1200ml" name="shaker1200ml" value="Valittu">
        <label style="position:relative; bottom:1040px; left:430px;" for="shaker2"> 1200ml Shaker </label><br>
        <input style="position:relative; bottom:1040px; left:430px;" type="checkbox" id="proteiinipatukat" name="proteiinipatukat" value="Valittu">
        <label style="position:relative; bottom:1040px; left:430px;" for="protein"> Proteiinipatukka - mix </label>

        <br>
        <br>

        <a style="position:relative; bottom:900px;"><h3> Lisätietoja tilaukseen </h3></a> <br>
        <textarea style="position:relative; bottom:900px;" name="lisatietoja" style="width:500px; height:100px;"></textarea>
        <br>
        <input style="position:relative; bottom:860px;" type="submit" value="Tilaa"> <input style="position:relative; bottom:860px;" type="reset" value="Tyhjennä">
        </form> <br> <br>


        <! Tästä alkaa dropdownin skriptilinkitys>
				<script src="scripts/script.js">
				</script>
        <! Tähän päättyy dropdownin skriptilinkitys>
  
</div>
</body>
</html>
