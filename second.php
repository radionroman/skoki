<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
</head>
<style>
  <?php include "styles_front.css" ?>
</style>
<div class="topnav" >
  <a href="front.php">Konkursy</a>
  <a  class="active" href="second.php">Skoki</a>
  <a href="third.php">Zawodniki</a>
  <a href="fourth.php">SkokiKonkursy</a>
  <b href="last.php">Login</b>
</div>


 <h2>Skoki</h2>
    <?php
        // connect to the PostgreSQL database
        $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");


        // retrieve all the competitions from the database
        $result = pg_query($db, "SELECT * FROM skok join zawodnik on skok.id_zawodnika = zawodnik.id_zawodnika join seria on skok.id_serii = seria.id join konkurs on konkurs.id_konkursu = seria.id_konkursu");

        // display the competitions in a table
        echo "<table>";
        echo "<tr><th>Imie</th><th>Nazwisko</th><th>Ocena</th><th>KrajZawodnika</th><th>KrajKonkursu</th><th>RokKonkursu</th></tr>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";

            echo "<td>" . $row['imie'] . "</td>";
            echo "<td>" . $row['nazwisko'] . "</td>";
            echo "<td>" . $row['ocena'] . "</td>";
            echo "<td>" . $row['kraj'] . "</td>";
            echo "<td>" . $row['miejsce'] . "</td>";
            echo "<td>" . $row['rok'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // close the connection to the database
        pg_close($db);
    ?>

</html>