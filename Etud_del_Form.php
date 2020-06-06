<?php
if (isset($_GET["IDU"])) {
	 $id=$_GET["IDU"];
	 $req="DELETE FROM `user` WHERE `user`.`ID_User`='$id'";
	 var_dump($req);
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 $result=mysqli_query($cnx,$req);
	 if($result){	 
	 	header("Location: CrudEtud.php");
	 	echo '<script> swal("Supprimer avec succés!", "Etudiant supprimer !", "success");</script>';
	
	 }
	 else{
	 	include ("CrudEtud.php");
					echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Erreur de suppresion du Etudiant!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
	 }
}
?>