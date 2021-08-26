<?php
session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once "config/config.php";
require_once "header.php";


if($_SESSION["role"] == "admin") {
    style1();
    nav_header();
    ?>
 <div class="row">
     <div class="col-lg-10"
          style="color:black; background-color: silver; border: 10px orange inset; margin-top: 180px;">
            <h1> Tabela korisnika </h1>
        </div>
    </div>
    <table class="table table-hover"
           style="color: black; border: 5px orange solid; margin-top: 10px; background-color: silver;">
        <tr>
            <th>id</th>
            <th>ime</th>
            <th>prezime</th>
            <th>email</th>
            <th>username</th>
            <th>role</th>
            <th></th>
        </tr>
        <from metod="POST" action="config/config.php">
            <?php
            $sql = "SELECT id,name,last_name,email,username,role FROM users ";
            $stmt = $link->query($sql);

            if ($stmt->num_rows > 0){
            while ($row = $stmt->fetch_assoc()):?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["last_name"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["username"] ?></td>
                    <td><?= $row["role"] ?></td>
                    <td style="width: 10%">
                        <a href='deleteKorisnika.php?id=<?= $row["id"] ?>"' title='Delete Record' data-toggle='tooltip'>
                            <button type="submit" name="delete" class="btn btn-danger"> Obrisi</button>
                        </a>
                        <a href='updateUser.php?id=<?= $row["id"] ?>"' title='Update Record' data-toggle='tooltip'>
                            <button type="button" class="btn btn-info">Izmeni</button>
                        </a>
                    </td>
                </tr>

            <?php endwhile; ?>
        </from>
        <?php
        }
        ?>

        <?php
        }
?>