<?php
if (isset($_GET["ID_Cours"])) {
	 $id=$_GET["ID_Cours"];
	 $req="DELETE FROM `cours` WHERE `cours`.`ID_Cours`='$id'";
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 $result=mysqli_query($cnx,$req);
	 if($result){	 
	 	header("Location: CrudCours.php?coursSupprimé");
	 	
	
	 }
	 else{
	 	include ("CrudCours.php");
					echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Erreur de suppresion du Cours!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
	 }
}
	 

?>