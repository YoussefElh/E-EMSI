<!DOCTYPE html>
<html lang="en">
<?php  
	  if(!isset($_SESSION)){
		    session_start();
		}
	if (empty($_SESSION['role'])) {
	header("Location: login.php");
	exit();
	}

else if($_SESSION['role']=="Admin" || $_SESSION['role']=="Prof" || $_SESSION['role']=="Etud"){
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-EMSI | Cours</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styleMenu.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: white;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	
	/* Modal styles */
	.modal .modal-dialog {

		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {

		padding: 20px 30px;
	}
	.modal .modal-content {

		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: black;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}
	.my-custom-scrollbar {
		position: relative;
		height:300px;
		overflow: auto;
		}
		.table-wrapper-scroll-y {
		display: block;
		}
	.overflow-auto{
		position: relative;
		height:400px;
		overflow: auto;
	}
	.overflow-auto-file{
		position: relative;
		height:200px;
		overflow: auto;
	}

	/*card*/
	/* Float four columns side by side */
	.column {
	  float: left;
	  width: 25%;
	  padding: 0 10px;
	}

	/* Remove extra left and right margins, due to padding */
	.row {margin: 0 -5px;}

	/* Clear floats after the columns */
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	/* Responsive columns */
	@media screen and (max-width: 600px) {
	  .column {
	    width: 100%;
	    display: block;
	    margin-bottom: 20px;
	  }
	}

	/* Style the counter cards */
	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	  padding: 16px;
	  text-align: center;
	  background-color: #f1f1f1;
	}	

	

	
</style>

</head>
<body>
	<?php
        if($_SESSION['role']=="Admin"){
            $id=$_SESSION['idu'];
            $req="select * from user s,admin a where s.ID_User=a.FK_ID_USER and s.ID_User='$id'";
            $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
            $result=mysqli_query($cnx,$req);
            $row=mysqli_fetch_array($result);

            //while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        }
        else if($_SESSION['role']=="Prof"){
            $id=$_SESSION['idu'];
            $req="select * from user s,professeur p where s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
            $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
            $result=mysqli_query($cnx,$req);
            $row=mysqli_fetch_array($result);
        }
        else if($_SESSION['role']=="Etud"){
            $id=$_SESSION['idu'];
            $req="select * from user s,etudiant e where s.ID_User=e.FK_ID_USER and s.ID_User='$id'";
            $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
            $result=mysqli_query($cnx,$req);
            $row=mysqli_fetch_array($result);

        }
        
?>
		
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(images/logoPaysage.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(img-profile/<?php $photo=$row["Photo"]; echo "$photo"?>);"></div>
	  				<h3><?php echo $row['Nom']?> <?php echo $row['Prenom']?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li >
            <a href="index.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          
                <?php if($_SESSION['role']=="Admin"){
			echo '
		          <li>
		            <a href="CrudProf.php"><span class="fa fa-address-book-o mr-3"></span> Crud Professeur</a>
		          </li>
		          <li>
		            <a href="CrudEtud.php"><span class="fa fa-address-book-o mr-3"></span> Crud Etudiant</a>
		          </li>
		          <li>
		            <a href="CrudFiles.php"><span class="fa fa-files-o mr-3"></span> Crud Fichier</a>
		          </li>
		          <li>
		            <a href="CrudClasse.php"><span class="fa fa-graduation-cap mr-3"></span> Crud Classe</a>
		          </li>
		          <li class="active">
		            <a href="CrudCours.php"><span class="fa fa-book mr-3"></span> Crud Cours</a>
		          </li>
		          <li>
		            <a href="CrudDevoir.php"><span class="fa fa-briefcase mr-3"></span> Crud Devoir</a>
		          </li>
		          <li>
		            <a href="Profile.php"><span class="fa fa-cog mr-3"></span> Paramètres</a>
		          </li>
		          <li>
		            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
		          </li>
		        </ul>'; }
		       else if($_SESSION['role']=="Prof"){
		       		echo '
		          <li>
		            <a href="CrudClasse.php"><span class="fa fa-graduation-cap mr-3"></span> Mes Classe</a>
		          </li>
		          <li class="active">
		            <a href="CrudCours.php"><span class="fa fa-book mr-3"></span> Mes Cours</a>
		          </li>
		          <li>
		            <a href="CrudDevoir.php"><span class="fa fa-briefcase mr-3"></span> Crud Devoir</a>
		          </li>
		          <li>
		            <a href="CrudFiles.php"><span class="fa fa-files-o mr-3"></span> Mes Fichier</a>
		          </li>
		          <li>
		            <a href="Profile.php"><span class="fa fa-cog mr-3"></span> Paramètres</a>
		          </li>
		          <li>
		            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
		          </li>
		        </ul>';
		       			}
		       		else if($_SESSION['role']=="Etud"){
		       		echo '<li class="active">
		            <a href="CrudCours.php"><span class="fa fa-book mr-3"></span> Cours</a>
		          </li>
		          <li>
		            <a href="CrudDevoir.php"><span class="fa fa-briefcase mr-3"></span> Devoir</a>
		          </li>
		          <li>
		            <a href="Profile.php"><span class="fa fa-cog mr-3"></span> Paramètres</a>
		          </li>
		          <li>
		            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
		          </li>
		        </ul>';
		       			}



			?>
          

    	</nav>

        <!-- Page Content -->
      <div id="content" class="p-4 p-md-5 pt-5">
      	<?php if($_SESSION['role']=="Admin" || $_SESSION['role']=="Prof"){?>
      	<form method="POST" action="CrudCours.php" target="_self" enctype="multipart/form-data">
    		<div style="margin-right: 30%;margin-left: 30%; ">
		<div class="input-group md-form form-sm form-2 pl-0" >
			
		  <input class="form-control my-0 py-1 lime-border" style="background-color: gray;color: white;" type="text" name="cours2" placeholder="<?php 
		  if($_SESSION['role']=="Admin"){
		  	echo'chercher parl\'id du cours';
		  }
		  else if($_SESSION['role']=="Prof"){ 
		  	echo'chercher par le nom du cours';
		  }

		  ?>
		  " aria-label="Search">
		  <div class="input-group-append" >
		    	<input  type="submit" class="btn btn-dark" name="search2" value="Chercher" />
		  </div>
		</div>
		</div>
		</form></br>
      	<?php }?>
      	<div class="container">
      	<?php if($_SESSION['role']=="Admin" || $_SESSION['role']=="Prof"){?>
      		<?php if($_SESSION['role']=="Admin"){?>
	    	
			<div class="alert alert-warning" role="alert">
			   <strong>Modifier !</strong> vous pouvez pas modifier un cours vous devez supprimer et ajouter a nouveau pour evitez les conflicts.
			</div>
			
			<?php }?>
        <?php

            $cnx=mysqli_connect("127.0.0.1","root","","eemsi");

            
            if($_SESSION['role']=="Admin"){
        	if(isset($_POST['search2'])&&!empty($_POST['cours2'])){
				$search=$_POST['cours2'];
				$req="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM cours c,professeur p,user s,classe a WHERE c.ID_Cours like '%$search%' and c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and s.ID_User=p.FK_ID_USER";
			}
			else{
				$req="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM cours c,professeur p,user s,classe a WHERE c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and s.ID_User=p.FK_ID_USER";
			}
            
            
            $result=mysqli_query($cnx,$req);
        }
        else if($_SESSION['role']=="Prof"){
            $id=$_SESSION['idu'];
            if(isset($_POST['search2'])&&!empty($_POST['cours2'])){
				$search=$_POST['cours2'];
				$req="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM cours c,professeur p,user s,classe a WHERE c.NomCours like '%$search%' and c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			}else{
				$req="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM cours c,professeur p,user s,classe a WHERE c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and s.ID_User=p.FK_ID_USER and s.ID_User='$id'";
			}
            
            $result=mysqli_query($cnx,$req);
            //$row=mysqli_fetch_array($result);
        }
        
		?>
        <div class="table-wrapper">
        
            <div class="table-title">
                <div class="row">
                	<?php if($_SESSION['role']=="Prof"){?>
                    <div class="col-sm-6">
						<h2>E-EMSI <b>Cours</b></h2>
					</div>
					<?php }?>
					<?php if($_SESSION['role']=="Admin"){?>
						<div class="col-sm-6">
						<h2>CRUD <b>Cours</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un nouveaux Cours</span></a>				
					</div>
				<?php }?>
                </div>
            </div>
        <div class="table-wrapper-scroll-y my-custom-scrollbar" >
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							
						</th>
						<th>ID Cours</th>
						<th>NomCours</th>
						<th>Categorie</th>
						<th>Classe</th>
						<th>Professeur</th>
  						<th></th>
  						
  						
                        
                    </tr>
                </thead>
                <tbody>
                	<?php while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                    <tr>
						<td>
							
						</td>
						<td><?php echo  $tab["ID_Cours"] ?></td>
						<td><?php echo  $tab["NomCours"] ?></td>
						<td><?php echo  $tab["Categorie"] ?></td>
						<td><?php echo  $tab["NomClasse"] ?></td>
						<td><?php echo  $tab["NomProf"] ?> <?php echo  $tab["Prenom"] ?></td>
						<?php if($_SESSION['role']=="Prof" || $_SESSION['role']=="Admin"){?>
                        <td>
                            <a  href="?IDF=<?php echo $tab["ID_Cours"]; ?>" class="btn btn-outline-info">Fichier</a>
                        </td>
                   		<?php } ?>
                       
  						<?php if($_SESSION['role']=="Admin"){?>
                        <td>
                            <a href="Cours_del_Form.php?ID_Cours=<?php echo $tab["ID_Cours"]; ?>" class="btn btn-outline-danger">Supprimer</a>
                        </td>
                   	<?php } ?>
                    </tr>
                <?php } ?>
                    

                </tbody>
            </table>
        </div>
        </div>
        <?php }?>
    </div>
    <div class="container" id="FileShow" >
    	<?php if($_SESSION['role']=="Admin" || $_SESSION['role']=="Prof"){?>
    	<?php if($_SESSION['role']=="Prof"){?>
    	<div id="noFileShow" >
		<div class="alert alert-warning" role="alert">
		   <strong>Aucun fichier ?</strong> consulter l'onglet Mes Fichier pour ajouter ou supprimer un fichier.
		</div>
		</div>
		<?php }?>
    	<?php  
    	if (isset($_GET["IDF"])) {
	 		$id=$_GET["IDF"];
    		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

            $req="select * from file f,cours c where f.FK_ID_COURS=c.ID_Cours and c.ID_Cours='$id'";
            $result=mysqli_query($cnx,$req);
           
        }
    	?>
    	<div class="overflow-auto-file">
    	<ul class="list-group">
    		<li class="list-group-item active">Fichier</li>

    	<?php while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>

		  <li class="list-group-item"><strong>Nom :</strong><?php echo  $tab["FileName"] ?> | <strong>Description</strong> : <?php echo  $tab["Description"] ?></li>

		<?php } ?>
		</ul>
		</div>
	<?php } ?>
    </div>
    <!--Etudiant-->
    <?php if($_SESSION['role']=="Etud"){ ?>
    <?php
			$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
			$id=$_SESSION['idu'];
			
			if(isset($_POST['search'])&&isset($_POST['cours'])){
				$search=$_POST['cours'];
				$req="select * from user s,etudiant e,classe c,cours r where r.Categorie like '%$search%' and r.FK_ID_CLASSE_crs=c.ID_Classe and e.FK_ID_CLASSE=c.ID_Classe and s.ID_User=e.FK_ID_USER and s.ID_User='$id'";
			}
			else{
				$req="select * from user s,etudiant e,classe c,cours r where r.FK_ID_CLASSE_crs=c.ID_Classe and e.FK_ID_CLASSE=c.ID_Classe and s.ID_User=e.FK_ID_USER and s.ID_User='$id'";
			}
            
            $result=mysqli_query($cnx,$req);

	?>
	

		
	
    	
    <div class="container p-3 my-3 bg-secondary  shadow-lg p-3 mb-5 bg-white rounded">
    	<form method="POST" action="CrudCours.php" target="_self" enctype="multipart/form-data">
    		<div style="margin-right: 30%;margin-left: 30%; ">
		<div class="input-group md-form form-sm form-2 pl-0" >
			
		  <input class="form-control my-0 py-1 lime-border" style="background-color: gray;color: white;" type="text" name="cours" placeholder="chercher par catégorie" aria-label="Search">
		  <div class="input-group-append" >
		    	<input  type="submit" class="btn btn-dark" name="search" value="Chercher" />
		  </div>
		</div>
		</div>
		</form>
	
		<div class="p-3 mb-2 text-white">
			<h1  class="bg-dark" style="text-align: center; border: 2px ; border-radius: 5px;color: white;">Vos cours</h1>
		</div>

		<div class="overflow-auto">
			<div class="row">
	<?php while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
		  <div class="column">
		<div class="card text-white bg-dark mb-3">
		  <div class="card-header">
		  	<h1 style="color: white;"><?php echo $tab['NomCours']?></h1>
		  	<h4 style="color: #a9ff70;"><?php echo $tab['Categorie']?></h4>
		  </div>
		  <div class="card-body">
		    <p class="card-text"><?php echo $tab['DescriptionCours']?></p>

		  </div>
		  <div class="card-footer">
		  	<a class="btn btn-primary" href="?IDC=<?php echo $tab["ID_Cours"]; ?>">Fichier du cours</a>
		  </div>
		</div>
		</div>
	<?php }?>
		</div>
		</div>
	</div>

	<?php  
    	if (isset($_GET["IDC"])) {
	 		$id=$_GET["IDC"];
    		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");

            $req="select * from file f,cours c where f.FK_ID_COURS=c.ID_Cours and c.ID_Cours='$id'";
            $result=mysqli_query($cnx,$req);
           	//$row=mysqli_fetch_array($result);
        }
    	?>
    	<div class="overflow-auto-file">
    	<ul class="list-group">
    		<li class="list-group-item active"> 
    			Fichier du cours
    		</li>
    		<?php while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
    		

    	

		  <li class="list-group-item"><strong>Nom :</strong><?php echo  $tab["FileName"] ?> | <strong>Description</strong> : <?php echo  $tab["Description"] ?>
		  <a href="DownloadFileForm.php?IDF=<?php echo $tab['ID_File'] ?>" class="btn btn-outline-success">Download</a>
		</li>


		<?php } ?>
		</ul>
		</div>
	
	<?php } ?>
	<!-- Edit Modal HTML -->
	<?php 
                $req="SELECT * FROM classe";
                $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
                $result=mysqli_query($cnx,$req);

                $req2="SELECT * FROM professeur";
                $result2=mysqli_query($cnx,$req2);
                    ?>

	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form  method="POST" action="CrudCoursForm.php" target="_self" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter un Cours</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" style="background-color: #d6d2d2;">					
						<div class="form-group">
							<label>Nom Cours</label>
							<input type="text" name="NomCours" class="form-control" placeholder="nom Cours" required>
						</div>
						<div class="form-group">
							<label>Categorie</label>
							<input type="text" name="Categorie" id="CodeVis" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" rows="5" cols="44" placeholder="ici la description du cours" required></textarea>
						</div>
						<div class="form-group">
                        <select name="idClasse" class="browser-default custom-select custom-select-lg mb-3" required>
                          <option value="" disabled selected>Choisir une classe</option>
                        <?php while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                              <option value="<?php echo  $tab["ID_Classe"]; ?>"><?php echo  $tab["Nom"] ;?></option>
                        <?php }?>
                        </select>
                        </div>
                        <div class="form-group">
                        <select name="idProf" class="browser-default custom-select custom-select-lg mb-3" required>
                          <option value="" disabled selected>Choisir un professeur</option>
                        <?php while($tab2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){ ?>
                              <option value="<?php echo  $tab2["ID_Prof"]; ?>"><?php echo  $tab2["Nom"] ;?> <?php echo  $tab2["Prenom"] ;?></option>
                        <?php }?>
                        </select>
                        </div>				
					</div>
					 



					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="Ajouter" class="btn btn-success" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
	</div>
   </div>
    
