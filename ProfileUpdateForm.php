<?php
  if(!isset($_SESSION)){
    session_start();
}

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
		
		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
		//select old info 
		if($_SESSION['role']=="Admin"){
			
			$req1="select ID_Admin from user s,admin p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			$result1=mysqli_query($cnx,$req1);
			$row=mysqli_fetch_array($result1);

		}
		else if($_SESSION['role']=="Prof"){
			
			$req1="select ID_Prof from user s,professeur p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			$result1=mysqli_query($cnx,$req1);
			$row=mysqli_fetch_array($result1);
		}
		else if($_SESSION['role']=="Etud"){
			
			$req1="select ID_Etud from user s,etudiant p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			$result1=mysqli_query($cnx,$req1);
			$row=mysqli_fetch_array($result1);
		}

		
			//UPDATE admin SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE admin.ID_Admin = '$id'
		if($_SESSION['role']=="Admin"){
				if(empty($imageName)){
					$id_user=$row['ID_Admin'];
					$req="UPDATE admin SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE ID_Admin = '$id_user'";
					$result=mysqli_query($cnx,$req);
					if($result){
						header('Location: Profile.php');
						exit();
					}
				}
				else if(isset($imageName)){
				if(in_array($imgActExt, $allowed)){
					if($imageError===0){
						if($imageSize>$maxSize){
							include ("Profile.php");
							echo "<script>alert('votre image ne doit pas dépasser 5 mb');</script>";
						}else{
							$imageNewName = $Time.".".$imgActExt;
							$target="img-profile/".$imageNewName;
							move_uploaded_file($imageTmpName,$target);
							
								$id_user=$row['ID_Admin'];
								$req="UPDATE admin SET Nom = '$nom', Prenom = '$prenom', Email = '$email',Photo = '$imageNewName' WHERE ID_Admin = '$id_user'";
								$result=mysqli_query($cnx,$req);
								if($result){
									header('Location: Profile.php');
									exit();
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
				}

			}
			else if($_SESSION['role']=="Prof"){
				//echo "dakhl Prof";
				if(empty($imageName)){
					$id_user=$row['ID_Prof'];
					$req="UPDATE professeur SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE ID_Prof = '$id_user'";
					$result=mysqli_query($cnx,$req);
					if($result){
						header('Location: Profile.php');
						exit();		
					}
				}
				else if(isset($imageName)){
				if(in_array($imgActExt, $allowed)){
					if($imageError===0){
						if($imageSize>$maxSize){
							include ("Profile.php");
							echo "<script>alert('votre image ne doit pas dépasser 5 mb');</script>";
						}else{
							$imageNewName = $Time.".".$imgActExt;
							$target="img-profile/".$imageNewName;
							move_uploaded_file($imageTmpName,$target);
							
								$id_user=$row['ID_Prof'];
								$req="UPDATE professeur SET Nom = '$nom', Prenom = '$prenom', Email = '$email',Photo = '$imageNewName' WHERE ID_Prof = '$id_user'";
								$result=mysqli_query($cnx,$req);
								if($result){
									header('Location: Profile.php');
									exit();
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
				}
			}
			else if($_SESSION['role']=="Etud"){
				//echo "dakhl etudiant";
				if(empty($imageName)){
					$id_user=$row['ID_Etud'];
					$req="UPDATE etudiant SET Nom = '$nom', Prenom = '$prenom', Email = '$email' WHERE ID_Etud = '$id_user'";
					$result=mysqli_query($cnx,$req);
					if($result){
						header('Location: Profile.php');
						exit();
						//echo '<script>swal("Good job!", "You clicked the button!", "success");</script>';		
					}
				}
				else if(isset($imageName)) {
				if(in_array($imgActExt, $allowed)){
					if($imageError===0){
						if($imageSize>$maxSize){
							include ("Profile.php");
							echo "<script>alert('votre image ne doit pas dépasser 5 mb');</script>";
						}else{
							$imageNewName = $Time.".".$imgActExt;
							$target="img-profile/".$imageNewName;
							move_uploaded_file($imageTmpName,$target);
							
								$id_user=$row['ID_Etud'];
								$req="UPDATE etudiant SET Nom = '$nom', Prenom = '$prenom', Email = '$email',Photo = '$imageNewName' WHERE ID_Etud = '$id_user'";
								$result=mysqli_query($cnx,$req);
								if($result){
									header('Location: Profile.php');
									//echo '<script>swal("Good job!", "You clicked the button!", "success");</script>';

									exit();
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
?>