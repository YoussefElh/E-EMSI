<?php
  if(!isset($_SESSION)){
    session_start();
}
//info complet
if(isset($_POST['AjouterFdv'])){	
if(isset($_POST['DescriptionDv'])&&!empty($_POST['DescriptionDv'])&&isset($_POST['idDevoir'])&&!empty($_POST['idDevoir'])){


		$desc=$_POST['DescriptionDv'];
		$idDevoir=$_POST['idDevoir'];
		$id=$_SESSION['idu'];
		//select idprof
		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
		$req="select p.ID_Etud from user s,etudiant p where p.FK_ID_USER=s.ID_User and s.ID_User='$id'";
		$result=mysqli_query($cnx,$req);
		$row=mysqli_fetch_array($result);
		$idEtud=$row['ID_Etud'];

		//images upload
		$fileName=$_FILES["file"]["name"];
		$imageTmpName=$_FILES["file"]["tmp_name"];
		$imageSize=$_FILES["file"]["size"];
		$imageError=$_FILES["file"]["error"];
		$imageType=$_FILES["file"]["type"];
		$maxSize=52428800;

		$imgExt=explode(".", $fileName);
		$imgActExt=strtolower(end($imgExt));
		$allowed=array("docx","pdf","pptx","xlsx","zip","rar","doc","txt");

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
					include ("CrudDevoir.php");
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

					$target="devoir-files/".$fileNewName;
					move_uploaded_file($imageTmpName,$target);
					$req="insert into filedevoir values('','$fileNewName','$desc','$idEtud','$idDevoir')";
					$result=mysqli_query($cnx,$req);
					header('Location: CrudDevoir.php?DevoirRendu');
					
				}			
			}
			else{
				include ("CrudDevoir.php");
				echo "<script>alert('error l'hors de l'importation de fichier);</script>";
				}
	}	
		else{
				include ("CrudDevoir.php");
				echo "<script>alert('vous pouvez pas ajouter ce type de fichier !');</script>";
		} 

	

}
	else{
				include ("CrudDevoir.php");
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