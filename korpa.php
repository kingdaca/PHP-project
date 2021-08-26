<?php
session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "config/config.php";
require_once "header.php";

style1();
nav_header();


?>
<?php   
 
 $connect = mysqli_connect("localhost", "root", "", "it210proba");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id' => $_GET["id"],  
                     'item_name' =>   $_POST["hidden_name"],  
                     'item_price' =>  $_POST["hidden_price"],  
                     'item_quantity' =>  $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Stakva je vec dodata!")</script>';  
                echo '<script>window.location="korpa.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Stavka je obrisana!")</script>';  
                     echo '<script>window.location="korpa.php"</script>';  
                }  
           }  
      }  
 }  
 ?>


    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Stranica sa proizvodima</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Pocetna<span class="lnr lnr-arrow-right"></span></a>
                        <a href="korpa.php">Kupovina<span class="lnr lnr-arrow-right"></span></a>
                        <a href="korpa.php">Stranica sa proizvodima</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="cart_area">
   <br />  
           <div class="container" >  
                <h3 class="center">Neki od proizvoda koje mozete kupiti</h3><br />  
                <?php  
                $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="korpa.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img style="  display: block; width: 100%; height: auto;" src="slike/<?php echo $row["image"] ?>" class="img-responsive" /><br />
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Dodaj u korpu" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?> 
                <div style="clear:both"></div>  
                <br />  
                <h3>Detalji poruzbine</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Ime stavke</th>  
                               <th width="10%">Kolicina</th>  
                               <th width="20%">Cena</th>  
                               <th width="10%">Ukupna cena</th>
                               <th width="5%">Kupi</th>
                               <th width="5%">Obrisi</th>
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>
                              <form>
                               <td><?php echo $values["item_name"]; ?></td>
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>

                               <td><a href="korpa.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Obrisi</span></a></td>
                                  <td><button type="submit" name="kupi"><span class="text-success">Kupi</span> </button> </td>
                              </form>

                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);


                               }  
                          ?>

                          <tr>  
                               <td colspan="3" align="right">Ukupno</td>
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>
                </div>  
           </div>
           <br />

        <?php

        if(isset($_GET["kupi"])){

            $sql = "INSERT INTO narudzbenica(id_user,id_product) VALUE (?,?)";

            if($stmt = mysqli_prepare($link,$sql)){
                mysqli_stmt_bind_param($stmt,"ii",$parametar_iduser,$parametar_idartikal);

                $parametar_iduser = $_SESSION["id"];
                $parametar_idartikal = $values["item_id"];

                if(mysqli_stmt_execute($stmt)){
                    echo '<script>alert("Uspesno ste kupili laptop")</script>';
                    header("Location: korpa.php");
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>window.location="korpa.php"</script>';
                }
                mysqli_stmt_close($stmt);

            }

        }

        ?>
            
</section>



    
    <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-3  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>O nama </h6>
            <p>
              Nasa firma se bavi uvozom i prodajom laptop racunara na manje i vece kolicine u zavisnotsi od Vasih potreba.
            </p>
          </div>
        </div>
        <div class="col-lg-4  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Pretplati se </h6>
            <p>Informisite se za sve nase popuste koje imamo.</p>
            <div class="" id="mc_embed_signup">

              <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
               method="get" class="form-inline">

                <div class="d-flex flex-row">

                  <input class="form-control" name="EMAIL" placeholder="Unesite Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Unesite Email '"
                   required="" type="email">


                  <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                  <div style="position: absolute; left: -5000px;">
                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                  </div>

                  
                </div>
                <div class="info"></div>
              </form>
            </div>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Pratite nas</h6>
            <p>Pratite nas na drustevnim mrezama.</p>
            <div class="footer-social d-flex align-items-center">
              <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
              <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
              <a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a>
              
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
     crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>