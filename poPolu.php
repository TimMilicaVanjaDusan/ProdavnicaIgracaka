<?php
include 'meni.php';
?>
    <div id="content" class="container">
       
       <div class="row">
           
           <div class="col-sm-4 col-sm-6 single">

           <?php
 $pol="";
 if(isset($_GET['pol'])){
    $pol=str_replace('_',' ', $_GET['pol']);
     $result = $db->prikaziponudu($pol);

                    while ($row=mysqli_fetch_object($result)){

                    ?>
                      <div id="content" class="container">
       
                        <div class="row">
           
                            <div class="col-sm-4 col-sm-6 single"> 
                     <?php
                      echo "
                      
                      <h1>". $row->nazivIgracke ."</h1>
                     
                     <img id='slika' src='".$row->slika."' width=200 height=200>
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
            </div>
         </div>
    </body>
</html>