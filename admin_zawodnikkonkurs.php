<?php 

    include "conn.php";
    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $result =  pg_query($db, "SELECT * FROM uczestnictwo join zawodnik on zawodnik.id_zawodnika=uczestnictwo.id_zawodnika
                                                            join konkurs on konkurs.id_konkursu=uczestnictwo.id_konkursu order by rok LIMIT $limit OFFSET $start");;
    $rows = pg_fetch_all($result);
    $result1 = pg_query($db, "SELECT count(*) as id FROM uczestnictwo join zawodnik on zawodnik.id_zawodnika=uczestnictwo.id_zawodnika
                                                            join konkurs on konkurs.id_konkursu=uczestnictwo.id_konkursu ");
    $custCount = pg_fetch_all($result1);
    $total = $custCount[0]['id'];
    $pages = ceil( $total / $limit );
    $Previous = $page-1;
    $Next = $page + 1;
    pg_close($db);
 ?>
<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
  <title>DodajZawodnika</title>
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
<?php include 'admin_navbar.php'; ?>
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
<?php include 'pagination.php' ?>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                       <th>Miejsce</th><th>Rok</th><th>Imie</th><th>Nazwisko</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row) :  ?>
                        <tr>
                            <td><?= $row['miejsce']; ?></td>
                            <td><?= $row['rok']; ?></td>
                            <td><?= $row['imie']; ?></td>
                            <td><?= $row['nazwisko']; ?></td>
    
                    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
        </div>
    </div>

</html>