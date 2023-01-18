<html>
	<body>
<?php

// check if the form has been submitted
if (isset($_POST['location']) && isset($_POST['date'])) {
	 $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
    // retrieve the form data
    $location = $_POST['location'];
    $date = $_POST['date'];

    // insert the competition into the database
    pg_query($db, "INSERT INTO konkurs (miejsce,rok) VALUES ('$location', '$date')");
    echo "all added";
            pg_close($db);
}
?></body>
</html>
