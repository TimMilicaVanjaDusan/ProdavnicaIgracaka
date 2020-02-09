<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moj nalog</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="jquery-ui-themes-1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.4/extensions/plugins/integration/jqueryui/dataTables.jqueryui.css">
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="DataTables-1.10.4/media/js/jquery.dataTables.min.js"></script>
    <script src="jeditable/jquery.jeditable.js"></script>
    <script src="DataTables-1.10.4/extensions/editable/jquery.dataTables.editable.js"></script>
<script>
$(document).ready(function(){
	$(".tabela").dataTable().makeEditable({
		sDeleteURL: "otkaziKupovinu.php",
        sDeleteHttpMethod: "GET",
		language: {
  sUrl: "DataTables-1.10.4/i18n/serbian.json"
},
		aoColumns: [ //sprecava izmenu polja
            null,
            null,
            null,
            null,
			null,
			null,
			null,
			null
        ]
	});
});
</script>
<style type="text/css">
.row_selected td {
    background-color: #d3d3d3 !important; /* Add !important to make sure override datables base styles */
}
.tabela{
text-align:center;
}
th{
text-align:center;
}
#DataTables_Table_0_wrapper{
border-radius:10px;
font-family:Trebuchet MS;
font-size:12px;
background-color:rgba(250, 250, 250, 0.7);

}
</style>
</head>
<body>
<?php
include 'meni.php';
?>
<h1 id="moje">Istorija mojih kupovina</h1>  
<table class="tabela display"  width="100%">
<thead>
<tr>
<th>Redni broj kupovine</th>
<th>Naziv igracke</th>
<th>Datum kupovine</th>
<th>Slika</th>
</tr>
</thead>
<tbody>

<?php
                if (!$q=$db->dajSveKupovineKorisnika($login_session))
                {
                    echo "<p>Nastala je greska pri izvodenju upita</p>";
                    die();
                }
                if (mysqli_num_rows($q)==0)
                {
                    echo "Nema kupovina!";
                } 
                else {
                    while ($red=mysqli_fetch_array($q))
                    {
						
            ?>

<tr id="<?php echo $red["kupovinaID"];?>">
	<td><?php echo $red["kupovinaID"];?></td>
	<td><?php echo $red["nazivIgracke"]?></td>
	<td><?php echo $red["datumKupovine"]?></td>
	<td><img style="width:100px;"src="<?php echo $red["slika"];?>"/></td>

</tr>
<?php
					}
	
}
?>
</tbody>
</table>
<button id="btnDeleteRow" class="btn btn-danger"  style="padding:20px;position:relative;left:130px;top:20px;">
<span class="glyphicon glyphicon-circle-arrow-down"></span> Otkaži kupovinu</button>
</body>
</html>