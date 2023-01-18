<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
</head>
<style>
  <?php include "styles_front.css" ?>
</style>

<div class="topnav" >
  <a href="front.php">Konkursy</a>
  <a href="second.php">Skoki</a>
  <a href="third.php">Zawodniki</a>
  <a  class="active" href="fourth.php">SkokiKonkursy</a>
  <b href="last.php">Login</b>
</div>

     <h2>Konkursy/Skoki</h2>
    <form action="" method = "post">
    <select id="id_konkursu" name="id_konkursu">
        <?php
       $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
            // retrieve all the competitions from the database
            $result = pg_query($db, "SELECT * from konkurs order by rok");
      echo "<option value=0> choose </option>";
            // add each competition as an option in the dropdown menu
            while ($row = pg_fetch_assoc($result)) {
                echo "<option value='" . $row['id_konkursu'] . "'>" . $row['rok'] . " (" . $row['miejsce'] . ")</option>";
            }
            pg_close($db);
        ?>
    </select>  
    <input type="submit" value="Submit">
  </form>
    <br>
<?php
 $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
// check if the form has been submitted
        echo "<table>";
        echo "<tr class='head'><th>Zawodnik</th><th>Nazwisko</th><th>ocena</th></tr>";
if (isset($_POST['id_konkursu']) ) {

    // retrieve the competition_id from the form data
    $id_konkursu = $_POST['id_konkursu'];

    $result = pg_query($db, "SELECT imie, nazwisko,ocena FROM skok join zawodnik on skok.id_zawodnika = zawodnik.id_zawodnika join seria on seria.id_serii = skok.id_serii join konkurs on seria.id_konkursu = konkurs.id_konkursu
 where konkurs.id_konkursu = '$id_konkursu'");

        // display the competitions in a table

        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";

            echo "<td>" . $row['imie'] . "</td>";
            echo "<td>" . $row['nazwisko'] . "</td>";
            echo "<td>" . $row['ocena'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    pg_close($db);
}
?>

</html>