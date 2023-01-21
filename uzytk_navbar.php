<!DOCTYPE html>
<html lang="en">
 

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Skoki</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav">
        <a class="nav-item nav-link <?php echo ($currentPage == 'uzytk_konkursy.php') ? 'active' : ''; ?>" href="uzytk_konkursy.php">Konkursy</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'uzytk_skoki.php') ? 'active' : ''; ?>" href="uzytk_skoki.php">Skoki</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'uzytk_zawodniki.php') ? 'active' : ''; ?>" href="uzytk_zawodniki.php">Zawodniki</a>
        <a class="nav-item nav-link <?php echo ($currentPage == 'uzytk_skokikonkursy.php') ? 'active' : ''; ?>" href="uzytk_skokikonkursy.php">SkokiKonkursy</a>
        
      </div>
    </div>
     <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a class="nav-item nav-link <?php echo ($currentPage == 'login.php') ? 'active' : ''; ?>" href="login.php">Login</a>
            </div>
        </div>
  </div>
</nav>
