<? $g = $_GET;


$sql = new mysqli("mariadb106.server640683.nazwa.pl","server640683_copek","J$6MRTUW8dQTTkn","server640683_copek");
if ($sql -> connect_errno) exit("Failed to connect to MySQL: " . $sql -> connect_error);

$dist = [
  '50m' => 'distance_50',
  '100m' => 'distance_100',
  '150m' => 'distance_150',
  '200m' => 'distance_200',
];

$success = false;
if(isset($g['distance']) && isset($g['bullet_type']) && $g['caliber']){
  $query = "SELECT `".$dist[$g['distance']]."` FROM `simulation` WHERE `caliber` = '".$g['caliber']."' AND `bullet_type` = '".$g['bullet_type']."'";
  $result = $sql->query($query);
  if($result->num_rows > 0){
    $result = $result->fetch_assoc();
    $success = true;
    $result = $result[$dist[$g['distance']]];
  }
}

?>

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
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form class="" method="get">
          <label>
            <h1><span style="color:white">Kaliber broni</span></h1>
          </label><br>
          <select name="caliber">
            <option <?= isset($g['caliber']) && $g['caliber'] == "7.62x39" ? "selected" : "" ?> value="7.62x39" >7.62x39</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == "7x64" ? "selected" : "" ?> value="7x64" >7x64</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == ".308 Win" ? "selected" : "" ?> value=".308 Win" >.308 Win</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == "7.62x53R/54R" ? "selected" : "" ?> value="7.62x53R/54R" >7.62x53R/54R</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == ".30-06" ? "selected" : "" ?> value=".30-06" >.30-06</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == ".300 Win. Mag." ? "selected" : "" ?> value=".300 Win. Mag." >.300 Win. Mag.</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == "8X57 JRS" ? "selected" : "" ?> value="8X57 JRS" >8X57 JRS</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == "8x57 JS" ? "selected" : "" ?> value="8x57 JS" >8x57 JS</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == ".338 Lapua Mag" ? "selected" : "" ?> value=".338 Lapua Mag" >.338 Lapua Mag</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == "9.3x62" ? "selected" : "" ?> value="9.3x62" >9.3x62</option>
            <option <?= isset($g['caliber']) && $g['caliber'] == "9.3x74 R" ? "selected" : "" ?> value="9.3x74 R" >9.3x74 R</option>
          </select>
          <br>
          <label>
            <h1><span style="color:white">Odległość</span></h1>
          </label><br>
          <select name="distance">
            <option <?= isset($g['distance']) && $g['distance'] == "50m" ? "selected" : "" ?> value="50m" >50m</option>
            <option <?= isset($g['distance']) && $g['distance'] == "100m" ? "selected" : "" ?> value="100m" >100m</option>
            <option <?= isset($g['distance']) && $g['distance'] == "150m" ? "selected" : "" ?> value="150m" >150m</option>
            <option <?= isset($g['distance']) && $g['distance'] == "200m" ? "selected" : "" ?> value="200m" >200m</option>
          </select>
          <br>
          <label>
            <h1><span style="color:white">Typ pocisku</span></h1>
          </label><br>
          <select name="bullet_type">
            <option <?= isset($g['bullet_type']) && $g['bullet_type'] == "Mega" ? "selected" : "" ?> value="Mega" >Mega</option>
            <option <?= isset($g['bullet_type']) && $g['bullet_type'] == "FMJ" ? "selected" : "" ?> value="FMJ" >FMJ</option>
            <option <?= isset($g['bullet_type']) && $g['bullet_type'] == "Naturalis" ? "selected" : "" ?> value="Naturalis" >Naturalis</option>
            <option <?= isset($g['bullet_type']) && $g['bullet_type'] == "SP" ? "selected" : "" ?> value="SP" >SP</option>
          </select>


          <button type="submit">Przelicz</button>


          <? if(isset($g['distance'])){
            if($success){ ?>
              <div class="">
                <h1><span style="color:white">Wynik to: <b><?= $result ?>mm</b></span></h1>

              </div>
            <? } else { ?>
              <div class="">
                <h1><span style="color:red">Dla podanych parametrów nie ma wyniku </span></h1>
              </div>
            <? } ?>
          <? } ?>
        </form>
      </div>
    </div>
  </div>
  <br>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

</body>

</html>


<? $sql->close() ?>
