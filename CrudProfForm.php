<?php
if(isset($_POST["Ajouter"])){
	if(isset($_POST['login'])&&!empty($_POST['login'])&&isset($_POST['password'])&&!empty($_POST['password'])){

		$login=$_POST["login"];
		$password=$_POST["password"];
		$cnfpass=$_POST["re_password"];
		$role="Prof";

		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
			if($password==$cnfpass){
				$req="insert into user values('','$login','$password','$role')";
				$result=mysqli_query($cnx,$req);
			
				header('Location: CrudProf.php?ProfesseurAjouté');
			}
			else{
				include ("CrudProf.php");
				//echo "<script>alert('Vérifier vos infos');</script>";
				echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Le password est différnet de la confirmation!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
			}
	}
}
else{
	include ("CrudProf.php");
       echo '<script>
						swal({
						  title: "Les champs sans vide?",
						  text: "Vous devez compléter toutes les informations!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
}
?>