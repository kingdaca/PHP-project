<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
require_once("config/config.php");

if($_SESSION["role"] == "admin") {
    if (isset($_POST["id"]) && !empty($_POST["id"])) {

        $sql = "DELETE FROM model_laptopa WHERE id_model = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = trim($_POST["id"]);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Model je uspesno obrisan")</script>';
                header("location: tblModela.php");
                exit();
            } else {
                echo "Greska!!!";
            }
        }

        mysqli_stmt_close($stmt);

        mysqli_close($link);
    } else {
        if (empty(trim($_GET["id"]))) {
            header("location: tblModela.php");
            exit();
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>View Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper {
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">

                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Da li ste sigurni da zelite da obrisete?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="tabelaModela.php" class="btn btn-default">No</a>
                            </p>
                        </div>
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