<?php
if (isset($_GET["ID_User"])) {
	 $id=$_GET["ID_User"];
	 $req="DELETE FROM `user` WHERE `user`.`ID_User`='$id'";
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 $result=mysqli_query($cnx,$req);
	 if($result){	 
	 	header("Location: CrudProf.php");
	 	echo '<script> swal("Supprimer avec succés!", "Professeur supprimer !", "success");</script>';
	
	 }
	 else{
	 	include ("CrudProf.php");
					echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Erreur de suppresion du Professeur!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
	 }
}
	 

?>