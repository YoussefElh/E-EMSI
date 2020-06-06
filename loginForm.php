<?php

/*$retour=array();
$retour['debug']=$_GET;
$_POST=array_merge($_POST,$_GET);
$retour['debug']=$_POST;*/

if(isset($_POST['login'])&&!empty($_POST['login'])&&isset($_POST['passwd'])&&!empty($_POST['passwd'])){

	
	session_start();
	$email=$_POST["login"];
	$password=$_POST["passwd"];
	$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

		$req=" Select * from user where login='$email' and password='$password' ";

		$result=mysqli_query($cnx,$req);
		$row=mysqli_fetch_array($result);
		// $total=mysqli_num_rows($result);

				if($row['Login']==$email && $row['Password']==$password){

					$_SESSION['idu']=$row['ID_User'];
					$_SESSION['role']=$row['Role'];

					if($row['Role']=="Admin"){
						$id=$row['ID_User'];
						$req2="select * from user s,admin a where s.ID_User=a.FK_ID_USER and s.ID_User='$id'";
						$result2=mysqli_query($cnx,$req2);
						$row2=mysqli_fetch_array($result2);
						if(empty($row2['Nom'])&&empty($row2['Prenom'])&&empty($row2['Email'])){
							header('Location: ProfileComplete.php');
						}
						else{
							header('Location: index.php');
							exit();
						}
					}
					else if($row['Role']=="Prof"){
						$id=$row['ID_User'];
						$req2="select * from user s,professeur a where s.ID_User=a.FK_ID_USER and s.ID_User='$id'";
						$result2=mysqli_query($cnx,$req2);
						$row2=mysqli_fetch_array($result2);
						if(empty($row2['Nom'])&&empty($row2['Prenom'])&&empty($row2['Email'])){
							header('Location: ProfileComplete.php');
						}
						else{
							header('Location: index.php');
							exit();
						}
					}
					else if($row['Role']=="Etud"){
						$id=$row['ID_User'];
						$req2="select * from user s,etudiant a where s.ID_User=a.FK_ID_USER and s.ID_User='$id'";
						$result2=mysqli_query($cnx,$req2);
						$row2=mysqli_fetch_array($result2);
						if(empty($row2['Nom'])&&empty($row2['Prenom'])&&empty($row2['Email'])){
							header('Location: ProfileComplete.php');
						}
						else{
							header('Location: index.php');
							exit();
						}
					}
				}
				else{
					include ("login.php");
					//echo "<script>alert('Email ou password incorrecte !!');</script>";
					echo "<script>document.getElementById('ConfMsg').style.display='block';</script>";
				}
	
}


?>