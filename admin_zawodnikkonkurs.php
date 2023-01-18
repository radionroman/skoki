<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
</head>
<style>
  <?php include "styles_front.css" ?>
</style>
<div class="topnav" >
  <a  href="admin_front.php">DodajKonkurs</a>
  <a href="admin_dodajskok.php">DodajSkok</a>
  <a href="admin_dodajzawodnika.php">DodajZawodnika</a>
  <a href="admin_dodajkraj.php">DodajKraj</a>
  <a class="active" href="admin_zawodnikkonkurs.php">ZawodnikKonkurs</a>
    <a href="front.php">Wróć</a>
</div>

    <h2>Dodaj Zawodnik - Konkurs</h2>

    <form action="" method = "post">
    <select id="id_konkursu" name="id_konkursu">
        <?php
       $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
            // retrieve all the competitions from the database
            $result = pg_query($db, "SELECT * from konkurs order by rok");
      echo "<option value=0> choose </option>";
            // add each competition as an option in the dropdown menu
            while ($row = pg_fetch_assoc($result)) {
                echo "<option value='" . $row['id_konkursu'] ."' >" . $row['rok'] . " (" . $row['miejsce'] . ")</option>";
            }
            pg_close($db);
        ?>
    </select>  
        <select id="id_zawodnika" name="id_zawodnika">
        <?php
       $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
            // retrieve all the competitions from the database
            $result = pg_query($db, "SELECT * from zawodnik");
      echo "<option value=0> choose </option>";
            // add each competition as an option in the dropdown menu
            while ($row = pg_fetch_assoc($result)) {
                echo "<option value='" . $row['id_zawodnika'] ."' >" . $row['imie'] .$row['nazwisko'] . " (" . $row['kraj'] . ")</option>";
            }
            pg_close($db);
        ?>
    </select>  
    <input type="submit" value="Submit">
  </form>
  <?php

// check if the form has been submitted
if (isset($_POST['id_konkursu']) && isset($_POST['id_zawodnika'])) {
     $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
    // retrieve the form data
    $id_konkursu = $_POST['id_konkursu'];
    $id_zawodnika = $_POST['id_zawodnika'];

    // insert the competition into the database
    $result = pg_query($db, "INSERT INTO uczestnictwo (id_zawodnika, id_konkursu) VALUES ('$id_zawodnika', '$id_konkursu')");
  if (!$result) {
    $error = pg_result_error_field($result, PGSQL_DIAG_SQLSTATE);
    if ($error == '01000') {
        // Display warning message
        echo "<err>Warning: " . pg_last_error($db) . "</err>";
    } else {
        // Display error message
        echo "<err>" . pg_last_error($db) . "</err>";
    }
}
            pg_close($db);
}
?>

    <h2>Zawodnik - Konkurs</h2>
    <?php
        // connect to the PostgreSQL database
        $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");


        // retrieve all the competitions from the database
        $result = pg_query($db, "SELECT * FROM uczestnictwo join zawodnik on zawodnik.id_zawodnika=uczestnictwo.id_zawodnika
                                                            join konkurs on konkurs.id_konkursu=uczestnictwo.id_konkursu");

        // display the competitions in a table
        echo "<table>";
        echo "<tr><th>Miejsce</th><th>Rok</th><th>Imie</th><th>Nazwisko</th></tr>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['miejsce'] . "</td>";
            echo "<td>" . $row['rok'] . "</td>";
            echo "<td>" . $row['imie'] . "</td>";
            echo "<td>" . $row['nazwisko'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // close the connection to the database
        pg_close($db);
    ?>

</html>