<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
</head>
<style>
  <?php include "styles_front.css" ?>
</style>
<div class="topnav" >
  <a class="active" href="admin_front.php">DodajKonkurs</a>
  <a href="admin_dodajskok.php">DodajSkok</a>
  <a href="admin_dodajzawodnika.php">DodajZawodnika</a>
  <a href="admin_dodajkraj.php">DodajKraj</a>
  <a href="admin_zawodnikkonkurs.php">ZawodnikKonkurs</a>
  <a href="front.php">Wróć</a>
</div>

    <h2>Dodaj Konkurs</h2>

<form action="" method="post" >


    <label for="location">Location:</label>
    <input type="text" id="location" name="location"><br>
    <label for="date">Date:</label>
    <input type="number" min="1900" max="2099" step="1" value="2016" id="date" name="date"><br>
    <input type="submit" value="Add Competition">
</form>
  <?php

// check if the form has been submitted
if (isset($_POST['location']) && isset($_POST['date'])) {
     $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
    // retrieve the form data
    $location = $_POST['location'];
    $date = $_POST['date'];

    // insert the competition into the database
    $result = pg_query($db, "INSERT INTO konkurs (miejsce,rok) VALUES ('$location', '$date')");
      if (!$result) {
    $error = pg_result_error_field($result, PGSQL_DIAG_SQLSTATE);
    if ($error == '01000') {
        // Display warning message
        echo "<err>Warning: " . pg_last_error($db) . "</err>";
    } else {
        // Display error message
        echo "<err>" . pg_last_error($db) . "</err>";
    }}
            pg_close($db);
}
?>

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

</html>