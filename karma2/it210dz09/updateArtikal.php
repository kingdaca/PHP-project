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
    if (empty($input_vrsta_artikla)){
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

    if (empty($ime_artikla_err) && empty($sifra_artikla_err) && empty($bar_code_err) && empty($vrsta_artikla_err)&& empty($artikal_id_err)) {
        $sql = "UPDATE prodavnica SET ime_artikla=?, sifra_artikla=?, bar_code=?, vrsta_artikla=?, artikal_id=? WHERE id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sissi", $param_ime_artikla, $param_sifra_artikla, $param_bar_code, $param_vrsta_artikla,$param_artikal_id);

            $param_ime_artikla = $ime_artikla;
            $param_sifra_artikla = $sifra_artikla;
            $param_bar_code = $bar_code;
            $param_vrsta_artikla = $vrsta_artikla;
            $param_artikal_id = $artikal_id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: tabela.php");
                exit();
            } else {
                echo "Pokusajte kasnije!!!";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);

        $sql = "SELECT * FROM prodavnica WHERE id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $ime_artikla = $row["ime_artikla"];
                    $sifra_artikla = $row["sifra_artikla"];
                    $bar_code = $row["bar_code"];
                    $vrsta_artikla = $row["vrsta_artikla"];
                    $artikal_id = $row["artikal_id"];
                } else {
                    header("location: tabela.php");
                    exit();
                }

            } else {
                echo "Pokusajte kasnije";
            }
        }

        mysqli_stmt_close($stmt);

        mysqli_close($conn);
    } else {
        header("location: tabela.php");
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
                    <div class="form-group <?php echo (!empty($ime_artikla_err)) ? 'has-error' : ''; ?>">
                        <label>Ime</label>
                        <input type="text" name="ime_artikla" class="form-control" value="<?php echo $ime_artikla; ?>">
                        <span class="help-block"><?php echo $ime_artikla_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($sifra_artikla_err)) ? 'has-error' : ''; ?>">
                        <label>Sifra artikla</label>
                        <input name="sifra_artikla" class="form-control" value="<?php echo $sifra_artikla; ?>">
                        <span class="help-block"><?php echo $sifra_artikla_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($bar_code_err)) ? 'has-error' : ''; ?>">
                        <label>Opis</label>
                        <textarea type="text" name="bar_code" class="form-control"><?php echo $bar_code; ?></textarea>
                        <span class="help-block"><?php echo $bar_code_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($vrsta_artikla_err)) ? 'has-error' : ''; ?>">
                        <label>Opis</label>
                        <textarea type="text" name="vrsta_artikla" class="form-control"><?php echo $vrsta_artikla; ?></textarea>
                        <span class="help-block"><?php echo $vrsta_artikla_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($artikal_id_err)) ? 'has-error' : ''; ?>">
                        <label>Opis</label>
                        <textarea type="text" name="artikal_id" class="form-control"><?php echo $artikal_id; ?></textarea>
                        <span class="help-block"><?php echo $artikal_id_err; ?></span>
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
