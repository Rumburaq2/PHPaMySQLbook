<!-- aka hiworld.php - uplne prvni zpracovaní formuláře s filtrem htmlchars() -->

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

      date_default_timezone_set("UTC");
      echo "<p>objednávka byla zprcována v ";
      echo date("l jS \of F Y h:i:s A");
      echo "</p>";
      echo "<p>objednali jste si: </p>";
      echo 'pneumatik: '.htmlspecialchars($tireqty).'<br />';
      echo 'lahví oleje: '.htmlspecialchars($oilqty).'<br />';
      echo 'zapalovacích svíček: '.htmlspecialchars($sparkqty).'<br />';
    ?>
  </body>
</html>
