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
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<?php
include_once("meni.php");
?>
       
<h1 align="center">Unesite osnovne podatke o igrački</h1>
<hr>
<div class = "container">

 <form class="form-horizontal" role="form" action="upload.php" method="post" enctype="multipart/form-data">
 
 <div class="form-group">
      <label for="naziv">Naziv igračke:</label>
      <input name="naziv"type="text" class="form-control" id="naziv" placeholder="Unesite naziv igračke" required>
    </div>
    <div class="form-group">
      <label for="proizvodjac">Proizvođač igračke:</label>
      <input name="proizvodjac"type="text" class="form-control" id="proizvođač" placeholder="Unesite proizvođača igračke" required>
    </div>
    <div class="form-group">
      <label for="cena">Cena igračke:</label>
      <input name="cena"type="text" class="form-control" id="cena" placeholder="Unesite cenu igračke" required>
    </div>
    <div class="form-group">
      <label for="opis">Opis igračke:</label>
      <input name="opis"type="text" class="form-control" id="opis" placeholder="Unesite opis igračke" required>
    </div>
    <div class="form-group">
      <label for="stanje">Stanje:</label>
      <input name="stanje"type="text" class="form-control" id="stanje" placeholder="Unesite broj komada igračke" required>
    </div>
    <div class="form-group">
	 <label for="pol">Pol za koji je namenjena igračka:</label><br>
  <select id="pol" name="pol" style="width:100%;color:black;padding:10px;"> 
  <?php
                if (!$q=$db->dajTipove())
                {
                    echo "<p>Nastala je greska pri izvodenju upita</p>";
                    die();
                }
                if (mysqli_num_rows($q)==0)
                {
                    echo "Nema tipova!";
                } 
                else {
                    while ($red=mysqli_fetch_array($q))
                    {
            ?>
            <option value='<?php echo $red["tipIgrackeID"]; ?>'>
           <?php echo $red["pol"]; ?></option>
           <?php
                    }
                }
           ?>
</select>

 </div>
 <div class="form-group">
	 <label for="kategorija">Kategorija igračke:</label><br>
  <select id="kategorija" name="kategorija" style="width:100%;color:black;padding:10px;"> 
  <?php
                if (!$q=$db->vratiSveKategorije())
                {
                    echo "<p>Nastala je greska pri izvodenju upita</p>";
                    die();
                }
                if (mysqli_num_rows($q)==0)
                {
                    echo "Nema kategorija!";
                } 
                else {
                    while ($red=mysqli_fetch_array($q))
                    {
            ?>
            <option value='<?php echo $red["kategorijaIgrackeID"]; ?>'>
           <?php echo $red["nazivKategorije"]; ?></option>
           <?php
                    }
                }
           ?>
</select>

 </div>
   Fotografija <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <br>
  <button type="submit" name="submit" class="btn btn-primary">Dodaj igračku</button>
  </form>
</div>
