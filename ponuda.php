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
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $red["nazivIgracke"]);?>">
                       <img class="img-responsive" src=<?php echo $red["slika"] ?> alt="Product 1">         
                   </a>
                   
                   <div class="text">
                       <h3>
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $red["nazivIgracke"]);?>">
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
                       <a href = "details.php?nazivIgracke=<?php echo str_replace(' ', '_', $red["nazivIgracke"]);?>"
                class="btn btn-default">Vidi detalje</a>                           
                           <a href="details.php" class="btn btn-primary">                               
                               <i class="fa fa-shopping-cart">
                                   Dodaj u korpu
                               </i>                               
                           </a>                           
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