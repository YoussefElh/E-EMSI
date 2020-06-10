<?php
  if(!isset($_SESSION)){
    session_start();
}
//info complet
if(isset($_POST['prfComplete'])){	
if(isset($_POST['nom'])&&!empty($_POST['nom'])&&isset($_POST['prenom'])&&!empty($_POST['prenom'])&&isset($_POST['email'])&&!empty($_POST['email'])){





		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$id=$_SESSION['idu'];
		$photo="def.jpg";
		$class="1";
		//images upload
		$imageName=$_FILES["image"]["name"];
		$imageTmpName=$_FILES["image"]["tmp_name"];
		$imageSize=$_FILES["image"]["size"];
		$imageError=$_FILES["image"]["error"];
		$imageType=$_FILES["image"]["type"];
		$maxSize=5000000;

		$imgExt=explode(".", $imageName);
		$imgActExt=strtolower(end($imgExt));
		$allowed=array("jpg","jpeg","png");
		
		$Time=time();
		
		if(in_array($imgActExt, $allowed)){
			if($imageError===0){
				if($imageSize>$maxSize){
					include ("ProfileComplete.php");
					echo "<script>alert('votre image ne doit pas dépasser 5 mb');</script>";
				}
				else{
					$imageNewName = $Time.".".$imgActExt;
					$target="img-profile/".$imageNewName;
					move_uploaded_file($imageTmpName,$target);
					$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

					if($_SESSION['role']=="Admin"){
						
						$req="insert into admin values('','$nom','$prenom','$email','$imageNewName','$id')";
						$result=mysqli_query($cnx,$req);
						header('Location: index.php');

					}
					else if($_SESSION['role']=="Prof"){
						
						$req="insert into professeur values('','$nom','$prenom','$email','$imageNewName','$id')";
						$result=mysqli_query($cnx,$req);
						header('Location: index.php');
					}
					else if($_SESSION['role']=="Etud"){
						
						$req="insert into etudiant values('','$nom','$prenom','$email','$imageNewName','$id','$class')";
						$result=mysqli_query($cnx,$req);
						header('Location: index.php');
							}
						}
			}
			else{
				include ("ProfileComplete.php");
				echo "<script>alert('error l'hors de l'importation d'image');</script>";
				}
		}
		else{
				include ("ProfileComplete.php");
				echo "<script>alert('vous pouvez pas ajouter ce type d'image !');</script>";
		} 

	}
	else{
				include ("ProfileComplete.php");
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