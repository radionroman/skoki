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
  // Connect to the database
  $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");

  // Set the number of rows to display per page
  $rows_per_page = 5;

  // Retrieve the selected page number from the form data
  $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;

  // Calculate the offset for the SELECT statement
  $offset = ($page - 1) * $rows_per_page;

  // Retrieve all the competitions fromthe database, limiting the number of rows and offsetting them based on the current page
$result = pg_query($db, "SELECT * FROM uczestnictwo join zawodnik on zawodnik.id_zawodnika=uczestnictwo.id_zawodnika
join konkurs on konkurs.id_konkursu=uczestnictwo.id_konkursu
LIMIT $rows_per_page OFFSET $offset");

// Determine the total number of rows in the table
$total_rows = pg_fetch_result(pg_query($db, "SELECT COUNT(*) FROM uczestnictwo"), 0);

// Calculate the total number of pages
$total_pages = ceil($total_rows / $rows_per_page);

// Display the competitions in a table
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

// Close the connection to the database
pg_close($db);
?>

<!-- Form with a dropdown menu to select the page to view -->
<form method="post">
  <select name="page">
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
  </select>
  <input type="submit" value="Go">
</form>


</html>