<?php

session_start();


require_once "config/config.php";


    mysqli_set_charset($conn, "utf8");



    $ime_artikla = $sifra_artikla = $bar_code = $vrsta_artikla = $artikal_id = "";
$ime_artikla_err = $sifra_artikla_err = $bar_code_err = $vrsta_artikla_err = $artikal_id_err ="";

// Processing form data when form is submitted
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = $_POST["id"];

        $input_ime_artikla = trim($_POST["ime_artikla"]);
        if (empty($input_ime_artikla)) {
            $ime_artikla_err = "Unesite ime artikla";

        } else {
            $ime_artikla = $input_ime_artikla;
        }

        $input_sifra_artikla = trim($_POST["sifra_artikla"]);
        if (empty($input_price)) {
            $sifra_artikla_err = "Unesite sifru artikla";
        } else {
            $sifra_artikla = $input_sifra_artikla;
        }

        $input_bar_code = trim($_POST["bar_code"]);
        if (empty($input_bar_code)) {
            $bar_code_err = "Unesite bar code";
        } else {
            $bar_code = $input_bar_code;
        }
        $input_vrsta_artikla = trim($_POST["vrsta_artikla"]);
        if (empty($input_vrsta_artikla){
            $vrsta_artikla_err = "Unesite vrstu artikla";

        } else {
            $vrsta_artikla = $input_vrsta_artikla;
        }
        $input_artikal_id = trim($_POST["artikal_id"]);
        if (empty($input_artikal_id)) {
            $artikal_id_err = "Unesite artikal id";
        } else {
            $artikal_id = $input_artikal_id;
        }

        if (empty($ime_artikla_err) && empty($sifra_artikla_err) && empty($bar_code_err))  {
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
                            <input name="price" class="form-control" value="<?php echo $price; ?>">
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
