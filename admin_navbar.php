
<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SkokiAdmin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav">
        <a class="nav-item nav-link <?php echo ($currentPage == 'admin_front.php') ? 'active' : ''; ?>" href="admin_front.php">DodajKonkurs</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'admin_dodajskok.php') ? 'active' : ''; ?>" href="admin_dodajskok.php">DodajSkok</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'admin_dodajzawodnika.php') ? 'active' : ''; ?>" href="admin_dodajzawodnika.php">DodajZawodnika</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'admin_dodajkraj.php') ? 'active' : ''; ?>" href="admin_dodajkraj.php">DodajKraj</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'admin_zawodnikkonkurs.php') ? 'active' : ''; ?>" href="admin_zawodnikkonkurs.php">ZawodnikKonkurs</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'admin_zacznijserie.php') ? 'active' : ''; ?>" href="admin_zacznijserie.php">ZacznijSerie</a>
       
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a class="nav-item nav-link <?php echo ($currentPage == 'uzytk_konkursy') ? 'active' : ''; ?>" href="uzytk_konkursy.php">Wróć</a>
            </div>
        </div>
  </div>
  </div>
</nav>
