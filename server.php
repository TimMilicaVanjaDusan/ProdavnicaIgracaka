<?php
require 'flight/Flight.php';
require 'jsonindent.php';
Flight::register('db', 'Database', array('mojabaza'));
$json_podaci = file_get_contents("php://input");
Flight::set('json_podaci', $json_podaci );

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /igracke.json', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select();
	$niz=array();
	
	while ($red=$db->getResult()->fetch_object()){
		$niz[] = $red;
	}
	//JSON_UNESCAPED_UNICODE parametar je uveden u PHP verziji 5.4
	//Omogućava Unicode enkodiranje JSON fajla
	//Bez ovog parametra, vrši se escape Unicode karaktera
	//Na primer, slovo č će biti \u010
	$json_niz = json_encode ($niz,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;
});

Flight::route('GET /igracke.xml', function(){
	
//definiše se mime type
header("Content-type: application/xml");
//konekcija ka bazi
$db = Flight::db();
$db->select();

//kreiranje XMLDOM dokumenta
$dom = new DomDocument('1.0','utf-8');

//dodaje se koreni element
 $igracke = $dom->appendChild($dom->createElement('igracke'));

//izvršavanje upita
if (!$q=$db->getResult()){
//ako se upit ne izvrši
  //dodaje se element <greska> u korenom elementu <proizvodi>
 $greska = $igracke->appendChild($dom->createElement('greska'));
 //dodaje se elementu <greska> sadrzaj cvora
 $greska->appendChild($dom->createTextNode("Došlo je do greške pri izvršavanju upita"));
} else {
//ako je upit u redu
if ($q->num_rows>0){
//ako ima rezultata u bazi
$niz = array();
while ($red=$q->fetch_object()){
  
$igracka = $igracke->appendChild($dom->createElement('igracka'));

$igrackaID = $igracka->appendChild($dom->createElement('igrackaID')); 
$igrackaID->appendChild($dom->createTextNode($red->igrackaID));
 
$nazivIgracke = $igracka->appendChild($dom->createElement('nazivIgracke')); 
$nazivIgracke->appendChild($dom->createTextNode($red->nazivIgracke));

$proizvodjac = $igracka->appendChild($dom->createElement('proizvodjac'));
$proizvodjac->appendChild($dom->createTextNode($red->proizvodjac));

$cena = $igracka->appendChild($dom->createElement('cena'));
$cena->appendChild($dom->createTextNode($red->cena));

$opis = $igracka->appendChild($dom->createElement('opis'));
$opis->appendChild($dom->createTextNode($red->opis));

$slika = $igracka->appendChild($dom->createElement('slika'));
$slika->appendChild($dom->createTextNode($red->slika));

$stanje = $igracka->appendChild($dom->createElement('stanje'));
$stanje->appendChild($dom->createTextNode($red->stanje));

$tipIgrackeID = $igracka->appendChild($dom->createElement('tipIgrackeID'));
$tipIgrackeID->appendChild($dom->createTextNode($red->tipIgrackeID));

$pol = $igracka->appendChild($dom->createElement('pol'));
$pol->appendChild($dom->createTextNode($red->pol));

$nazivKategorije = $igracka->appendChild($dom->createElement('nazivKategorije'));
$nazivKategorije->appendChild($dom->createTextNode($red->nazivKategorije));
 
}
} else {
//ako nema rezultata u bazi
  //dodaje se element <greska> u korenom elementu <proizvodi>
 $greska = $proizvodi->appendChild($dom->createElement('greska'));
 //dodaje se elementu <greska> sadrzaj cvora
 $greska->appendChild($dom->createTextNode("Nema unetih igracaka"));
}
}
//cuvanje XML-a
$xml_string = $dom->saveXML(); 
echo $xml_string;
//zatvaranje konekcije

	return false;
});
Flight::route('GET /igracke/@id.json', function($id){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->select("igracka", "*", "tipigracke", "tipIgrackeID", "tipIgrackeID",  "kategorijaigracke", "kategorijaIgrackeID", "kategorijaIgrackeID", "igracka.igrackaID = ".$id, null);
	$red=$db->getResult()->fetch_object();
	//JSON_UNESCAPED_UNICODE parametar je uveden u PHP verziji 5.4
	//Omogućava Unicode enkodiranje JSON fajla
	//Bez ovog parametra, vrši se escape Unicode karaktera
	//Na primer, slovo č će biti \u010
	$json_niz = json_encode ($red,JSON_UNESCAPED_UNICODE);
	echo indent($json_niz);
	return false;
});

Flight::route('POST /kategorije', function(){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	if ($podaci == null){
	$odgovor["poruka"] = "Niste prosledili podatke";
	$json_odgovor = json_encode ($odgovor);
	echo $json_odgovor;
	return false;
	} else {
	if (!property_exists($podaci,'nazivKategorije')){
			$odgovor["poruka"] = "Niste prosledili korektne podatke";
			$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
	
	} else {
			$podaci_query = array();
			foreach ($podaci as $k=>$v){
				$v = "'".$v."'";
				$podaci_query[$k] = $v;
            }

			if ($db->insert("kategorijaigracke", "nazivKategorije", array($podaci_query["nazivKategorije"]))){
		    	$odgovor["poruka"] = "Kategorija je uspešno ubačena";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			} else {
				$odgovor["poruka"] = "Došlo je do greške pri ubacivanju novosti";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
		    }
	}
	}	
	}
);

Flight::route('PUT /igracke/@id', function($id){
	header ("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$podaci_json = Flight::get("json_podaci");
	$podaci = json_decode ($podaci_json);
	if ($podaci == null){
	$odgovor["poruka"] = "Niste prosledili podatke";
	$json_odgovor = json_encode ($odgovor);
	echo $json_odgovor;
	} else {
    if (!property_exists($podaci,'nazivIgracke')||!property_exists($podaci,'proizvodjac')||!property_exists($podaci,'cena')
    || !property_exists($podaci,'opis')||!property_exists($podaci,'slika')||!property_exists($podaci,'stanje')
    || !property_exists($podaci,'tipIgrackeID')||!property_exists($podaci,'kategorijaIgrackeID')){
			$odgovor["poruka"] = "Niste prosledili korektne podatke";
			$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
	
	} else {
			$podaci_query = array();
			foreach ($podaci as $k=>$v){
				$v = "'".$v."'";
				$podaci_query[$k] = $v;
            }
            
            if ($db->update("igracka", $id, array('nazivIgracke', 'proizvodjac', 'cena', 'opis', 'slika', 'stanje', 'tipIgrackeID', 'kategorijaIgrackeID'),
            array($podaci->nazivIgracke, $podaci->proizvodjac,$podaci->cena, $podaci->opis, $podaci->slika,$podaci->stanje, $podaci->tipIgrackeID, $podaci->kategorijaIgrackeID))){
				$odgovor["poruka"] = "Igračka je uspešno izmenjena";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			} else {
				$odgovor["poruka"] = "Došlo je do greške pri izmeni igračke";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
	}
	}	




});
Flight::route('DELETE /kategorije/@id', function($id){
		header ("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		if ($db->delete("kategorijaigracke", array("kategorijaIgrackeID"),array($id))){
				$odgovor["poruka"] = "Kategorija je uspešno izbrisana";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
		} else {
				$odgovor["poruka"] = "Došlo je do greške prilikom brisanja kategorije";
				$json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
		
		}		


});


Flight::start();
?>

