
<?php

session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include_once("header.php");
include_once("config/config.php");

mysqli_set_charset($link,"utf8");

if($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)){
    if(!empty(trim($_GET["search"]))){
        $sql = "SELECT * FROM tbl_product JOIN model_laptopa ON tbl_product.model_id = model_laptopa.id_model JOIN marka_laptopa ON marka_laptopa.id_marka = model_laptopa.marka_id 
        WHERE marka_laptopa.naziv_marke LIKE '%".trim($_GET["search"])."%' OR model_laptopa.naziv_modela LIKE '%".trim($_GET["search"])."%' OR name LIKE '%".trim($_GET["search"])."%'";

        try{
            $result = mysqli_query($link,$sql);
        } catch (mysqli_sql_exception $ex){
            echo "Artikal nije pronadjen";
        }
        mysqli_close($link);
    }
}

style1();
nav_header();

?>


<!-- Podesavanje artikla -->
<style>


    .modeli{
        border: 5px orange solid;
        background: white;
        color: #333333;
        margin-bottom: 2%;
        font-weight: 900;
    }

    .modeli input{
        background-color: #141414;
        color: #9d9d9d;
        border: 2px orange solid;
    }

    .modeli input:hover{
        background-color: #141414;
        color: orange;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;

    }

    .table{
        color: #333333;
        background-color: white;
        font-weight: bold;
        border: 5px orange solid;
    }

    .table tbody{
        border: 3px orange solid;
    }

    .table tbody button{
        border: 0px;
        background-color: white;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 style="text-align: center; color: white; margin-top: 80px;"> Pretraga po svim parametrima </h2>
            <form action="" method="GET" style="margin-top: 100px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">

                </div>
            </form>

        </div>
    </div>
</div>

<h2 style="text-align: center; color: white;">Ponuda modela</h2>
<?php

if($result != null){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)):

            ?>

            <div id="model" class="container" style="margin-right: 100px; margin-bottom: 50px;">
                <form method="POST" action="modeli.php?action=add&id=<?php echo $row["id"]?>">
                    <div  class="modeli row">
                        <div class="col-lg-4">
                            <img src="slike/<?php echo $row["image"] ?>" class="image">
                            <div class="overlay">
                                <div class="text"></div>
                            </div>
                        </div>
                        <div class="col-lg-8" style="background-color: lightgray;">
                            <h5 > Marka : <?php echo  $row["name"] ?></h5>
                            <h5 value="<?php echo  $row["naziv_modela"] ?>"> Model : <?php echo  $row["naziv_modela"] ?></h5>

                            <h5 value="<?php echo $row["price"] ?>">  Cena : <?php echo $row["price"] ?> </h5>
                            <h5 >  Opis : <?php echo $row["opis"] ?></h5>
                            <input type="hidden" name="naziv" value="<?php echo  $row["name"] ?>">
                            <input type="hidden" name="naziv_modela" value="<?php echo  $row["naziv_modela"] ?>">

                            <input type="hidden" name="price" value="<?php echo  $row["price"] ?>">


                            <td><a href="korpa.php"><span  class="btn btn-primary" style="margin-left: 40%; margin-bottom: 10px;">Dodaj</span></a></td>

                        </div>
                    </div>
                </form>
            </div>

        <?php
        endwhile;
    } else {
        echo "<p style='color: white;'> Nema rezultat</p>";
    }
}
?>


