<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Igračka-info</title>
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