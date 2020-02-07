<div class="card text-center">      
    <?php

   include 'meni.php';
    
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