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
                            <a href="mojnalog.php">Moj nalog</a>
                        </li>
                        <li>
                            <a href="kontakt.php">Kontakt</a>
                        </li>
                        <li>
                            <a href="logout.php">Odjavi se</a>
                        </li>
                        <li>
                            <h4>Ulogovani ste kao <?php echo $user?></h4>
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
                            <a href="dodajIgracku.php">Dodaj igračku</a>
                        </li>
                        <li>
                            <a href="sveKupovine.php">Sve kupovine</a>
                        </li>
                        <li>
                            <a href="grafik.php">Statistika</a>
                        </li>
                        <li>
                            <a href="logout.php">Odjavi se</a>
                        </li>
                        <li>
                            <h4>Ulogovani ste kao <?php echo $user?></h4>
                        </li>
                    </ul>
                    
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
        <?php }?>