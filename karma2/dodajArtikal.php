<?php
require_once "header.php";
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once "config/config.php";
if($_SESSION["role"] == "admin") {

    mysqli_set_charset($link, "utf8");

    style1();
    nav_header();

    $name = $price = $opis = "";
    $name_err = $price_err = $opis_err = "";

// Processing form data when form is submitted
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = $_POST["id"];

        $input_name = trim($_POST["name"]);
        if (empty($input_name)) {
            $name_err = "Unesite ime";
        } else {
            $name = $input_name;
        }

        $input_price = trim($_POST["price"]);
        if (empty($input_cena)) {
            $price_err = "Unesite cenu";
        } else {
            $price = $input_price;
        }

        $input_opis = trim($_POST["opis"]);
        if (empty($input_opis)) {
            $opis_err = "Unesite opis";
        } else {
            $opis = $input_opis;
        }

        if (empty($name_err) && empty($price_err) && empty($opis_err)) {
            $sql = "UPDATE tbl_product SET name=?, price=?, opis=? WHERE id=?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "sisi", $param_name, $param_price, $param_opis, $param_id);

                $param_name = $name;
                $param_price = $price;
                $param_opis = $opis;
                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    header("location: tblArtikala.php");
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

            $sql = "SELECT * FROM tbl_product WHERE id = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $name = $row["name"];
                        $price = $row["price"];
                        $opis = $row["opis"];
                    } else {
                        header("location: tblArtikala.php");
                        exit();
                    }

                } else {
                    echo "Pokusajte kasnije";
                }
            }

            mysqli_stmt_close($stmt);

            mysqli_close($link);
        } else {
            header("location: tblArtikala.php");
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
                        <h2>Izmeni artikal</h2>
                    </div>
                    <p>Unesite izmene</p>
                    <form style="margin-bottom: 5%;"
                          action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Ime</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Cena</label>
                            <input name="cena" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($opis_err)) ? 'has-error' : ''; ?>">
                            <label>Opis</label>
                            <textarea type="text" name="opis" class="form-control"><?php echo $opis; ?></textarea>
                            <span class="help-block"><?php echo $opis_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Izmeni">
                        <a href="tabelaArtikla.php" class="btn btn-default">Odustani</a>
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