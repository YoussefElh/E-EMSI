<?php
if(!isset($_SESSION)){
		    session_start();
		}
if (isset($_GET["IDC_A"])) {

	$idc=$_GET["IDC_A"];
	$id=$_SESSION['idu'];
	$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

	$req2="select * from user s, etudiant e where e.FK_ID_USER=s.ID_User and s.ID_User='$id'";
	$result2=mysqli_query($cnx,$req2);
    $row2=mysqli_fetch_array($result2);

    $ide=$row2["ID_Etud"];
	
    
    	$req="UPDATE etudiant SET FK_ID_CLASSE = '$idc' WHERE ID_Etud = '$ide'";
	    $result=mysqli_query($cnx,$req);
	    $row=mysqli_fetch_array($result);
    	if($result){
			header('Location: index.php?classeRejoignez');
			
		}else{
			include ("index.php");
			echo '<script>
					swal({
					  title: "Erreur !",
					  text: "impossible de rejoindre cette classe !",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					});</script>';
		}
    
    


}



?>