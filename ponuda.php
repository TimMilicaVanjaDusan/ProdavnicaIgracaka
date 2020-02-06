<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");

?>
<?php

include 'sqlclass.php';
$db = new MySql();
$db->dbConnect();

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

   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="pocetna.php">Početna</a>
                   </li>
                   <li>
                       Ponuda
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
                   <h1>Ponuda</h1>
                   <p>
                       Omogućite svojim mališanima da uživaju u detinjstvu uz igračke kao iz bajke
                   </p>
               </div>
               
               <div class="row">
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product">

                       <?php
                       $nazivIgracke = "Drvena kuhinja"
                       ?>
                   
                   <!-- za svaku igracku iz ponude sam dodala detalje klikom na sliku, ime, i dugme(podaci iz baze) -->

                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/devojcice/drvenaKuhinja2.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                              Drvena kuhinja
                           </a>
                       </h3>
                       
                       <p class="price"> <!-- ovde je bila rucno cena napisana-->

               <?php
                       $naziv = "Drvena kuhinja";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                        </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 1 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 2 -->

                       <?php
                            $nazivIgracke = "Kegle";
                       ?>
                   
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/devojcice/kegle3.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                               Drvene kegle
                           </a>
                       </h3>
                       
                       <p class="price"><!-- bilo rucno-->
                    <?php
                       $naziv = "Kegle";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                    
                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                  Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 2 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 3 -->

                       <?php
                            $nazivIgracke = "Magična tabla";
                       ?>
                   
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/devojcice/magicnaTabla5.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                               Magična tabla
                           </a>
                       </h3>
                       
                       <p class="price"><!-- rucno cena bila napisana-->
                    
                       <?php
                       $naziv = "Magična tabla";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>

                    
                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 3 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 4 -->
                   
                       <?php

                       $nazivIgracke =  "Drveni bilijar";
                       ?>

                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/decaci/drveniBilijar.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                               Drveni bilijar
                           </a>
                       </h3>
                       
                       <p class="price"><!--rucno cena bila ispisana-->
                    
                       <?php
                       $naziv = "Drveni bilijar";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                    
                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 4 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 5 -->
                   
                       <?php
                       
                       $nazivIgracke = "Koš sa tablom";

                       ?>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
             
                       
                       <img class="img-responsive" src="slike/decaci/kosSaTablom4.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                              Koš sa tablom
                           </a>
                       </h3>
                       
                       <p class="price"><!-- rucno cena bila napisana-->
                    
                       <?php
                       $naziv = "Koš sa tablom";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>

                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 5 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 6 -->

                       <?php
                       
                       $nazivIgracke = "Vojna vozila";
                       ?>
                   
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/decaci/vojnaVozila2.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                               Vojna vozila
                           </a>
                       </h3>
                       
                       <p class="price"><!-- rucno cena bila napisana-->
                    
                       <?php
                       $naziv = "Vojna vozila";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>


                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 6 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 7 -->

                       <?php
                       $nazivIgracke = "Plišano magare";
                       ?>
                   
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/obaPola/magare1.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
                               Plišano magare
                           </a>
                       </h3>
                       
                       <p class="price"><!-- rucno cena bila napisana-->
                    
                    
                       <?php
                       $naziv = "Plišano magare";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>

                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 7 - kraj -->
                       
                   </div>
                   <div class="col-md-4 col-sm-6 center-responsive">
                       
                       <div class="product"><!-- proizvod 8 -->

                       <?php
                       $nazivIgracke = "Plišani medo";
                       ?>
                   
                   <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/obaPola/medo75cm10.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>

                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                               Plišani medo
                           </a>
                       </h3>
                       
                       <p class="price"><!-- rucno bila napisana cena-->
                    
                    
                       <?php
                       $naziv = "Plišani medo";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>

                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 8 - kraj -->
                       
                   </div>
                   <div class="product"><!-- proizvod 9 -->

                   <?php
                   
                   $nazivIgracke = "Tabla sa stalkom";
                   ?>
                   
                   <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                       
                       <img class="img-responsive" src="slike/obaPola/tablaSaStalkom10.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
               
                               Tabla sa stalkom
                           </a>
                       </h3>
                       
                       <p class="price"><!-- bila rucno napisana cena-->
                    
                       <?php
                       $naziv = "Tabla sa stalkom";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>"
                class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 8 - kraj -->
                       
                   </div>
                   <div class="product"><!-- proizvod 9 -->


                   <?php
                   
                   $nazivIgracke = "Učimo azbuku";
                   ?>
                   
                   
                   <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
                       
                       <img class="img-responsive" src="slike/obaPola/ucimoAzbuku3.png" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>">
                               Učimo azbuku
                           </a>
                       </h3>
                       
                       <p class="price"><!--rucno bila napisana cena-->
                    
                       <?php
                       $naziv = "Učimo azbuku";

                       $result = $db->prikaziCenu($naziv);

                       while ($row=mysqli_fetch_array($result)){

                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                    
                    </p>
                       
                       <p class="button">
                           
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $nazivIgracke);?>" class="btn btn-default">Vidi detalje</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div><!-- proizvod 9 - kraj -->
                       
                   </div>
               </div>
               
              
           </div>
           
       </div>
   </div>

</body>
</html>