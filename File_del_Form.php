<?php
if (isset($_GET["IDF"])) {

	 $id=$_GET["IDF"];
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 //supp fichier depuis directory
	 $req2="select * FROM `file` WHERE `file`.`ID_File`='$id'";
	 $result2=mysqli_query($cnx,$req2);
	 $row=mysqli_fetch_array($result2);
	 $filepath = 'cours-files';
     $file = $filepath.'/'.$row['FileName'];
     //delete file mn la base
	 $req="DELETE FROM `file` WHERE `file`.`ID_File`='$id'";
	 $result=mysqli_query($cnx,$req);


	 if($result){	 
	 	unlink($file);
	 	header("Location: CrudFiles.php?SupprimerAvecSuccés");
	 	//echo '<script> swal("Supprimer avec succés!", "Fichier supprimer !", "success");</script>';
	
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