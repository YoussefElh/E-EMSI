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

else if($_SESSION['role']=="Prof" || $_SESSION['role']=="Admin"){
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-EMSI | Fichier</title>
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
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
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
		border-color: #dddddd;
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
		height: 500px;
		overflow: auto;
		}
		.table-wrapper-scroll-y {
		display: block;
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
		          <li class="active">
		            <a href="CrudFiles.php"><span class="fa fa-files-o mr-3"></span> Crud Fichier</a>
		          </li>
		          <li>
		            <a href="CrudClasse.php"><span class="fa fa-graduation-cap mr-3"></span> Crud Classe</a>
		          </li>
		          <li>
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
		          <li>
		            <a href="CrudCours.php"><span class="fa fa-book mr-3"></span> Mes Cours</a>
		          </li>
		          <li>
		            <a href="CrudDevoir.php"><span class="fa fa-briefcase mr-3"></span> Crud Devoir</a>
		          </li>
		          <li class="active">
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
		       		echo '<li>
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
			
    <div class="container">
    	<form method="POST" action="CrudFiles.php" target="_self" enctype="multipart/form-data">
    		<div style="margin-right: 30%;margin-left: 30%; ">
		<div class="input-group md-form form-sm form-2 pl-0" >
			
		  <input class="form-control my-0 py-1 lime-border" style="background-color: gray;color: white;" type="text" name="file" placeholder="<?php 
		  if($_SESSION['role']=="Admin"){
		  	echo'chercher par id du fichier';
		  }
		  else if($_SESSION['role']=="Prof"){ 
		  	echo'chercher par id du fichier';
		  }

		  ?>" aria-label="Search">
		  <div class="input-group-append" >
		    	<input  type="submit" class="btn btn-dark"  name="search" value="Chercher" />
		  </div>
		</div>
		</div>
		</form></br>
    	<div class="alert alert-warning" role="alert">
			  Pour ne pas perdre vos <strong>fichier</strong> veuiller les <strong>archiver</strong> avant de les uploader sur le site ! 
			</div>
<?php
            if($_SESSION['role']=="Admin"){
            	$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
            	//recherche
            	if(isset($_POST['search'])&&!empty($_POST['file'])){
				$search=$_POST['file'];
				$req="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM file f,professeur p,user s,cours c,classe a where f.ID_File like '%$search%' and c.FK_ID_CLASSE_crs=a.ID_Classe and f.FK_ID_COURS=c.ID_Cours and p.ID_Prof=f.FK_ID_PROF and p.FK_ID_USER=s.ID_User";
				}else{
					$req="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM file f,professeur p,user s,cours c,classe a where c.FK_ID_CLASSE_crs=a.ID_Classe and f.FK_ID_COURS=c.ID_Cours and p.ID_Prof=f.FK_ID_PROF and p.FK_ID_USER=s.ID_User and s.ID_User";
				}
	            $result=mysqli_query($cnx,$req);
        	}

        	else if($_SESSION['role']=="Prof"){
        	$id=$_SESSION['idu'];
        	//recherche
        	$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
            	if(isset($_POST['search'])&&!empty($_POST['file'])){
				$search=$_POST['file'];
				$req="SELECT *,a.Nom as 'NomClasse' FROM file f,professeur p,user s,cours c,classe a where f.ID_File like '%$search%' and c.FK_ID_CLASSE_crs=a.ID_Classe and f.FK_ID_COURS=c.ID_Cours and p.ID_Prof=f.FK_ID_PROF and p.FK_ID_USER=s.ID_User and s.ID_User='$id'";
			}
				else{
					$req="SELECT *,a.Nom as 'NomClasse' FROM file f,professeur p,user s,cours c,classe a where c.FK_ID_CLASSE_crs=a.ID_Classe and f.FK_ID_COURS=c.ID_Cours and p.ID_Prof=f.FK_ID_PROF and p.FK_ID_USER=s.ID_User and s.ID_User='$id'";
				}
	            $result=mysqli_query($cnx,$req);


	            //select des cours dans dropdown par prof connecte
	            $req2="SELECT *,a.Nom as 'NomClasse',p.Nom as 'NomProf' FROM cours c,professeur p,classe a,user s where c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and s.ID_User=p.FK_ID_USER and s.ID_User='$id' order by a.Nom";
	            $result2=mysqli_query($cnx,$req2);
        	}
            	
            	
        
?>
		
        <div class="table-wrapper">
        	
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>CRUD <b>Fichier</b></h2>
					</div>
					<?php if($_SESSION['role']=="Prof"){
						echo '<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un nouveau Fichier</span></a>				
					</div>';
					}?>
					
                </div>
            </div>
        <div class="table-wrapper-scroll-y my-custom-scrollbar" >
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
						 
							</span>
						</th>
						<th>ID File</th>
						<th>Nom Fichier</th>
						<th>Télécharger</th>
						<th>Description</th>
						<th>Classe</th>
						<?php if($_SESSION['role']=="Prof"){
                        echo '<th>Cours</th>';

                        } ?>
                        <?php if($_SESSION['role']=="Admin"){
                        echo '<th>Uploader</th>';
                        } ?>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                	<?php while($tab=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                    <tr>
						<td>
							 
						</td>
						<td><?php echo  $tab["ID_File"] ?></td>
						<td><?php echo  $tab["FileName"] ?></td>
						<td><a href="DownloadFileForm.php?IDF=<?php echo $tab['ID_File'] ?>" class="btn btn-outline-success">Download</a></td>
                        <td><?php echo  $tab["Description"] ?></td>
                        <td><?php echo  $tab["NomClasse"] ?></td>
                        <?php if($_SESSION['role']=="Prof"){?>
                        <td><?php echo  $tab["NomCours"] ?></td>
                        <?php } ?>
                        
                        <?php if($_SESSION['role']=="Admin"){?> 
                        <?php echo'<td>'?>
                        	<?php echo  $tab["NomProf"]?> <?php echo $tab["Prenom"];?>
                        <?php echo'</td>'?>
                        <?php }?>
                        <td>
                            
                            <a href="File_del_Form.php?IDF=<?php echo $tab["ID_File"]; ?>" class="btn btn-outline-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
	
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form  method="POST" action="CrudFilesForm.php" target="_self" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter un fichier</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" >					
						<div class="form-group">
							<label>Ajouter Le fichier du cours</label>
							<input type="file" name="file" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" rows="5" cols="40" placeholder="ici la description ou le nom du fichier"></textarea>
						</div>
						<div class="form-group">
						<select name="idCours" class="browser-default custom-select custom-select-lg mb-3" required>
						  <option value="" disabled selected>Choisir un cours</option>
						<?php while($tab2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){ ?>
							  <option value="<?php echo  $tab2["ID_Cours"]; ?>"><?php echo  $tab2["NomClasse"] ;?> : <?php echo  $tab2["NomCours"] ;?></option>
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
    	// Material Select Initialization
		$(document).ready(function() {
		$('.mdb-select').materialSelect();
		});
    </script>
<?php } ?>