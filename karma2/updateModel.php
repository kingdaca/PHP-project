<?php
require_once "header.php";
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once "config/config.php";

if($_SESSION["role"] == "admin") {


    style1();
    nav_header();

    $naziv_modela = "";
    $naziv_modela_err = "";

// Processing form data when form is submitted
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = $_POST["id"];

        $input_naziv_modela = trim($_POST["naziv_modela"]);
        if (empty($input_naziv_modela)) {
            $naziv_modela_err = "Unesite naziv";

        } else {
            $naziv_modela = $input_naziv_modela;
        }

        if (empty($naziv_modela_err)) {
            $sql = "UPDATE model_laptopa SET naziv_modela=? WHERE id_model=?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $param_naziv_modela, $param_id);

                $param_naziv_modela = $naziv_modela;
                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    header("location: tblModela.php");
                    exit();
                } else {
                    echo "Pokusajte kasnije!!!";
                }
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_close($link);
    } else {
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            $id = trim($_GET["id"]);

            $sql = "SELECT * FROM model_laptopa WHERE id_model= ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $naziv_modela = $row["naziv_modela"];

                    } else {
                        header("location: tblModela.php");
                        exit();
                    }

                } else {
                    echo "Pokusajte kasnije";
                }
            }

            mysqli_stmt_close($stmt);

            mysqli_close($link);
        } else {
            header("location: tblModela.php");
            exit();
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper {
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body style="margin-top: 10%; color: white;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="border: 5px orange solid; background-color: white; color:black;">
                    <div class="page-header">
                        <h2>Izmeni model</h2>
                    </div>
                    <p>Unesite izmene</p>
                    <form style="margin-bottom: 5%;"
                          action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($naziv_modela_err)) ? 'has-error' : ''; ?>">
                            <label>Velicina ekrana</label>
                            <input type="text" name="naziv_modela" class="form-control" value="<?php echo $naziv_modela; ?>">
                            <span class="help-block"><?php echo $naziv_modela_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Izmeni">
                        <a href="tblModela.php" class="btn btn-default">Odustani</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>