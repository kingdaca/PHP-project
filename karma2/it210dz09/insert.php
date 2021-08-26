<?php
session_start();
require_once "config/config.php";


$ime_artikla = "";
$ime_artikla_err = "";
$sifra_artikla = "";
$sifra_artikla_err = "";

$bar_code = "";
$bar_code_err = "";

$vrsta_artikla ="" ;
$vrsta_artikla_err="";

$artikal_id ="";
$artikal_id_err="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["ime_artikla"]))) {
        $ime_artikla_err = "Unesite naziv artikal";
    } else {
        $ime_artikla = trim($_POST["ime_artikla"]);
    }
    if (empty(trim($_POST["sifra_artikla"]))) {
        $sifra_artikla_err = "Unesite sifru_artikla";
    } else {
        $sifra_artikla = trim($_POST["sifra_artikla"]);
    }
    if (empty(trim($_POST["bar_code"]))) {
        $bar_code_err = "Unesite bar code";
    } else {
        $bar_code = trim($_POST["bar_code"]);
    }
    if (empty(trim($_POST["vrsta_artikla"]))) {
        $vrsta_artikla_err = "Unesite vrstu artikla";
    } else {
        $vrsta_artikla = trim($_POST["vrsta_artikla"]);
    }
    if (empty(trim($_POST["artikal_id"]))) {
        $artikal_id_err = "Unesite naziv artikal";
    } else {
        $artikal_id= trim($_POST["artikal_id"]);
    }

    if (empty($ime_artikla_err)) {

        $sql = "INSERT INTO prodavnica(ime_artikla,sifra_artikla,bar_code,vrsta_artikla,artikal_id) VALUES (?,?,?,?,?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sissi", $param_ime_artikla,$sifra_artikla,$param_bar_code,$param_vrsta_artikla,$param_artikal_id);

            $param_ime_artikla = $ime_artikla;
            $param_sifra_artikla = $sifra_artikla;
            $param_bar_code = $bar_code;
            $param_vrsta_artikla = $vrsta_artikla;
            $param_artikal_id = $artikal_id;
            if (mysqli_stmt_execute($stmt)) {
                header("Location: tabela.php");

            } else {
                echo "Dodavanje nije uspelo molimo vas pokusajte kasnije";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }


}


