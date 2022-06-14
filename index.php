<!doctype html>
<html lang="pl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Strona główna</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#1">
      <img src="logo.png" alt="Logo" style="width: 150px;" target="blank" class="style-only" />
    </a>
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav nav-fill mr-auto">
        <li class="nav-item">
          <a class="nav-link" style="font-size:20px" href="symulator.php">Symulator</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <? if(isset($_COOKIE['login']) && $_COOKIE['login'] != ""){ ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" style="font-size:30px" href="logout.php">Wyloguj</a>
          </li>
        </ul>
      <? } else { ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" style="font-size:40px" href="login.php">LOGOWANIE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="font-size:40px" href="register.php">REJESTRACJA</a>
          </li>
        </ul>
      <? } ?>
    </div>
  </nav>

  <div class="container mt-5">
    <center>
      <h1 style="color:white">Witaj na oficjalnej stronie Symulatora Balistyki!</h1>
    </center>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="first.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="second.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="third.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <center>
    <h1 style="color:white">Wciśnij jeden z obrazków by przejść do symulatora!</h1>
  </center>
  <br>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

</body>

</html>
