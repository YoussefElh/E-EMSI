<?php
if(isset($_POST['login'])&&!empty($_POST['login'])&&isset($_POST['password'])&&!empty($_POST['password'])){

	if(isset($_POST["registre"])){

		$login=$_POST["login"];
		$password=$_POST["password"];
		$cnfpass=$_POST["re_password"];
		$role="Etud";

		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
			if($cnfpass==$password){
				$req="insert into user values('','$login','$password','$role')";
				$result=mysqli_query($cnx,$req);
				header('Location: ProfileComplete.php');
				echo "<script>document.getElementById('ConfMsg').style.display='none';</script>";
			}
			else{
				include ("registration.html");
				//echo "<script>alert('Vérifier vos infos');</script>";
				echo "<script>document.getElementById('ConfMsg').style.display='block';</script>";
			}
	}
}
else{
        //$retour['error']="Error";
}
?>