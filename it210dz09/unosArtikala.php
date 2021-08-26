<?php
include_once "config/config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prodavnica</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body >
<nav class="navbar navbar-light bg-light">

    <li class="navbar-nav"><a class="navbar-brand" href="index.php">Pocetna</a></li>
    <li class="navbar-nav"><a class="navbar-brand" href="unosArtikala.php">Unesi artikal</a></li>
    <li class="navbar-nav"><a class="navbar-brand" href="tabela.php">Podaci artikla</a></li>
    <li class="navbar-nav"><a class="navbar-brand" href="login.php">Statistike artikla </a></li>

</nav>
<form action="insert.php" method="POST" style="background: mediumturquoise" >
  <h4>Ime artikla</h4>
    <input type="text" name="ime_artikla" style="background: lavenderblush">
    <br/>
    <h4>Sifra artikla</h4>
    <input type="text" name="sifra_artikla" style="background: lavenderblush">
    <br/>
    <h4>Bar code </h4>
    <input type="text" name="bar_code" style="background: lavenderblush">
    <br/>
    <h4>Vrsta artikla</h4>
    <input type="text" name="vrsta_artikla" style="background: lavenderblush">
    <br/>
    <h4>Artikal id </h4>
    <input type="text" name="artikal_id" style="background: lavenderblush">
    <br/>
    <br/>
<input type="submit" name="submit" value="Dodaj" style="background: orange">
    <br/>
    <br/>
</form>


</body>
</html>





