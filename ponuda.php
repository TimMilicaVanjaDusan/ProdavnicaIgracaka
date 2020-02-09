<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ponuda</title>
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

include 'meni.php';

?>

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
                        

                       <?php
                if (!$q=$db->vratiSveIgracke())
                {
                    echo "<p>Nastala je greska pri izvodenju upita</p>";
                    die();
                }
                if (mysqli_num_rows($q)==0)
                {
                    echo "Nema heroja";
                } 
                else {
                    while ($red=mysqli_fetch_array($q))
                    {
            ?>
            <span class="product"> <!--proizvod -->
                       <a href = "details.php?igrackaID=<?php echo str_replace(' ', '_', $red["igrackaID"]);?>">
                       <img class="img-responsive" src=<?php echo $red["slika"] ?> alt="Product 1">         
                   </a>
                   
                   <div class="text">
                       <h3>
                       <a href = "details.php?igrackaID=<?php echo str_replace(' ', '_', $red["igrackaID"]);?>">
                       <?php echo ($red["nazivIgracke"]);?>
                           </a>
                       </h3>                       
                       <p class="price"> <!-- ovde je bila rucno cena napisana-->
               <?php       
                       $result = $db->prikaziCenu($red["nazivIgracke"]);
                       while ($row=mysqli_fetch_array($result)){
                       ?>
                       <div><?php echo $row["cena"]; ?></div>
<?php
                       }
?>
                        </p>                       
                       <p class="button">                           
                       <a href = "details.php?igrackaID=<?php echo str_replace(' ', '_', $red["igrackaID"]);?>"
                class="btn btn-default">Vidi detalje</a>                                                                             
                       </p>                       
                    </div>
                    </span>                   
               <?php
                    }
                }
                
            ?>
               
            </div>
        </div>
    </div>
</body>
</html>