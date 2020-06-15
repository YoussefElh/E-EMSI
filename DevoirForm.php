<?php
if(!isset($_SESSION)){
		    session_start();
		}
if(isset($_POST["Ajouter"])){
	if(isset($_POST['sujet'])&&!empty($_POST['sujet'])&&isset($_POST['dDebut'])&&!empty($_POST['dDebut'])&&isset($_POST['dFin'])&&!empty($_POST['dFin'])){

		
		$sujet=str_replace('\'', '\\\'', $_POST['sujet']);
		$dateDebut=$_POST['dDebut'];
		$dateFin=$_POST['dFin'];
		$etat=$_POST['etat'];
		$Classe=$_POST['idClasse'];
		$Cours=$_POST['idCours'];
		$id=$_SESSION['idu'];
		//select idprof
		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
		$req2="select p.ID_Prof from user s,professeur p where p.FK_ID_USER=s.ID_User and s.ID_User='$id'";
		$result2=mysqli_query($cnx,$req2);
		$row=mysqli_fetch_array($result2);
		$idProf=$row['ID_Prof'];
		

		
			
				$req="insert into devoir values('','$sujet','".date('d/m/Y',strtotime($dateDebut))."','".date('d/m/Y',strtotime($dateFin))."','$etat','$idProf','$Classe','$Cours')";
				$result=mysqli_query($cnx,$req);
			if($result){
				header('Location: CrudDevoir.php?devoirAjouté');
			}
			else{
				include ("CrudDevoir.php");
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
	include ("CrudDevoir.php");
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