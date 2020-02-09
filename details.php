
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
<?php
include "session.php";
if(isset($_POST['kupi'])){//ako je pritisnuto dugme rezervisi poziva funkciju web servisa za rezervisanje

if(isset($_GET['igrackaID'])){
    $igrackaID=$_GET['igrackaID']; 
    $kupac = $login_session;
if ($db->ubaciKupovinu($igrackaID, $kupac)) { 
    echo "<script type='text/javascript'>alert('Uspešno dodata igračka u korpu');</script>";
} else {
	echo "<script type='text/javascript'>alert('Neuspešno dodata igračka u korpu');</script>";
}   
}
}
?>
<body>
<?php include('meni.php');
?>
<div class="card text-center">  
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">    
    <?php

    
    $nazivIgracke="";
    if(isset($_GET['igrackaID'])){
        $nazivIgracke=str_replace('_',' ', $_GET['igrackaID']);
        

        $result = $db->prikaziDetalje($nazivIgracke);

                       while ($row=mysqli_fetch_object($result)){                    
                        echo "
                        <h1>". $row->nazivIgracke ."</h1>
                        
                        <img id='slika' src='".$row->slika."'>
                        <p>Proizvođač: " .$row->proizvodjac ."</p>
                        <p>Cena: " .$row->cena ."</p>

                    
                        <h2> Opis: </h2>
                        <h6>". $row->opis. "</h6>
                        
                        <p>Pol: " .$row->pol ."</p>";
                        ?>
                        <input type="submit" class="btn btn-primary" name="kupi" value="Dodaj u korpu">
                        
                        <hr>
                        <br>
                        <br>
                        
                        <?php
                        
                       }
                    }
?>
</form>
                </div>
</body>
</html>