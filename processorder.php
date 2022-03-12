<!-- aka hiworld.php - trochu lepsi zpracovani vylepseneho formulare -->

<DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Zmrdovi auto díly - zpracování objednávky </title>
  </head>
  <body>
    <h1>bobovy autodíly</h1>

    <?php
      // vytváříme zkrácené názvy proměnných
     $tireqty = $_POST['tireqty'];
     $oilqty = $_POST['oilqty'];
     $sparkqty = $_POST['sparkqty'];
     $find = $_POST['find'];

     $totalqty = 0;
     $totalqty = $tireqty + $oilqty + $sparkqty;
     if($totalqty == 0){
       echo "Na předchozí stránce jste si nic neobjednali ._. <br />";
       exit;
     }

     date_default_timezone_set("UTC");
     echo "<p>objednávka byla zprcována v ";
     echo date("l jS \of F Y h:i:s A");
     echo "</p>";
     echo "<p>objednali jste si: </p>";
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

   ?>
  </body>
</html>
