<?php
$conn = mysqli_connect("localhost", "root", "", "it210_dz09");
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
</body>
</html>
<div class="row">
    <div class="col-lg-12" style="text-align: center; margin-top: 50px; color: white;">
        <h1> Tabela artikla </h1>
    </div>
</div>
<table class="table table-hover"
       style="color: black; border: 6px orange solid; margin-top: 20px; background-color: silver;">
    <tr>
        <th>id</th>
        <th>ime_artikla</th>
        <th>sifra_artikla</th>
        <th>bar_code</th>
        <th>vrsta_artikla</th>
        <th>artikal_id</th>

        <th></th>
    </tr>
    <from metod="POST" action="config/config.php">
        <?php
        $sql = "SELECT * FROM prodavnica";
        $stmt = $conn->query($sql);

        if ($stmt->num_rows > 0){
        while ($row = $stmt->fetch_assoc()):?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["ime_artikla"] ?></td>
                <td><?= $row["sifra_artikla"] ?></td>
                <td><?= $row["bar_code"] ?></td>
                <td><?= $row["vrsta_artikla"] ?></td>
                <td><?= $row["artikal_id"] ?></td>
                <td style="width: 5%">
                    <a href='deleteArtikal.php?id=<?= $row["id"] ?>"' title='Delete Record' data-toggle='tooltip'>
                        <button type="submit" name="delete" class="btn btn-danger"> Obrisi</button>
                    </a>
                    <a href='updateArtikal.php?id=<?= $row["id"] ?>"' title='Update Record' data-toggle='tooltip'>
                        <button type="button" name="izmeni" class="btn btn-info">Izmeni</button>
                    </a>
                </td>            </tr>

        <?php endwhile; ?>
    </from>
    <?php
    }
    ?>

