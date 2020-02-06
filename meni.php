<?php
include_once("session.php");
include_once('sqlclass.php');
$db = new MySql();
$db->dbConnect();
$db->prikaziKorisnika($login_session);
$red=$db->getResult()->fetch_object();

sesija($login_session,$red->status);

function sesija($user,$status){
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuća igračaka</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</head>
<body>
    <div id="navbar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="pocetna.php" class="navbar-brand home">
                    <img src="slike/logo.png" alt="Logo" class="hidden-xs">
                </a>
            </div>
            <?php 
                if($status!='admin'){?>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li>
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
                        <li>
                            <a href="logout.php">Odjavi se</a>
                        </li>
                        <li>
                            <a href="logout.php">Odjavi se</a>
                        </li>
                        <li>
                            <p>      Ulogovani ste kao <?php echo $user?></p>
                        </li>
                    </ul>
                </div>
            </div>
            
        <?php
        }else{?>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li>
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
                        <li>
                            <a href="logout.php">Odjavi se</a>
                        </li>
                        <li>
                            <p>Ulogovani ste kao <?php echo $user?></p>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
        <?php }?>