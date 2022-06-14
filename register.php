<?

$p = $_POST;

$sql = new mysqli("mariadb106.server640683.nazwa.pl","server640683_copek","J$6MRTUW8dQTTkn","server640683_copek");
if ($sql -> connect_errno) exit("Failed to connect to MySQL: " . $sql -> connect_error);
$niepasujehaslo = false;
$blednyloginlubemail = false;

if(isset($p['nazwa']) && isset($p['email']) && isset($p['haslo_1']) && isset($p['haslo_2'])){
  $nazwa = $p['nazwa'];
  $email = $p['email'];
  $haslo_1 = $p['haslo_1'];
  $haslo_2 = $p['haslo_2'];

  if($haslo_1 == $haslo_2){

    $query = "INSERT INTO `user`(`login`, `email`, `password`) VALUES ('".$nazwa."', '".$email."', '".$haslo_1."')";
    $r = $sql->query($query);
    if($r){
      setcookie("login", $nazwa, time()+3600*24, "/");
      setcookie("email", $email, time()+3600*24, "/");

      header("Location: /");
    } else {
      $blednyloginlubemail = true;
    }
  } else {
      $niepasujehaslo = true;
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style1.css">
  <title>Rejestracja</title>
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
      <a class="navbar-brand mx-auto" href="#"></a>
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
  <br>
  <div class="container text-center">
    <h1 style="color:white">ZAREJESTRUJ SIĘ!</h1>
    <br>


    <form method="post" action="">
      <div class="input-group">
        <label style="font-size:50px;">Nazwa użytkownika </label>
        <br><br>
        <input type="text" name="nazwa" value="<?= isset($p['nazwa']) && $p['nazwa'] ? $p['nazwa'] : "" ?>">
      </div>
      <? if($blednyloginlubemail) { ?>
        <h1 style="color:red">Podana nazwa lub email nie są poprawne lub są już zajęte</h1>
      <? } ?>
      <div class="input-group">
        <label style="font-size:50px;">Email </label>
        <input type="email" name="email" value="<?= isset($p['email']) && $p['email'] ? $p['email'] : "" ?>">
      </div>
      <? if($blednyloginlubemail) { ?>
        <h1 style="color:red">Podana nazwa lub email nie są poprawne lub są już zajęte</h1>
      <? } ?>
      <div class="input-group">
        <label style="font-size:50px;">Hasło </label>
        <input type="password" name="haslo_1">
      </div>
      <div class="input-group">
        <label style="font-size:50px;">Powtórz hasło </label>
        <input type="password" name="haslo_2">
      </div>
      <div class="">
        <? if($niepasujehaslo) { ?>
          <h1 style="color:red">Podane hasła nie są identyczne</h1>
        <? } ?>
      </div>
      <br>

      <center><button type="submit" id="blink" style="font-size:25px;">Zarejestruj</button></center>
      <br>
      <p style="color:white">
        Masz już konto? <a href="login.php">Zaloguj</a>
      </p>
    </form>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
</body>

</html>

<? $sql->close() ?>
