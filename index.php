<?php
//Upravljanje greskama
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");

include('login.php');
if(isset($_SESSION['login_user'])){
    header("location: pocetna.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</head>
<body>


<!-- <div class="col-md-9">
                <div class="box">
                    <div class="box-header"> -->
                    <!-- <div class="container" id="forme"> -->
                    <div class="container">
					<div class="row">
						 <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-6 col-xs-offset-2 col-xs-8"> 
								<div class="form-login"
                        <center>
                            <h2 align = "center"> Prijava </h2>
                        </center>
                        <form method="post">
                            <div class="form-group">
                                <label>Korisnicko ime:</label>
                                <input type="text" class="form-control input-sm chat-input" id="korisnickoIme" name="korisnickoIme">
                                <div id="user-result"></div>
                            </div>
                            <div class="form-group">
                                <label>Lozinka:</label>
                                <input type="password" class="form-control input-sm chat-input" id="lozinka" name="lozinka">
                                <div id="pass-result"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Uloguj se
                                </button>
                            </div>
                            <br>
                        </form><!-- kraj forme -->
                        <div style="text-align: center">
                        <a href="registracija.php">Nemate nalog? Registrujte se...</a>
</div>
<?php 
if($error=="Pogresno ste uneli korisnicko ime ili sifru!"||$error=="Morate uneti korisnicko ime i sifru!"){
echo "<div style='font-size:20px; color:darkred;'>".$error. "</div>";}
?>	
                    </div>
                </div>
            </div>


</div><!--login box zatvoren -->

 </body>
</html>