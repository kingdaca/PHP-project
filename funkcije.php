<?php



$conn = mysqli_connect("localhost:3306","root", "", "it210proba");
$lista = "";
$sql = "SELECT id_model,naziv_modela FROM model_laptopa WHERE marka_id  = '".$_GET["marka_id"]."'";
$result = mysqli_query($conn,$sql);
$lista = '<option value=""> Izaberit Marku </option>';
while($row = mysqli_fetch_assoc($result)){
    $lista .= '<option value="'.$row["id_model"].'">'.$row["naziv_modela"].'</option>';
}
echo $lista;


?>