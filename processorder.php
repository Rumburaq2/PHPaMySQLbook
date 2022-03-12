<!-- aka hiworld.php - trochu lepsi zpracovani vylepseneho formulare -->

<?php
  $tireqty = (int) $_POST['tireqty'];
  $oilqty = (int) $_POST['oilqty'];
  $sparkqty = (int) $_POST['sparkqty'];
  $find = $_POST['find'];
  $address = preg_replace('/\t|\R/',' ',$_POST['address']);
  $document_root = $_SERVER['DOCUMENT_ROOT'];
  //pridat date
?>
<DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Zmrdovi auto díly - zpracování objednávky </title>
  </head>
  <body>
    <h1>Bobovy autodíly</h1>
    <h2>Výsledek objednávky</h2>

    <?php
     $totalqty = 0;
     $totalqty = $tireqty + $oilqty + $sparkqty;
     if($totalqty == 0){
       echo "Na předchozí stránce jste si nic neobjednali ._. <br />";
       //echo "$document_root";
       exit;
     }

     date_default_timezone_set("UTC");
     echo "<p>objednávka byla zprcována v ";
     echo date("l jS \of F Y h:i:s A");
     echo "</p>";
     echo "<p>Vaše objednávka: </p>";
     echo 'pneumatik: '.htmlspecialchars($tireqty).'<br />';
     echo 'lahví oleje: '.htmlspecialchars($oilqty).'<br />';
     echo 'zapalovacích svíček: '.htmlspecialchars($sparkqty).'<br />';

     echo "<p>Objednáno položek: ".$totalqty."<br />";
     $totalamount = 0.00;
     define('TIREPRICE', 2500);
     define('OILPRICE', 250);
     define('SPARKPRICE', 100);
     $totalamount = $tireqty * TIREPRICE +
                   $oilqty * OILPRICE +
                   $sparkqty * SPARKPRICE;
     echo "Cena: ".number_format($totalamount, 2)." Kč<br />";
     $taxrate = 0.20;  // výše DPH je 20%
     $totalamount = $totalamount * (1 + $taxrate);
     echo "Celková cena s DPH: ".number_format($totalamount,2)." Kč</p>";
     //echo "<br />";
     echo "<p>Doručovací adresa: ".htmlspecialchars($address)."</p>";


     if ($find == "a") {
       echo "<p>Stálý zákazník.</p>";
     }
     elseif ($find == "b") {
       echo "<p>Zákazník oslovený televizní reklamou.</p>";
     }
     elseif ($find == "c") {
       echo "<p>Zákazník, který našel odkaz v telefonním seznamu.</p>";
     }
     elseif ($find == "d") {
       echo "<p>Zákazník, kterého odkázal známý.</p>";
     }
     else {
      echo "<p>Není jasné, jak nás tento zákazník našel.</p>";
    }

    $outputstring = $tireqty." pneumatik\t".
                   $oilqty." lahvi oleje\t".
                   $sparkqty." zapalovacich svicek\t".$totalamount."\t".
                   $address."\n";

    @$fp = fopen("$document_root/orders.txt", 'ab');
    if (!$fp) {
      echo "<p><strong>Vaše objednávka nemohla být zpracována. Zkuste to
      prosím později.</strong></p>";
      exit;
    }

    flock($fp, LOCK_EX);
    fwrite($fp, $outputstring, strlen($outputstring));
    flock($fp, LOCK_UN);
    fclose($fp);

    echo "<p>Objednávka byla uložena.</p>";

   ?>
  </body>
</html>
