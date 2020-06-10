<?php
session_start();
if(isset($_POST['prfUpdate'])){	
if(isset($_POST['nom'])&&!empty($_POST['nom'])&&isset($_POST['prenom'])&&!empty($_POST['prenom'])&&isset($_POST['email'])&&!empty($_POST['email'])){

		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		/*$login=$_POST['login'];
		$oldPassword=$_POST["old_password"];
		$password=$_POST["password"];
		$cnfpass=$_POST["re_password"];*/
		$id=$_SESSION['idu'];
		//$photo="def.jpg";
		//$class="1";
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
		//select old info 
		/*if($_SESSION['role']=="Admin"){
			
			$req="select * from user s,admin p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			$result=mysqli_query($cnx,$req);
			$row=mysqli_fetch_array($result);

		}
		else if($_SESSION['role']=="Prof"){
			
			$req="select * from user s,professeur p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			$result=mysqli_query($cnx,$req);
			$row=mysqli_fetch_array($result);
		}
		else if($_SESSION['role']=="Etud"){
			
			$req="select * from user s,etudiant p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			$result=mysqli_query($cnx,$req);
			$row=mysqli_fetch_array($result);
		}*/
			//UPDATE admin SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE admin.ID_Admin = '$id'
		
			
		
			

		
	if(isset($imageName)){
		if(in_array($imgActExt, $allowed)){
			if($imageError===0){
				if($imageSize>$maxSize){
					include ("Profile.php");
					echo "<script>alert('votre image ne doit pas dépasser 5 mb');</script>";
				}else{
					$imageNewName = $Time.".".$imgActExt;
					$target="img-profile/".$imageNewName;
					move_uploaded_file($imageTmpName,$target);
					$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
					if($_SESSION['role']=="Admin"){
						
						$req="UPDATE admin SET Photo = '$imageNewName' WHERE ID_Admin = '$id'";
						$result=mysqli_query($cnx,$req);
						if($result){
							header('Location: Profile.php?ProfileModifié');
						}else{
							include ("Profile.php");
							echo '<script>
									swal({
									  title: "Erreur !",
									  text: "Vérifier vos infos!",
									  icon: "warning",
									  buttons: true,
									  dangerMode: true,
									});</script>';
						}

					}
					else if($_SESSION['role']=="Prof"){
						
						$req="UPDATE professeur SET Photo = '$imageNewName' WHERE ID_Prof = '$id'";
						$result=mysqli_query($cnx,$req);
						if($result){
							header('Location: Profile.php?ProfileModifié');
						}else{
							include ("Profile.php");
							echo '<script>
									swal({
									  title: "Erreur !",
									  text: "Vérifier vos infos!",
									  icon: "warning",
									  buttons: true,
									  dangerMode: true,
									});</script>';
						}
					}
					else if($_SESSION['role']=="Etud"){
						
						$req="UPDATE etudiant SET Photo = '$imageNewName' WHERE ID_Etud = '$id'";
						$result=mysqli_query($cnx,$req);
						if($result){
							header('Location: Profile.php?ProfileModifié');
						}else{
							include ("Profile.php");
							echo '<script>
									swal({
									  title: "Erreur !",
									  text: "Vérifier vos infos!",
									  icon: "warning",
									  buttons: true,
									  dangerMode: true,
									});</script>';
						}
					}

					
						}
			}else{
				include ("Profile.php");
				echo "<script>alert('error l'hors de l'importation d'image');</script>";
				}
		}else{
				include ("Profile.php");
				echo "<script>alert('vous pouvez pas ajouter ce type d'image !');</script>";
		}
	} else{
		if($_SESSION['role']=="Admin"){
				
				$req="UPDATE admin SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE ID_Admin = '$id'";
				$result=mysqli_query($cnx,$req);
				if($result){
					header('Location: Profile.php?ProfileModifié');
				}else{
					include ("Profile.php");
					echo '<script>
							swal({
							  title: "Erreur !",
								text: "Vérifier vos infos!",
							  icon: "warning",
							  buttons: true,
							  dangerMode: true,
							});</script>';
				}

			}
			else if($_SESSION['role']=="Prof"){
				
				$req="UPDATE professeur SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE ID_Prof = '$id'";
				$result=mysqli_query($cnx,$req);
				if($result){
					header('Location: Profile.php?ProfileModifié');
				}else{
					include ("Profile.php");
					echo '<script>
							swal({
							  title: "Erreur !",
									  text: "Vérifier vos infos!",
							  icon: "warning",
							  buttons: true,
							  dangerMode: true,
							});</script>';
				}
			}
			else if($_SESSION['role']=="Etud"){
				
				$req="UPDATE etudiant SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE ID_Etud = '$id'";
				$result=mysqli_query($cnx,$req);
				if($result){
					header('Location: Profile.php?ProfileModifié');
				}else{
					include ("Profile.php");
					echo '<script>
							swal({
							  title: "Erreur !",
									  text: "Vérifier vos infos!",
							  icon: "warning",
							  buttons: true,
							  dangerMode: true,
							});</script>';
				}
			}
	}
	

	//else $_post empty
	else{
				include ("Profile.php");
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



}
}
?>