<?php
if (isset($_GET["ID_Classe"])) {
	 $id=$_GET["ID_Classe"];
	 $req="DELETE FROM `classe` WHERE `classe`.`ID_Classe`='$id'";
	 $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
	 $result=mysqli_query($cnx,$req);
	 if($result){	 
	 	header("Location: CrudClasse.php");
	 	
	
	 }
	 else{
	 	include ("CrudClasse.php");
					echo '<script>
						swal({
						  title: "Erreur !",
						  text: "Erreur de suppresion du Classe!",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						});</script>';
	 }
}
	 

?>