<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filter(kategorija)</title>
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
    <div id="content" class="container">
       
       <div class="row">
           
           <div class="col-sm-4 col-sm-6 single">

           <?php
 $nazivKategorije="";
 if(isset($_GET['nazivKategorije'])){
    $nazivKategorije=str_replace('_',' ', $_GET['nazivKategorije']);
     $result = $db->prikaziponuduKategorija($nazivKategorije);

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