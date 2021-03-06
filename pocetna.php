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
    <script src="DataTables-1.10.4/media/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.min.css" />
<script src="DataTables-1.10.4/media/js/jquery.dataTables.min.js"></script>

</head>
<body>
<?php
include('meni.php');

?>
    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <!-- pocetak slider-a -->
                <ol class="carousel-indicators">
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- postavljanje slika za slider - pocetak -->
                    <div class="item active">
                        <img src="slider/slika1.jpg" alt="Slider slika 1">
                    </div>
                    <div class="item">
                        <img src="slider/slika2.jpg" alt="Slider slika 2">
                    </div>
                    <div class="item">
                        <img src="slider/slika3.jpg" alt="Slider slika 3">
                    </div>
                    <div class="item">
                        <img src="slider/slika4.png" alt="Slider slika 4">
                    </div>
                </div><!-- postavljanje slika za slider - kraj -->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <!-- postavljanje funkcionalnosti za strelicu sa leve strane -->
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Prethodna</span>
                                    </a>
                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <!-- postavljanje funkcionalnosti za strelicu sa desne strane -->
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Sledeca</span>
                </a>
            </div>
        </div>
    </div>   
   <div id="hot">       
       <div class="box">           
           <div class="container">               
               <div class="col-md-12">                   
                   <h2>
                       Najnovije igračke u ponudi
                   </h2>                   
               </div>               
           </div>           
       </div>       
   </div>   
   <div id="content" class="container">       
       <div class="row">           
           <div class="col-sm-4 col-sm-6 single">               
           <div class="product"><!-- proizvod 1 -->                   
               <?php
               $nazivIgracke = "Plišani medo";
              ?>
                <a href = "details.php?igrackaID=4">
                <img class= "img-responsive" src="slike/najboljaponuda/10.png" alt="Proizvod 1">
                </a>
                   <div class="text">                       
                       <h3>
                       <a href = "details.php?igrackaID=4">
                              Plišani medo
                           </a>
                       </h3>                       
                       <p class="price"><!--bila rucno cena napisana-->                    
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
                       <a href = "details.php?igrackaID=4" class="btn btn-default">Vidi detalje</a>
                                                    
                       </p>                       
                   </div>                   
               </div><!-- proizvod 1 - kraj-->               
           </div>           
            <div class="col-sm-4 col-sm-6 single">               
               <div class="product"><!-- proizvod 2 -->                   
               <?php
               $nazivIgracke = "Solar energy concept house";
              ?>
                <a href = "details.php?igrackaID=11">
                <img class= "img-responsive" src="slike/najboljaponuda/14.png" alt="Proizvod 1">
                </a>
                   <div class="text">                       
                       <h3>
                       <a href = "details.php?igrackaID=11">
                              Solar energy concept house
                           </a>
                       </h3>                       
                       <p class="price"><!--bila rucno cena napisana-->                    
                       <?php
                       $naziv = "Solar energy concept house";
                       $result = $db->prikaziCenu($naziv);
                       while ($row=mysqli_fetch_array($result)){
                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                    </p>                       
                       <p class="button">                           
                       <a href = "details.php?igrackaID=11" class="btn btn-default">Vidi detalje</a>                        
                       </p>                       
                   </div>                   
               </div><!-- proizvod 2 - kraj-->               
           </div>           
           <div class="col-sm-4 col-sm-6 single">               
               <div class="product"><!-- proizvod 3 -->                   
               <?php
               $nazivIgracke = "Science and experiment";
               ?>               
             <a href = "details.php?igrackaID=10">
                       <img class= "img-responsive" src="slike/najboljaponuda/19.png" alt="Proizvod 1">             
</a>       
                 <div class="text">                       
                       <h3>
                       <a href = "details.php?igrackaID=10">
                              Science & experiment
                           </a>
                       </h3>                       
                       <p class="price"> <!-- bila rucno napisana cenaa-->
                       <?php
                       $naziv = "Science and experiment";
                       $result = $db->prikaziCenu($naziv);
                       while ($row=mysqli_fetch_array($result)){
                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                       </p>                       
                       <p class="button">                           
                       <a href = "details.php?igrackaID=10"   class="btn btn-default">Vidi detalje</a>                        
                       </p>                       
                   </div>                   
               </div><!-- proizvod 3 - kraj -->               
           </div>         
           </div>           
       </div>       
   </div> 
   <?php
    $db->dbDisconnect();
?>
</body>
</html>