<?php
if(isset($_POST["Ajouter"])){
	if(isset($_POST['NomCours'])&&!empty($_POST['NomCours'])&&isset($_POST['Categorie'])&&!empty($_POST['Categorie'])){

		$NomCours =$_POST['NomCours'];
		$Categorie=$_POST['Categorie'];
		$desc=str_replace('\'', '\\\'', $_POST['description']);
		$Classe=$_POST['idClasse'];
		$Prof=$_POST['idProf'];

		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
			
				$req="insert into cours values('','$NomCours','$Categorie','$desc','$Classe','$Prof')";
				$result=mysqli_query($cnx,$req);
			if($result){
				header('Location: CrudCours.php?coursAjouté');
			}
			else{
				include ("CrudCours.php");
				//echo "<script>alert('Vérifier vos infos');</script>";
				echo '<script>
						swal({
						  title: "Error !",
						  text: "Vous devez compéter toutes les informations!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
			}
	}
}
else{
	include ("CrudCours.php");
       echo '<script>
						swal({
						  title: "Les champs sans vide?",
						  text: "Vous devez compéter toutes les informations!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
}
?>