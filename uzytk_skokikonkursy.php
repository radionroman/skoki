
<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
  <title>SkokiKonkursy</title>
  <link rel="icon" href="flag.png">
</head>
<style>
  <?php include "styles_front.css" ?>
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</head>
<body>
<?php include 'uzytk_navbar.php'; ?>
     <h2>Konkursy/Skoki</h2>
    <form action="" method = "post">
    <select class="form-select" aria-label = "Select" id="id_konkursu" name="id_konkursu">
        <?php
            include "conn.php";
            // retrieve all the competitions from the database
            $result = pg_query($db, "SELECT * from konkurs order by rok");
            
           
            // add each competition as an option in the dropdown menu
            while ($row = pg_fetch_assoc($result)) {
                echo "<option value='" . $row['id_konkursu'] . "'>" . $row['rok'] . " (" . $row['miejsce'] . ")</option>";
            }
        ?>
    </select>  

    <input class="btn btn-outline-success" type="submit" value="Submit">
  </form>
    <br>
<?php
// check if the form has been submitted
    
if (isset($_POST['id_konkursu']) ) {

    // retrieve the competition_id from the form data
    $id_konkursu = $_POST['id_konkursu'];

    $result = pg_query($db, "SELECT imie, nazwisko,ocena FROM skok join zawodnik on skok.id_zawodnika = zawodnik.id_zawodnika join seria on seria.id_serii = skok.id_serii join konkurs on seria.id_konkursu = konkurs.id_konkursu
 where konkurs.id_konkursu = '$id_konkursu'");
        $rows = pg_fetch_all($result);
        // display the competitions in a table


    pg_close($db);
}
?>
<div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <tr><th>Imie</th><th>Nazwisko</th><th>Ocena</th></tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row) :  ?>
                        <tr>
                            <td><?= $row['imie']; ?></td>
                            <td><?= $row['nazwisko']; ?></td>
                           

                            <td><?= $row['ocena']; ?></td>
                    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
        </div>

</html>