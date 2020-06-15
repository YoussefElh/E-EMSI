<!doctype html>
<html lang="en">
<?php  
	  if(!isset($_SESSION)){
		    session_start();
		}
	if (empty($_SESSION['role'])) {
	header("Location: login.php");
	exit();
	}

else{
?>
  <head>
  	<title>E-EMSI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styleMenu.css">
	<style type="text/css">
		.input-group.md-form.form-sm.form-1 input{
		  border: 2px solid #2e2e2e;
		  border-top-right-radius: 0.25rem;
		  border-bottom-right-radius: 0.25rem;

		  
		}
		.input-group.md-form.form-sm.form-2 input {
		  border: 2px solid #2e2e2e;
		  border-top-left-radius: 0.25rem;
		  border-bottom-left-radius: 0.25rem;
		  
		}
		
		.input-group.md-form.form-sm.form-2 input.red-border {
		  border: 2px solid #2e2e2e;
		
		}
		.input-group.md-form.form-sm.form-2 input.lime-border {
		  border: 2px solid #2e2e2e;
		  

		}
		.input-group.md-form.form-sm.form-2 input.amber-border {
		  border: 2px solid #2e2e2e;

		}
		.overflow-auto{
			position: relative;
			height:400px;
			overflow: auto;
		}	
		/*card box*/
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
		@media screen and (max-width: 300px) {
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
		  margin-bottom: 20px;
		}

		.overflow-auto-file{
				position: relative;
				height:300px;
				overflow: auto;
				}
		
	</style>
	<!-- header -->
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark  static-top" style="background-color: #32373D;">
	  <div class="container-fluid">
	  	
	    
	    	<div class="text-center">
	          <img style="height: 60px; " src="images/logodarkk.png" alt="">
	          </div>
	       
	    
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav ml-auto">
	       
	        <li class="nav-item">
	          <a class="nav-link" href="#ContactModal" data-toggle="modal">Contact</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<!-- ContactModal -->
	<div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Contacter nous !</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="btn bg-dark" style="color: white;"> Youssef Elhizabri</div>
	         <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/youssef.elhizabri" style="background-color: #3B5998;color: white;"><span class="fa fa-facebook"></span></a>
	         <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/in/youssef-elhizabri-0a846b138/" style="background-color: #007BB6;color: white;"><span class="fa fa-linkedin"></span></a>
	         <a class="btn btn-social-icon btn-google" style="background-color: #DD4B39;color: white;"><span class="fa fa-google"> elhizabri11@gmail.Com</span></a></br></br>
	         <div class="btn bg-dark" style="color: white;"> Idriss Bacha</div>
	         <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/DiDis06" style="background-color: #3B5998;color: white;"><span class="fa fa-facebook"></span></a>
	         <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/in/idriss-bacha-14a272189/" style="background-color: #007BB6;color: white;"><span class="fa fa-linkedin"></span></a>
	         <a class="btn btn-social-icon btn-google" style="background-color: #DD4B39;color: white;"><span class="fa fa-google"> idrissbacha04@gmail.com</span></a>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
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
          <li class="active">
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
		       		echo '<li>
		            <a href="CrudCours.php"><span class="fa fa-book mr-3"></span> Cours</a>
		          </li>
		          <li>
		            <a href="CrudDevoir.php"><span class="fa fa-briefcase mr-3 "></span> Devoir</a>
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

      	<!-- Search form -->
<?php if($_SESSION['role']=="Etud"){ ?>
	
	<div class="container p-3 my-3 bg-secondary  shadow-lg p-3 mb-5 bg-white rounded">
		<div class="overflow-auto-file">
	<?php 
		$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
		$id=$_SESSION['idu'];
         $req3="SELECT *,a.Nom as 'NomClasse',e.Nom as 'NomEtud',p.Nom as 'NomProf',p.Prenom as 'PrenomProf' FROM devoir d,cours c,classe a,etudiant e,professeur p,user s where c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and d.FK_ID_COURS_dv=c.ID_Cours and e.FK_ID_CLASSE=a.ID_Classe and c.FK_ID_CLASSE_crs=a.ID_Classe and s.ID_User=e.FK_ID_USER and d.EtatDv='0' and s.ID_User='$id'";
        $result3=mysqli_query($cnx,$req3);
        $req2="SELECT *,a.Nom as 'NomClasse',e.Nom as 'NomEtud',p.Nom as 'NomProf',p.Prenom as 'PrenomProf' FROM devoir d,cours c,classe a,etudiant e,professeur p,user s where c.FK_ID_CLASSE_crs=a.ID_Classe and c.FK_ID_PROF_crs=p.ID_Prof and d.FK_ID_COURS_dv=c.ID_Cours and e.FK_ID_CLASSE=a.ID_Classe and c.FK_ID_CLASSE_crs=a.ID_Classe and s.ID_User=e.FK_ID_USER and d.EtatDv='0' and s.ID_User='$id'";
        $result2=mysqli_query($cnx,$req2);
        $row2=mysqli_fetch_array($result2);
        if(empty($row2["ID_Cours"])){ ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Aucun devoir !</strong> vous n'avez aucun nouveau devoir.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
       	<?php } else{?>
       		<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Nouveau devoir !</strong> Consulter l'onglet devoir pour l'envoyer.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
       	<?php }?>
       		
       			<?php while($tab=mysqli_fetch_array($result3,MYSQLI_ASSOC)){ ?>
       				<div class="alert alert-success" role="alert">
			  
			  
			  <h6 class="alert-heading" style="color: black">Cours : <?php echo  $tab["NomCours"] ?></h6>
			  <h6 class="alert-heading" style="color: black">Professeur : <?php echo  $tab["NomProf"] ?> <?php echo  $tab["PrenomProf"] ?></h6>
			  <hr>
			  <strong>Sujet</strong>
			  <p><?php echo  $tab["Sujet"] ?></p>
			  <hr>
			  <div class="alert alert-warning" role="alert">
				  <strong>A rendre avant le :</strong> <?php echo  $tab["DateFin"] ?> .
				</div>
				</div></br>
			  <?php }?>
			
		
	</div>
	</div>
        <div class="container p-3 my-3 bg-secondary  shadow-lg p-3 mb-5 bg-white rounded"><!--Alert -->
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Pas de code ?</strong>  Si vous avez pas le code d'accés veuillez contacter la direction !
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<!--Alert -->
		<h4>Rejoindre une classe à l'aide d'un code</h4>
		<p>Veuillez insérer le code de votre classe qui vous a été livrer par la direction</p>

		<form method="POST" action="index.php" target="_self" enctype="multipart/form-data">
		<div class="input-group md-form form-sm form-2 pl-0">
			
		  <input class="form-control my-0 py-1 lime-border" type="text" name="code" placeholder="Entrez le code" aria-label="Search">
		  <div class="input-group-append" style="margin-right: 50%;">
		    	<input  type="submit" class="btn btn-dark" name="rejoindre" value="Rejoindre" />
		  </div>
		</div>
		</form>
		</div>

		<!--classe  -->
		<?php
			$cnx=mysqli_connect("127.0.0.1","root","","eemsi");
			$id=$_SESSION['idu'];

			

            $req="select * from user s,etudiant e,classe c where e.FK_ID_CLASSE=c.ID_Classe and s.ID_User=e.FK_ID_USER and s.ID_User='$id'";
            $result=mysqli_query($cnx,$req);
            $row=mysqli_fetch_array($result);

            if(isset($_POST['rejoindre'])&&!empty($_POST['code'])){
				$Code =$_POST['code'];
				$req2="select * from classe where CodeAcces='$Code'";
			}
            else{
            	$req2="select * from user s,etudiant e,classe c where e.FK_ID_CLASSE=c.ID_Classe and s.ID_User=e.FK_ID_USER and s.ID_User='$id'";
            }
            $result2=mysqli_query($cnx,$req2);

            

            

		?>
		
			<div class="container p-3 my-3 bg-secondary  shadow-lg p-3 mb-5 bg-white rounded">
				<h1  class="bg-dark" style="text-align: center; border: 2px ; border-radius: 5px;color: white;">Classe</h1>
				<div class="overflow-auto">
				

	<?php while($tab=mysqli_fetch_array($result2,MYSQLI_ASSOC)){ ?>
				  <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
				  	<div class="card-header">
					  <h1 style="color: white;"><?php echo $tab['Nom']?></h1>
					</div>
					  <div class="card-body">

			<?php if($tab['ID_Classe']!="1"){?>
				<?php if($tab['ID_Classe']==$row['FK_ID_CLASSE']){?>
					<a href="quitClasseForm.php?IDC_Q=<?php echo $tab["ID_Classe"]; ?>" class="btn btn-danger">Quittez</a>
				<?php } else if($row['FK_ID_CLASSE']=="1"){?>
			    	<a href="RejClasseForm.php?IDC_A=<?php echo $tab["ID_Classe"]; ?>" class="btn btn-primary">Rejoindre</a>
				<?php } else{?>
			    	<div class="alert alert-danger" role="alert">
						Vous avez deja une classe !
					</div>
				<?php }?>
			<?php } else{?>
				<?php if($row['FK_ID_CLASSE']=="1"){?>
					<div class="alert alert-danger" role="alert">
						Vous n'avez aucune classe, rejoignez une par code !
					</div>
			<?php } }?>	
					  </div>
					
	 <?php }?>
				</div>
				
			</div>
		</div>

<?php }?>
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
<?php } ?>