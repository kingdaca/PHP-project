<html>
<head>
<title>PHP skripta - Pretrazivanje baze podataka</title>
</head>
<style>


<?php
$connection = mysqli_connect('localhost','root','','it210Projekat');
$output='';
if(isset($_POST['search'])){
    $searchkey= $_POST['search'];
    $searchkey=preg_replace("#[^0-9a-z]#i", "", $searchkey);

    $query = mysqli_query($connection,"SELECT * FROM rezervacijadnevnihobilazaka WHERE rezIme LIKE '%$searchkey%' OR rezPrezime LIKE '%$searchkey%' OR rezEmail LIKE '%$searchkey%'") or die("Nije moguce pretraziti!");
    $count = mysqli_num_rows($query);

    if($count == 0){
        $output="Nema rezultata!";
    }
    else{
        while($row=mysqli_fetch_array($query)){
            $rezIme=$row['rezIme'];
            $rezPrezime=$row['rezPrezime'];
			$rezEmail=$row['rezEmail'];
			

            $output .='<div> Ime korisnika je:  '.$rezIme.' ---> Prezime je je: '.$rezPrezime.' ---> Email je: '.$rezEmail.' <br></div>' ;


        }
    }
}
?>
<center>
<body>
<p>Pretrazite korisnika koji je rezervisao dnevni obilazak pomocu imena, prezimena ili email-a</p>
	<form action="pretragadnevnihobilazaka.php" method="post">
	<input type="text" name="search" placeholder="Pretraga rezerveracija..."/>
	<input type="submit" value="Pretrazi"/>
	</form>
	<?php print ("$output");?>
</body>



</html>