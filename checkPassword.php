<?php
if (isset($_GET['lozinka'])) {
    

    $lozinka = $_GET["lozinka"];
  
    if (preg_match('/\\d/', $lozinka) == 0) {
        echo "0";
    } else {
        echo "1";
    }
}