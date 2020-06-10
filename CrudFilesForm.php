<?php
  if(!isset($_SESSION)){
    session_start();
}
//info complet
if(isset($_POST['Ajouter'])){	
if(isset($_POST['description'])&&!empty($_POST['description'])&&isset($_POST['idCours'])&&!empty($_POST['idCours'])){


		$desc=$_POST['description'];
		$idCours=$_POST['idCours'];
		$id=$_SESSION['idu'];
		//select idprof
		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
		$req="select p.ID_Prof from user s,professeur p where p.FK_ID_USER=s.ID_User and s.ID_User='$id'";
		$result=mysqli_query($cnx,$req);
		$row=mysqli_fetch_array($result);
		$idprof=$row['ID_Prof'];

		//images upload
		$fileName=$_FILES["file"]["name"];
		$imageTmpName=$_FILES["file"]["tmp_name"];
		$imageSize=$_FILES["file"]["size"];
		$imageError=$_FILES["file"]["error"];
		$imageType=$_FILES["file"]["type"];
		$maxSize=52428800;

		$imgExt=explode(".", $fileName);
		$imgActExt=strtolower(end($imgExt));
		$allowed=array("jpg","jpeg","png","docx","pdf","pptx","xlsx","zip","rar","doc","txt");

		//$size=filesize('cours-files/'.$fileName);
		//var_dump($size);
		var_dump($fileName);
		var_dump($imageTmpName);
		var_dump($imageSize);
		var_dump($imageError);
		var_dump($imageType);
		$Time=time();

		if(in_array($imgActExt, $allowed)){
			if($imageError===0){
				if($imageSize>$maxSize){
					include ("CrudFiles.php");
					echo '<script>
						swal({
						  title: "Erreur !!",
						  text: "Le fichier ne doit pas dépassez 50 Mb ! ",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
				}
				else{
					$fileNewName = str_replace(' ', '', $desc).$Time.".".$imgActExt;

					$target="cours-files/".$fileNewName;
					move_uploaded_file($imageTmpName,$target);
					$req="insert into file values('','$fileNewName','$desc','$idprof','$idCours')";
					$result=mysqli_query($cnx,$req);
					header('Location: CrudFiles.php');
					
				}			
			}
			else{
				include ("CrudFiles.php");
				echo "<script>alert('error l'hors de l'importation de fichier);</script>";
				}
	}	
		else{
				include ("CrudFiles.php");
				echo "<script>alert('vous pouvez pas ajouter ce type de fichier !');</script>";
		} 

	

}
	else{
				include ("CrudFiles.php");
				echo '<script>
						swal({
						  title: "Les champs sans vide?",
						  text: "Vous devez compléter toutes les informations!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
				
	}
}


?>