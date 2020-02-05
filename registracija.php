<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");
?>
<html lang="en">
<head>
 
<?php 
if (isset($_POST["register"])){    
include 'sqlclass.php';
$db = new MySql();
$db->dbConnect();
$podaci=array($_POST['korisnickoIme'],$_POST['lozinka'],$_POST['ime'],$_POST['prezime'],$_POST['adresa'],$_POST['telefon'],$_POST['email']);
if ($db->registracijaKorisnika($podaci)) {
    echo "Uspešno ste kreirali nalog";
} else {
	echo "Niste kreirali nalog";
}
}?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registracija</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script>
//PROVERA DOSTUPNOSTI KORISNICKOG IMENA AJAX
$(document).ready(function() {
	$("#korisnickoIme").keyup(function (e) {
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var korisnickoime = $(this).val();
		if(korisnickoime.length < 3){$("#user-result").html('');return;}
		
		if(korisnickoime.length >= 3){
			$.post('checkUsername.php', {'korisnickoIme':korisnickoime}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>

<!-- VALIDACIJA LOZINKE -->
<script>
$(document).ready(function() {
	$("#lozinka").keyup(function (e) {
		//removes spaces from password
		$(this).val($(this).val().replace(/\s/g, ''));	
		var lozinka = $(this).val();
		if(lozinka.length < 5){$("#pass-result").html("Lozinka mora sadržati bar 5 karaktera i bar 1 broj.");return;}
		else{
			$.post('checkPassword.php', {'lozinka':lozinka}, function(data) {
			  $("#pass-result").html(data);
			});
		}
		$.get("checkPassword.php", {
                        'lozinka': lozinka
                    },
                   function(data) {
                       if (data == 0) {                    
                         $("#pass-result").html("Uneta lozinka mora sadržati bar jedan broj.");
                     }else{
					$("#pass-result").html("Lozinka zadovoljava uslove.");
					}  
            });
    });	
});
</script>
</head>

<body>

<div id="registracija">
    <div id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="pocetna.php" class="navbar-brand home">
                    <img src="slike/logo.png" alt="Logo" class="hidden-xs">
                </a>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li class="active">
                            <a href="pocetna.php">Početna</a>
                        </li>
                        <li>
                            <a href="ponuda.php">Ponuda</a>
                        </li>
                        <li>
                            <a href="checkout.php">Moj nalog</a>
                        </li>
                        <li>
                            <a href="registracija.php">Registracija</a>
                        </li>
                        <li>
                            <a href="onama.php">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        <!-- definisanje putanje-->
        <div class="container">
            <div class="col-md-12">
               <ul class="breadcrumb">
                    <li>
                        <a href="pocetna.php">Home</a>
                    </li>
                    <li>
                        Registracija
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                 <?php
                        include("saStrane.php");
                        ?> 
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2> Otvaranje novog naloga </h2>
                        </center>
                        <form action="registracija.php" method="post" enctype="multipart/form-data">
                            <!-- pocetak forme za registraciju -->
                            <div class="form-group">
                                <label>Ime:</label>
                                <input type="text" class="form-control" id="ime" name="ime" required>                             
                            </div>
                            <div class="form-group">
                                <label>Prezime:</label>
                                <input type="text" class="form-control" id="prezime" name="prezime" required>
                            </div>
                            <div class="form-group">
                                <label>Korisnicko ime:</label>
                                <input type="text" class="form-control" id="korisnickoIme" name="korisnickoIme" required>
                                <div id="user-result"></div>
                            </div>
                            <div class="form-group">
                                <label>Lozinka:</label>
                                <input type="password" class="form-control" id="lozinka" name="lozinka" required>
                                <div id="pass-result"></div>
                            </div>
                            <div class="form-group">
                                <label>Adresa:</label>
                                <input type="text" class="form-control" id="adresa" name="adresa" required>
                            </div>
                            <div class="form-group">
                                <label>Telefon:</label>
                                <input type="text" class="form-control" id="telefon" name="telefon" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Kreirajte Vaš nalog
                                </button>
                            </div>
                        </form><!-- kraj forme -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>