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
        <h1> Tabela artikla </h1>
    </div>
</div>
<table class="table table-hover"
       style="color: black; border: 5px orange solid; margin-top: 20px; background-color: white;">
    <tr>
        <th>id</th>
        <th>naziv</th>
        <th>naziv modela</th>

        <th>cena</th>
        <th></th>
    </tr>
    <from metod="POST" action="config/config.php">
        <?php
        $sql = "SELECT * FROM tbl_product JOIN model_laptopa ON tbl_product.model_id = model_laptopa.id_model JOIN  marka_laptopa ON marka_laptopa.id_marka = model_laptopa.marka_id ";
     //  $sql = "SELECT * FROM artikal JOIN model ON artikal.model_id = model.id_model JOIN marka ON marka.id_marka = model.marka_id";
        $stmt = $link->query($sql);

        if ($stmt->num_rows > 0){
        while ($row = $stmt->fetch_assoc()):?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>

                <td><?= $row["opis"] ?></td>
                <td><?= $row["price"] ?></td>
                <td style="width: 15%">
                    <a href='deleteArtikal.php?id=<?= $row["id"] ?>"' title='Delete Record' data-toggle='tooltip'>
                        <button type="submit" name="delete" class="btn btn-danger"> Obrisi</button>
                    </a>
                    <a href='updateArtikal.php?id=<?= $row["id"] ?>"' title='Delete Record' data-toggle='tooltip'>
                        <button type="button" name="izmeni" value="<?= $row["id"] ?>" class="btn btn-primary">
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
