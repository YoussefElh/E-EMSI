<?php
  if(!isset($_SESSION)){
    session_start();
}
//info complet
if(isset($_POST['PassUpdate'])){	
if(isset($_POST['old_password'])&&!empty($_POST['old_password'])&&isset($_POST['password'])&&!empty($_POST['password'])&&isset($_POST['re_password'])&&!empty($_POST['re_password'])){





		$login=$_POST['login'];
		$oldPassword=$_POST["old_password"];
		$password=$_POST["password"];
		$cnfpass=$_POST["re_password"];
		$id=$_SESSION['idu'];

		

		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
		//select old info 

			
			$req1="select * from user  where ID_User='$id'";
			$result1=mysqli_query($cnx,$req1);
			$row=mysqli_fetch_array($result1);


		
			//UPDATE
		if($oldPassword==$row['Password']){
			if($password==$cnfpass){
					$req="UPDATE user SET Login = '$login', Password = '$password' WHERE ID_User = '$id'";
					$result=mysqli_query($cnx,$req);
					if($result){
						header('Location: Profile.php');
						exit();
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
			}else{
				include ("Profile.php");
				echo '<script>
						swal({
						  title: "Erreur de confirmation",
						  text: "Le password est la confirmation sont different !",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
			}

		}else{
			include ("Profile.php");
				echo '<script>
						swal({
						  title: "Password incorrecte !",
						  text: "Votre ancien password est incorrecte !",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';

		}
				
					
		


			

}
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