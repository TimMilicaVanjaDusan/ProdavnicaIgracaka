
<?php
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "php_logs.log");
include('izgled.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Analiza</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

    <!--Ucitava se API biblioteka za Google Charts-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">  
    // Ucitava se API za vizuelizaciju 
    google.load('visualization', '1', {'packages':['corechart']});  
    // Šalje povratni poziv kada se ucita API
    google.setOnLoadCallback(crtajGrafik);
    // Funkcija šalje asinhrono JSON podatke, koje PHP fajl podaci.php generiše iz baze
    function crtajGrafik() {
      var jsonData = $.ajax({
      url: "http://localhost/ProdavnicaIgracaka/analiza.php",
      dataType:"json",
      async: false
    }).responseText;  
    // Kreira se tabela sa podacima na osnovu poslatih JSON podataka
    var data = new google.visualization.DataTable(jsonData);
    //data.setColumns([0,1]);
    var options = {'title':'Analiza po broju kupljenih igracaka',
	    titleTextStyle: {
		textAlign: 'center',	
	fontSize: 22},
	  'width':800,
      'height':500,
	  };
 var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data,  options);
    }  
</script>
    <style>
    #chart_div {
    padding: 0 0 0 200px;
}
</style>
</head>

<body>
<?php 
include 'meni.php';
?>
<div id="chart" >
<div id="chart_div"></div>
</div> 
</body>
</html>
