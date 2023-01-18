<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
</head>

<style>
  <?php include "styles_front.css" ?>
</style>


<div class="topnav" >
  <a class="active" href="front.php">Konkursy</a>
  <a href="second.php">Skoki</a>
  <a href="third.php">Zawodniki</a>
  <a href="fourth.php">SkokiKonkursy</a>
  <a href="last.php" allign = right>Login</a>
</div>

<body>
    <h2>Konkursy</h2>
    <?php
        // connect to the PostgreSQL database
        $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");


        // retrieve all the competitions from the database
        $result = pg_query($db, "SELECT * FROM konkurs order by rok");

        // display the competitions in a table
        echo "<table>";
        echo "<tr><th>Rok</th><th>Miejsce</th></tr>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['rok'] . "</td>";
            echo "<td>" . $row['miejsce'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // close the connection to the database
        pg_close($db);
    ?>

    
</body>
</html>