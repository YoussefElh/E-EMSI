<?php
if (isset($_GET["ID_dv"])) {
	 $id=$_GET["ID_dv"];
	 $req="DELETE FROM `devoir` WHERE `devoir`.`ID_Devoir`='$id'";
	 
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 $result=mysqli_query($cnx,$req);
	 if($result){	 
	 	header("Location: CrudDevoir.php?DevoirSupprimée");
	
	 }
	 else{
	 	include ("CrudDevoir.php");
					echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Erreur de suppresion du devoir!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
	 }
}
?>