<?php
session_start();





    require_once "config/config.php";

    if (isset($_POST["id"]) && !empty($_POST["id"])) {

        $sql = "DELETE FROM prodavnica WHERE id = ?";


        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = trim($_POST["id"]);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Artikal je uspesno obrisan")</script>';
                header("location: tabela.php");
                exit();
            } else {
                echo "Greska";
            }

        }

        mysqli_stmt_close($stmt);

        mysqli_close($conn);
    } else {
        if (empty(trim($_GET["id"]))) {
            header("location: tabela.php");
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
                        <h1>Obrisi artikal</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Da li ste sigurni da zelite obrisati artikal?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="tabela.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

