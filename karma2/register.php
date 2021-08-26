<?php
require_once "config/config.php";

$username = $password = $confirm_password = $email = $name = $last_name = "";
$username_err = $password_err = $confirm_password_err = $email_err = $name_err = $last_name_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Molimo Vas unesite vase ime.";
    } else {
        $name = trim($_POST["name"]);
    }


    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Molimo Vas unesite prezime.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Molimo Vas unesite email.";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["email"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "Email se vec koristi.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Nesto nije u redu. Molimo Vas pokusajte kasnije.";
            }
        }

        mysqli_stmt_close($stmt);
    }


    if (empty(trim($_POST["username"]))) {
        $username_err = "Molimo Vas unesite username.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Username se vec koristi.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Nesto nije u redu. Molimo Vas pokusajte kasnije.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Molimo Vas unesite vas password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password mora da ima minimum 6 karaktera.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Molimo Vas potvrdite password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password se ne podudara.";
        }
    }

    if (
        empty($name_err) && empty($last_name_err) && empty($email_err)
        && empty($username_err) && empty($password_err) && empty($confirm_password_err)
    ) {

        $sql = "INSERT INTO users (name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_last_name, $param_email, $param_username, $param_password);

            $param_name = $name;
            $param_last_name = $last_name;
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_BCRYPT); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Nesto nije u redu. Molimo Vas pokusajte kasnije.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="col-lg-5">
        <div class="register_form_inner">
            <h3>Registruj se</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="col-md-8 form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label>Ime</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>
                <div class="col-md-8 form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                    <label>Prezime</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                    <span class="help-block"><?php echo $last_name_err; ?></span>
                </div>
                <div class="col-md-8 form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="col-md-8 form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="col-md-8 form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="col-md-8 form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Potvrdite password</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="col-md-8 form-group">


                    <input type="submit" class="btn btn-primary" value="Posalji">

                    <input type="reset" class="btn btn-default" value="Resetuj">
                </div>

                <p>Vec imate nalog?<a href="login.php">Prijavite se sada</a>.</p>
            </form>
        </div>
</body>

</html>