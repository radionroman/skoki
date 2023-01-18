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
  <a class="active" href="admin_dodajzawodnika.php">DodajZawodnika</a>
  <a href="admin_dodajkraj.php">DodajKraj</a>
  <a href="admin_zawodnikkonkurs.php">ZawodnikKonkurs</a>
    <a href="front.php">Wróć</a>
</div>

    <h2>Dodaj Zawodnika</h2>

<form action="" method="post" >


    <label for="location">Imie</label>
    <input type="text" id="imie" name="imie"><br>
    <label for="location">Nazwisko</label>
    <input type="text" id="nazwisko" name="nazwisko"><br>
    <label for="location">Kraj</label>
    <input type="text" id="kraj" name="kraj"><br>
    <input type="submit" value="Dodaj Zawodnika">
</form>
  <?php

// check if the form has been submitted
if (isset($_POST['imie']) && isset($_POST['nazwisko'])&& isset($_POST['kraj'])) {
     $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
    // retrieve the form data
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $kraj = $_POST['kraj'];

    // insert the competition into the database
    $result = pg_query($db, "INSERT INTO zawodnik (imie,nazwisko,kraj) VALUES ('$imie', '$nazwisko', '$kraj')");
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

    <h2>Konkursy</h2>
    <?php
        // connect to the PostgreSQL database
        $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");


        // retrieve all the competitions from the database
        $result = pg_query($db, "SELECT * FROM zawodnik order by kraj");

        // display the competitions in a table
        echo "<table>";
        echo "<tr><th>Imie</th><th>Nazwisko</th><th>Kraj</th></tr>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['imie'] . "</td>";
            echo "<td>" . $row['nazwisko'] . "</td>";
            echo "<td>" . $row['kraj'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // close the connection to the database
        pg_close($db);
    ?>

</html>