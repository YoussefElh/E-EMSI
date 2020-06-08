<?php
if (isset($_GET["IDF"])) {
	 $id=$_GET["IDF"];
	 $req="DELETE FROM `file` WHERE `file`.`ID_File`='$id'";
	 var_dump($req);
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 $result=mysqli_query($cnx,$req);
	 if($result){	 
	 	header("Location: CrudFiles.php");
	 	echo '<script> swal("Supprimer avec succés!", "Fichier supprimer !", "success");</script>';
	
	 }
	 else{
	 	include ("CrudFiles.php");
			echo '<script>
				swal({
				  title: "Erreur !",
				  text: "Erreur de suppresion du fichier!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				});</script>';
	 }
}
?>