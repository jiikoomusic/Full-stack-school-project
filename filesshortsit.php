<?php
// connect to the database
$conn = mysqli_connect('localhost', 'karjon', 'karjon321', 'karjon');

$sql = "SELECT * FROM shortsit";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        echo "You file extension must be .jpg, .jpeg or .png";
    } elseif ($_FILES['myfile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO shortsit (nimi, hinta, kuva, tuotetiedot) VALUES ('$_POST[shortsit]' , '$_POST[hinta]', '$filename', '$_POST[tuotetiedot]')";



    
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM shortsit WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE shortsit SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

} ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.315">
<html lang="fi">
<title>Tuotehallinta</title>
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
                    <div style="position: relative; top: 240px; left: 240px;" align="center" id="tuotehallinta4">
                    <br>
                    <h3>Tuote lisätty valikoimaan!</h3> <br> <br> <br>
                    <a style="position:relative; top:37px; left:400px;" href="member-profile.php"><img src="kuvat/profiili.jpg" style="width:50px;height:50px;"> <h3> Profiili </a> </h3>  
                    <a style="position:relative; bottom:71px; left:200px;" href="admin-users.php"><img src="kuvat/userhallinta.jpg" style="width:50px;height:50px;"> <h3> Käyttäjätilien hallinta </a> </h3> </a> <br>
                    <a style="position:relative; bottom:200px;" href="admin-index.php"><img src="kuvat/tilaustenhallinta.jpg" style="width:50px;height:50px;"> <h3> Tilausten hallinta </a> </h3> </a> <br>
                    <a style="position:relative; bottom:328px; right:200px;" href="tuotehallinta.php"><img src="kuvat/tuotehallinta.png" style="width:50px;height:50px;"> <h3> Tuotehallinta </a> </h3> </a> <br>
                    <a style="position:relative; bottom:456px; right:400px;" href="logout.php"><img src="kuvat/logout.jpg" style="width:50px;height:50px;"> <h3> Kirjaudu ulos </a> </h3>    
                    
                    
</div>
</body>
</html>


              