<?php
if (isset($_GET["ID_dv_del"])) {

	 $id=$_GET["ID_dv_del"];
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 //supp fichier depuis directory
	 $req2="select * FROM `filedevoir` WHERE `filedevoir`.`ID_FileDv`='$id'";
	 $result2=mysqli_query($cnx,$req2);
	 $row=mysqli_fetch_array($result2);
	 $filepath = 'devoir-files';
     $file = $filepath.'/'.$row['FileNameDv'];
     //delete file mn la base
	 $req="DELETE FROM `filedevoir` WHERE `filedevoir`.`ID_FileDv`='$id'";
	 $result=mysqli_query($cnx,$req);


	 if($result){	 
	 	unlink($file);
	 	header("Location: CrudDevoir.php?SupprimerAvecSuccés");
	 	//echo '<script> swal("Supprimer avec succés!", "Fichier supprimer !", "success");</script>';
	
	 }
	 else{
	 	include ("CrudDevoir.php");
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