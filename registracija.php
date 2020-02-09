<?php 
if (isset($_POST["register"])){    
include 'sqlclass.php';
$db = new MySql();
$db->dbConnect();
$podaci=array($_POST['korisnickoIme'],$_POST['lozinka'],$_POST['ime'],$_POST['prezime'],$_POST['adresa'],$_POST['telefon'],$_POST['email']);
if ($db->registracijaKorisnika($podaci)) {
    echo "<script type='text/javascript'>alert('Uspešno ste kreirali nalog!');</script>";
} else {
	echo "<script type='text/javascript'>alert('Greška u kreiranju naloga!');</script>";
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
    
        <div class="container">
					<div class="row">
						 <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-6 col-xs-offset-2 col-xs-8"> 
                        <center>
                            <h2> Otvaranje novog naloga </h2>
                        </center>
                        <form class="form-horizontal" role="form" action="registracija.php" method="post" enctype="multipart/form-data">
                      
                            <!-- pocetak forme za registraciju -->
                            <div class="form-group">
                                <label>Ime:</label>
                                <input type="text" class="form-control input-sm chat-input" id="ime" name="ime" required>                             
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
                <!-- </div>
            </div>
        </div> -->
    </div>
    <div style="text-align: center">
        <a href="index.php">Prijavi se</a>
    </div>
        </div>

        
</body>

</html>