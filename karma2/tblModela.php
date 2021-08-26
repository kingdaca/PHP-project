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
    <div class="col-lg-12" style="text-align: center; margin-top: 50px; color: white;">
        <h1> Tabela modela </h1>
    </div>
</div>
<table class="table table-hover"
       style="color: black; border: 5px orange solid; margin-top: 20px; background-color: white;">
    <tr>
        <th>id</th>
        <th>naziv</th>
        <th></th>
    </tr>
    <from metod="POST" action="config/config.php">
        <?php
        $sql = "SELECT id_model,naziv_modela FROM model_laptopa ";
        $stmt = $link->query($sql);

        if ($stmt->num_rows > 0){
        while ($row = $stmt->fetch_assoc()):?>
            <tr>
                <td><?= $row["id_model"] ?></td>
                <td><?= $row["naziv_modela"] ?></td>
                <td style="width: 15%">
                    <a href='deleteModel.php?id=<?= $row["id_model"] ?>"' title='Delete Record'
                       data-toggle='tooltip'>
                        <button type="submit" name="delete" class="btn btn-danger"> Obrisi</button>
                    </a>
                    <a href='updateModel.php?id=<?= $row["id_model"] ?>"' title='Delete Record'
                       data-toggle='tooltip'>
                        <button type="button" name="izmeni" value="<?= $row["id_model"] ?>" class="btn btn-primary">
                            Izmeni
                        </button>
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

