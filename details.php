<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuća igračaka</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <script type="text/javascript" src="findName.js"></script> 
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</head>

<?php
include 'sqlclass.php';

?>

<body>

 
<div id="ponuda">


    <div id="navbar" class="navbar navbar-default">



        <div class="container">

        
            <div class="navbar-header">


                <a href="ponuda.php" class="navbar-brand home">


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
    <div class="card text-center">
      
    <?php


   $db = new MySql();
   $db->dbConnect();
    
    $nazivIgracke="";
    if(isset($_GET['nazivIgracke'])){
        $nazivIgracke=str_replace('_',' ', $_GET['nazivIgracke']);
        

        $result = $db->prikaziDetalje($nazivIgracke);

                       while ($row=mysqli_fetch_object($result)){

                        
                        
                        echo "
                        <h1>". $row->nazivIgracke ."</h1>
                        
                        <img id='slika' src='".$row->slika."'>
                        <p>Proizvođač: " .$row->proizvodjac ."</p>
                        <p>Cena: " .$row->cena ."</p>

                    
                        <h2> Opis: </h2>
                        <h6>". $row->opis. "</h6>
                        
                        <p>Pol: " .$row->pol ."</p>
                        <hr>
                        <br>
                        <br>
                        </div>";

                       }
                    }
?>
 
                
                </div>

</body>
</html>