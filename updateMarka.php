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

    $naziv_marke = "";
    $naziv_marke_err = "";

// Processing form data when form is submitted
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = $_POST["id"];

        $input_naziv_marke = trim($_POST["naziv_marke"]);
        if (empty($input_naziv_marke)) {
            $naziv_marke_err = "Unesite naziv";
        } elseif (!filter_var($input_naziv_marke, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $naziv_marke_err = "Unesite validn naziv";
        } else {
            $naziv_marke = $input_naziv_marke;
        }


        if (empty($naziv_marke_err)) {
            $sql = "UPDATE marka_laptopa SET naziv_marke=? WHERE id_marka=?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $param_naziv_marke, $param_id);

                $param_naziv_marke = $naziv_marke;
                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    header("location: tblMarka.php");
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

            $sql = "SELECT * FROM marka_laptopa WHERE id_marka = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $naziv_marke = $row["naziv_marke"];
                    } else {
                        header("location: error.php");
                        exit();
                    }

                } else {
                    echo "Pokusajte kasnije";
                }
            }

            mysqli_stmt_close($stmt);

            mysqli_close($link);
        } else {
            header("location: error.php");
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
                        <h2>Izmeni Marku</h2>
                    </div>
                    <p>Unesite izmene</p>
                    <form style="margin-bottom: 5%;"
                          action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($naziv_marke_err)) ? 'has-error' : ''; ?>">
                            <label>Ime</label>
                            <input type="text" name="naziv_marke" class="form-control" value="<?php echo $naziv_marke; ?>">
                            <span class="help-block"><?php echo $naziv_marke_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Izmeni">
                        <a href="tblMarka.php" class="btn btn-default">Odustani</a>
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