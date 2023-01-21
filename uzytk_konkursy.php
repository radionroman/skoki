
<?php 

    include "conn.php";
    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $result = pg_query($db, "SELECT * FROM konkurs order by rok LIMIT $limit OFFSET $start");
    $rows = pg_fetch_all($result);
    $result1 = pg_query($db, "SELECT count(*) as id FROM konkurs");
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
  <title>Konkursy</title>
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
 <h2>Konkursy</h2>
        <?php include 'pagination.php' ?>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <tr><th>Kraj</th><th>Rok</th></tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row) :  ?>
                        <tr>
                            <td><?= $row['miejsce']; ?></td>
                            <td><?= $row['rok']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
        </div>
    </div>
</body>
</html>




