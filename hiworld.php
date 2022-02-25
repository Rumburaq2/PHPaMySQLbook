<?php
  // vytváříme zkrácené názvy proměnných
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
?>

<!DOCTYPE html>
   <html>
     <head>
       <meta charset="UTF-8" />
       <title>Bobovy autodíly – Výsledek objednávky</title>
     </head>
     <body>
       <h1>°-° Oliverovy autodíly! °-°</h1>
       <h2>výsledek objednávky</h2>
       <?php
   $totalqty = $tireqty + $oilqty + $sparkqty;
   if ($totalqty == 0)
   {
    echo '<p style="color:red">';
   echo "Nic jste si neobjednal(a) na předchozí stránce.<br />";
   exit;
   }

   echo '<p>Objednávka zde: </p>';
   echo '<p>__________________________</p>';
   echo 'pneumatik: '.htmlspecialchars($tireqty).'<br />';
   echo 'lahví oleje: '.htmlspecialchars($oilqty).'<br />';
   echo 'zapalovacích svíček: '.htmlspecialchars($sparkqty).'<br />';

   echo '<p>Objednáno položek: '.$totalqty.'<br />';
   $totalamount = 0.00;

   define('TIREPRICE', 100);
   define('OILPRICE', 10);
   define('SPARKPRICE', 4);
   define('TAX', 0.21); // výše DPH je 21%

   $totalamount = $tireqty * TIREPRICE +
                  $oilqty * OILPRICE +
                  $sparkqty * SPARKPRICE;

   echo 'Cena: '.$totalamount.' Kč<br />';
   $totalamount = $totalamount * (1 + TAX);
   echo 'Celková cena s DPH: '.$totalamount.' Kč</p>';
       ?>
     </body>
   </html>
