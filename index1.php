<!DOCTYPE html>
<html>
<head>
    <title>Ski Jumping Competition</title>
    <script src="js/insert.js"></script>
</head>
<body>
    <h1>Ski Jumping Competition</h1>
<style>
	
	body {


  /* Center the background image */
  background-position: center;


}


h1, h2 {
  text-align: center;
}

form {
  margin: auto;
  width: 300px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"], input[type="date"], input[type="number"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  margin-top: 10px;
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #4d8ccc;
  color: white;
  cursor: pointer;
}

table {
  margin: auto;
  border-collapse: collapse;
  border: 1px solid #ccc;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #ccccc;
  color: black;
  
}
</style>

<!-- index.php -->
<h2>Add Competition</h2>

<form action="add_competition.php" method="post" id="myform">


    <label for="location">Location:</label>
    <input type="text" id="location" name="location"><br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date"><br>
    <label for="num_participants">Number of Participants:</label>
    <input type="number" id="num_participants" name="num_participants"><br>
    <input type="submit"value="Add Competition">
</form>
  <script>
document.querySelector('#myform').addEventListener('submit', function(event) {
  event.preventDefault();
  var formData = new FormData(this);
  fetch('add_competition.php', {
    method: 'POST',
    body: formData
  }).then(function() {
    window.location.reload();
  });
});
  </script>

<h2>Delete Competition</h2>

<form action="delete_competition.php" method="post" id="delete">
    <label for="competition_id">Competition:</label>
    <select id="competition_id" name="competition_id">
        <?php
			 $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
            // retrieve all the competitions from the database
            $result = pg_query($db, "SELECT id, location, date FROM competitions");
			echo "<option value=0> choose </option>";
            // add each competition as an option in the dropdown menu
            while ($row = pg_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['location'] . " (" . $row['date'] . ")</option>";
            }
            pg_close($db);
        ?>
    </select><br>
    <input type="submit" value="Delete Competition">
            
</form>
  <script>
document.querySelector('#delete').addEventListener('submit', function(event) {
  event.preventDefault();
  var formData = new FormData(this);
  fetch('delete_competition.php', {
    method: 'POST',
    body: formData
  }).then(function() {
    window.location.reload();
  });
});
  </script>


    <h2>Competitions</h2>
    <?php
        // connect to the PostgreSQL database
        $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");


        // retrieve all the competitions from the database
        $result = pg_query($db, "SELECT * FROM competitions");

        // display the competitions in a table
        echo "<table>";
        echo "<tr><th>Location</th><th>Date</th><th>Num. Participants</th></tr>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";

            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['num_participants'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // close the connection to the database
        pg_close($db);
    ?>

</body>
</html>
