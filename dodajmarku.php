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


if($_SESSION["role"] == "admin"){


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["naziv"]))) {
        $naziv_err = "Unesite naziv marke";
    } else {
        $naziv = trim($_POST["naziv"]);
    }

    if (empty($naziv_err)) {

        $sql = "INSERT INTO marka_laptopa(naziv_marke) VALUES (?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_naziv,);

            $param_naziv = $naziv;

            if (mysqli_stmt_execute($stmt)) {
                header("Location: dodajmodel.php");
            } else {
                echo "Dodavanje nije uspelo molimo vas pokusajte kasnije";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }


}



?>


    <div class="container">
        <div class="row">
            <div class="col-lg-8"
                 style="color:black; background-color: silver; border: 8px orange inset; margin-top: 180px;">
                <form method="post">
                    <div class="form-group">
                        <label for="usr">Naziv marke : </label>
                        <input type="text" class="form-control" name="naziv">
                    </div>
                    <button type="submit" class="btn btn-primary" name="dodaj"
                            style="margin-left: 45%; margin-top: 10px; margin-bottom: 10px;">Dodaj marku
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php
}
?>