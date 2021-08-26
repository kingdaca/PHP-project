<?php
function import(){
    session_start();
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: ../login.php");
        exit;
    }

    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
        header("location: ../index.php");
        exit;
    }
}
function nav_header(){ ?>
<nav class="navbar navbar-dark bg-primary justify-content-end">
    <a class="navbar-brand" style="color: aliceblue" href="index.php">IT210</a>
    <div class="navbar-nav" style="float: right">
        Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.
        <a href="search.php" class="btn btn-info">Search</a>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </div>

</nav>

<?php }
function nav_header1(){ ?>
    <nav class="navbar navbar-dark bg-primary justify-content-end">
        <a class="navbar-brand" style="color: aliceblue" href="../index.php">IT210</a>
        <div class="navbar-nav" style="float: right">
            Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.
            <a href="../search.php" class="btn btn-info">Search</a>
            <a href="../reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="../logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </div>

    </nav>
<?php }

function style1(){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper {
                width: 650px;
                margin: 0 auto;
            }

            .page-header h2 {
                margin-top: 0;
            }

            table tr td:last-child a {
                margin-right: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
<?php
}

function style2(){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
<?php } ?>