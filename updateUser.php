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

    $name = $last_name = $role = "";
    $name_err = $last_name_err = $role_err = "";

// Processing form data when form is submitted
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $id = $_POST["id"];

        $input_name = trim($_POST["name"]);
        if (empty($input_name)) {
            $name_err = "Unesite ime";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Unesite validno ime";
        } else {
            $name = $input_name;
        }

        $input_last_name = trim($_POST["last_name"]);
        if (empty($input_last_name)) {
            $last_name_err = "Unesite prezime";
        } else {
            $last_name = $input_last_name;
        }

        $input_role = trim($_POST["role"]);
        if (empty($input_role)) {
            $role_err = "Unesite role";
        } else {
            $role = $input_role;
        }

        if (empty($name_err) && empty($last_name_err) && empty($role_err)) {
            $sql = "UPDATE users SET name=?, last_name=?, role=? WHERE id=?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_last_name, $param_role, $param_id);

                $param_name = $name;
                $param_last_name = $last_name;
                $param_role = $role;
                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    header("location: tblKorisnici.php");
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

            $sql = "SELECT * FROM users WHERE id = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                $param_id = $id;

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $name = $row["name"];
                        $last_name = $row["last_name"];
                        $role = $row["role"];
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
                        <h2>Izmeni korisnika</h2>
                    </div>
                    <p>Unesite izmene</p>
                    <form style="margin-bottom: 5%;"
                          action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Ime</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                            <label>Prezime</label>
                            <input name="last_name" class="form-control" value="<?php echo $last_name; ?>"> </input>
                            <span class="help-block"><?php echo $last_name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
                            <label>Role</label>
                            <input type="text" name="role" class="form-control" value="<?php echo $role; ?>">
                            <span class="help-block"><?php echo $role_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Izmeni">
                        <a href="tblKorisnici.php" class="btn btn-default">Odustani</a>
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