</div>

    


	
</body>
  <!-- Footer -->
<footer class="page-footer font-small blue" style="background-color: #a9ff70;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> eemsi.com</a>
    BY<strong>  Youssef	Elhizabri</strong>
    AND<strong>  Idriss Bacha</strong>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html> 
    <script src="js/jqueryMenu.min.js"></script>
    <script src="js/popperMenu.js"></script>
    <script src="js/bootstrapMenu.min.js"></script>
    <script src="js/mainMenu.js"></script>
<script type="text/javascript">
	function genererCodeAcces() {
	var numberChars = "0123456789";
	var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//var lowerChars = "abcdefghiklmnopqrstuvwxyz";
	var allChars = numberChars + upperChars ;
	var randPasswordArray = Array(5);
	  randPasswordArray[0] = numberChars;
	  randPasswordArray[1] = upperChars;
	  randPasswordArray[2] = upperChars;
	  randPasswordArray = randPasswordArray.fill(allChars, 3);
	  document.getElementById('CodeVis').value = shuffleArray(randPasswordArray.map(function(x) { return x[Math.floor(Math.random() * x.length)] })).join('');
	}

	function shuffleArray(array) {
	  for (var i = array.length - 1; i > 0; i--) {
	    var j = Math.floor(Math.random() * (i + 1));
	    var temp = array[i];
	    array[i] = array[j];
	    array[j] = temp;
	  }
	  return array;
	}
	//classeNom
	function className(){

	}
	//id cours to modal
	$(document).ready(function () {
	$('body').on('click', '.id_cours',function(){
	document.getElementById("id_cours_modal").value = $(this).attr('data-id');
	console.log($(this).attr('data-id'));
	});
	});
</script>
<?php } 
else{
	header("Location: login.php");
	exit();
}
?>