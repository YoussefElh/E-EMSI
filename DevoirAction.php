<?php
			if (isset($_GET["ID_dv_clot"])) {
		 		$id=$_GET["ID_dv_clot"];
	    		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

	            $req6="UPDATE devoir SET EtatDv = '1' WHERE ID_Devoir = '$id'";
	            $result6=mysqli_query($cnx,$req6);
	           	//$row=mysqli_fetch_array($result);
	           	if($result6){	 
	 				header("Location: CrudDevoir.php?DevoirCloturée");
	
				 }
				 else{
				 	include ("CrudDevoir.php");
								echo '<script>
									swal({
									  title: "Erreur !",
									  text: "Erreur de la désactivation du devoir!",
									  icon: "warning",
									  buttons: true,
									  dangerMode: true,
									});</script>';
				 }
	           		
        	}
        	if (isset($_GET["ID_dv_activer"])) {
		 		$id=$_GET["ID_dv_activer"];
	    		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

	            $req6="UPDATE devoir SET EtatDv = '0' WHERE ID_Devoir = '$id'";
	            $result6=mysqli_query($cnx,$req6);
	           	//$row=mysqli_fetch_array($result);
	           	if($result6){	 
	 				header("Location: CrudDevoir.php?DevoirActivée");
	
				 }
				 else{
				 	include ("CrudDevoir.php");
								echo '<script>
									swal({
									  title: "Erreur !",
									  text: "Erreur de l\'activation du devoir!",
									  icon: "warning",
									  buttons: true,
									  dangerMode: true,
									});</script>';
				 }
	           	
	           	
        	
	        }
        	


?>