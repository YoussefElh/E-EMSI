<?php
if(isset($_POST["Ajouter"])){
	if(isset($_POST['Nom'])&&!empty($_POST['Nom'])&&isset($_POST['CodeAcces'])&&!empty($_POST['CodeAcces'])){

		$Nom =$_POST['Nom'];
		$CodeAcces=$_POST['CodeAcces'];

		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
			
				$req="insert into classe values('','$Nom','$CodeAcces')";
				$result=mysqli_query($cnx,$req);
			if($result){
				header('Location: CrudClasse.php');
			}
			else{
				include ("CrudClasse.php");
				//echo "<script>alert('Vérifier vos infos');</script>";
				echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Erreur de creation de la classe, Vérifier vos infos!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
			}
	}
}
else{
	include ("CrudClasse.php");
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