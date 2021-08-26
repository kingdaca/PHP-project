<script src="js/slider.js"></script>
<?php

session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config/config.php";
require_once "header.php";


if($_SESSION["role"] == "admin") {




    $ime = $image = $cena =  $opis = $id_model = "";
    $ime_err = $cena_err = $opis_err = "";


    $model = "";
    $model_err =  "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $model = $_POST["model"];

        if (empty(trim($_POST["ime"]))) {
            $ime_err = "Unesite ime";
        } else {
            $ime = trim($_POST["ime"]);
        }
        if (empty(trim($_POST["cena"]))) {
            $cena_err = "Unesite cenu";
        } else {
            $cena = trim($_POST["cena"]);
        }
        if (empty(trim($_POST["opis"]))) {
            $opis_err = "Unesite opis";
        } else {
            $opis = trim($_POST["opis"]);
        }

        $image = $_FILES['image']['name'];

        $target = "slike/" . basename($image);


        if (empty($kubikaza_err) && empty($cena_err) && empty($opis_err)) {


            $sql = "INSERT INTO tbl_product(name, image, price, opis, model_id) VALUE (?,?,?,?,?)";

            if ($stmt = mysqli_prepare($link, $sql)) {

                mysqli_stmt_bind_param($stmt, "ssdsi", $parametar_ime, $image, $parametar_cena, $parametar_opis, $model);

                $parametar_ime = $ime;
                $parametar_cena = $cena;
                $parametar_opis = $opis;
                mysqli_set_charset($link, "utf8");


                if (mysqli_stmt_execute($stmt)) {

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                    } else {
                        $msg = "Failed to upload image";
                    }
                    header("Location: korpa.php");
                } else {
                    echo "<p style='color: white;'>Upis nije usepeo pokusajte ponovo</p>";
                }

                mysqli_stmt_close($stmt);
            }
            mysqli_close($link);
        }

    }


    ?>


    <?php


    function listaMarke()
    {

        $conn = mysqli_connect("localhost:3306", "root", "", "it210proba");
        $lista = "";
        $sql = "SELECT id_marka,naziv_marke FROM marka_laptopa";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $lista .= '<option value="' . $row["id_marka"] . '">' . $row["naziv_marke"] . '</option>';
        }
        return $lista;
    }

    ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-8"
                 style="color:black; background-color: silver; border: 8px orange inset; margin-top: 180px;">
                <label> Marka : </label>
                <select id="marka" name="marka" style="margin-bottom: 5px; margin-top: 10px; ">
                    <option value=""> Izaberite marku</option>
                    <?php echo listaMarke() ?>
                </select>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
                <!-- Value of marka -->
                <script type="text/javascript">
                    $(function () {
                        $('#marka').change(function (e) {
                            var marka_id = $(this).val();
                            $.ajax({
                                type: 'GET',
                                url: 'funkcije.php',
                                data: {marka_id: marka_id},
                                success: function (data) {
                                    $('#model').html(data);
                                }
                            });
                        });
                    });

                </script>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" role="form"
                      enctype="multipart/form-data">
                    <label for="model"> Velicina ekrana : </label>
                    <select id="model" style="margin-bottom: 5px;" name="model">
                        <option> Izaberite velicinu ekrana</option>
                    </select>
                    <br>
                    <label for="ime"> Ime : </label>
                    <input id="ime" type="text" class="form-control" name="ime" placeholder="Unesite ime"
                           required>

                    <label for="cena"> Cena : </label>
                    <input id="cena" type="text" class="form-control" name="cena" placeholder="Cena" required>
                    <label for="opis"> Opis : </label>
                    <textarea id="opis" class="form-control" rows="5" id="comment" name="opis" placeholder="Opis"
                              required></textarea>

                    <input type="file" name="image">

                    <button type="submit" class="btn btn-primary" name="upisi" style="margin-left: 45%;">Dodaj
                    </button>

                </form>

            </div>
        </div>
    </div>

    <?php
}
?>