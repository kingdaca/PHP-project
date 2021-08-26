<?php
session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config/config.php";
require_once "header.php";

style1();
nav_header();

if($_SESSION["role"] == "admin") {


    $naziv = "";
    $naziv_err = "";
    $marka = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty(trim($_POST["model"]))) {
            $naziv_err = "Unesite naziv marke";
        } else {
            $naziv = trim($_POST["model"]);
        }

        $marka = $_POST["marka"];

        if (empty($naziv_err)) {

            $sql = "INSERT INTO model_laptopa(naziv_modela,marka_id) VALUES (?,?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $param_naziv, $parma_id);

                $param_naziv = $naziv;
                $parma_id = $marka;

                if (mysqli_stmt_execute($stmt)) {
                   header("Location: artikal.php");

                } else {
                    echo "Dodavanje nije uspelo molimo vas pokusajte kasnije";
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($link);
        }


    }


    ?>

    <?php

    $sql = "SELECT * FROM marka_laptopa";
    $result = mysqli_query($link, $sql);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8"
                 style="color:black; background-color: silver; border: 8px orange inset; margin-top: 180px;">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                    <div class="form-group">
                        <label for="usr">Naziv modela </label> <br>
                        <label> Izaberi marku : </label>
                        <select name="marka" id="inputID" class="form-control" style="margin-bottom: 2%;">
                            <?php while ($row = mysqli_fetch_assoc($result)):; ?>
                                <option value="<?php echo $row["id_marka"] ?>"><?php echo $row["naziv_marke"]; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <select name="model" id="inputID" class="form-control">
                        	<option > Izaberite velicinu ekrana</option>
                            <option > 13</option>
                            <option > 15</option>
                            <option > 17</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="dodaj"
                            style="margin-left: 45%; margin-top: 10px; margin-bottom: 10px;">Dodaj model
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php
}
?>