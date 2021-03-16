


<?php

	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Virhe yhdistäessä palvelimeen ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db($link, DB_DATABASE);
	if(!$db) {
		die("Virhe valitessa tietokantaa");
	}
	

	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str);
	}
	
	//Sanitize the POST values
/*	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
*/	
	
	$fname = ($_POST['fname']);
	$lname = ($_POST['lname']);
	$email = ($_POST['email']);
	$postiosoite = ($_POST['postiosoite']);
	$login = ($_POST['login']);
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);
	

			$subject = "SK-Palvelut Oy - tervetuloa!";
            $to = $email;
			$message = "Tervetuloa SK-Palvelut Oy:n käyttäjäksi! <br> <br>";
			$message .= "Käyttäjätunnuksesi: <br>";
			$message .= $login . "<br> <br> <br>";
			$message .= "Salasanasi: <br>";
			$message .= $password . "<br> <br> <br>";
			$message .= "Tervetuloa kirjautumaan palveluumme: <br>";
			$message .= "https://geronimo.okol.org/~karjon/PHP/skvalmennuslogin/login-form.php <br> <br> <br>";
			$message .= "Ystävällisin terveisin, <br>";
			$message .= "SK-Palvelut Oy"; 
            $header = "From:info@skpalvelut.fi \r\n";
            $header .= "Cc:tilaus@skpalvelut.fi \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail ($to,$subject,$message,$header);


	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'Etunimi puuttuu';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Sukunimi puuttuu';
		$errflag = true;
	}
		if($email == '') {
		$errmsg_arr[] = 'Sähköposti puuttuu';
		$errflag = true;
	}

	if($postiosoite == '') {
		$errmsg_arr[] = 'Postiosoite puuttuu';
		$errflag = true;
	}

	if($login == '') {
		$errmsg_arr[] = 'Kirjautumistunnus puuttuu';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Salasana puuttuu';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Salasanan vahvistus puuttuu';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = '<h5 style="color:white; width:100px;">Salasanat eivät täsmää</h5>';
		$errflag = true;
	}
	
	
	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members WHERE login='$login'";
		$result = mysqli_query($link, $qry);
		if($result) {
			if(mysqli_num_rows($result) > 0) {
				$errmsg_arr[] = '<h5 style="color:white; width:100px;"> Käyttäjätunnus on jo käytössä';
				$errflag = true;
			}
			@mysqli_free_result($link, $result);
		}
		else {
			die("Rekisteröinti epäonnistui ja kaatui tunnusten luontiin!");
		}
	}
	
	//Check for duplicate email ID
	if($login != '') {
		$qry = "SELECT * FROM members WHERE email='$email'";
		$result = mysqli_query($link, $qry);
		if($result) {
			if(mysqli_num_rows($result) > 0) {
				$errmsg_arr[] = '<h5 style="color:white; width:100px;"> Sähköpostiosoite on jo käytössä';
				$errflag = true;
			}
			@mysqli_free_result($link, $result);
		}
		else {
			die("Rekisteröinti epäonnistui ja kaatui tunnusten luontiin!");
		}
	}

	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register-form.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO members(firstname, lastname, email, postiosoite,  login, passwd) VALUES('$fname','$lname', '$email', '$postiosoite' , '$login','".md5($_POST['password'])."')";
	$result = @mysqli_query($link, $qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: register-success.php");
		exit();
	}else {
		die("Rekisteröinti epäonnistui ja kaatui tietokantayhteyden hakemiseen!");
	}
?>
