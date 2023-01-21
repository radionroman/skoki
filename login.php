<html>
<head>
  <link rel="stylesheet" href="styles_front.css">
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
<form class = "mt-4">
  <!-- Email input -->
  <div class="form-outline mb-4 mt-3" >
    <label class="form-label" for="form2Example1">Login</label>
    <input type="email" id="login" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
    <input type="password" id="password" class="form-control" />

  </div>



  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" href="admin_front.php">Sign in</button>


</form>
<?php if(isset($_POST["login"]) && isset($_POST["password"]) && $_POST["login"] == "smth" && $_POST["password"] == "qwerty"){
  header("Location: admin_front.php", true, 301);
exit();
}


?>
 <a href="admin_front.php">enter</a>
</html>