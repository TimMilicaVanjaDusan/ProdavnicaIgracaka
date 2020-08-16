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
                $url = 'localhost/ProdavnicaIgracaka/igracke.json';
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
                curl_setopt($curl, CURLOPT_POST, false);

                $curl_odgovor = curl_exec($curl);
                curl_close($curl);
                $jsonobj = json_decode($curl_odgovor);
                ?>
                <?php foreach ($jsonobj as $i) :  ?>
                    <span class="product">
                        <a href="details.php?igrackaID=<?php echo str_replace(' ', '_', $i->igrackaID); ?>">
                            <img class="img-responsive" src=<?php echo $i->slika ?> alt="Product 1">
                        </a>

                        <div class="text">
                            <h3>
                                <a href="details.php?igrackaID=<?php echo str_replace(' ', '_', $i->igrackaID); ?>">
                                    <?php echo ($i->nazivIgracke); ?>
                                </a>
                            </h3>
                            <p class="price">
                                <?php
                                $result = $db->prikaziCenu($i->nazivIgracke);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div><?php echo $row["cena"]; ?></div>
                                <?php
                                }
                                ?>
                            </p>
                            <p class="button">
                                <a href="details.php?igrackaID=<?php echo str_replace(' ', '_', $i->igrackaID); ?>" class="btn btn-default">Vidi detalje</a>
                            </p>
                        </div>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>