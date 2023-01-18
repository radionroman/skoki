<?php
 $db = pg_connect("host=lkdb dbname=bd user=rr439671 password=iks");
// check if the form has been submitted
if (isset($_POST['competition_id'])) {
    // retrieve the competition_id from the form data
    $competition_id = $_POST['competition_id'];

    // delete the competition from the database
    pg_query($db, "DELETE FROM competitions WHERE id = '$competition_id'");
    pg_close($db);
}
?>
