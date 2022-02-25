<!-- dynamicky generovani tabulky str 74 -->
<DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Zmrdovi auto díly - Cena dopravy </title>
  </head>
  <body>
    <h1>cau lidi!</h1>
    <table style="border: 0px; padding: 3px">
    <tr>
      <td style="background: #cccccc; "text-align: center;">vzdálenost</td>
      <td style="background: #cccccc; "text-align: center;">Cena</td>
    </tr>

    <?php
    $distance = 50;

    while ($distance <= 250) {
      echo "<tr>
              <td style=\"text-align: right;\">".$distance."</td>
              <td style=\"text-align: right;\">".($distance * 2.5)."</td>
              </tr>\n";
      $distance += 50;
    }
    ?>
    </table>
  </body>
</html>
