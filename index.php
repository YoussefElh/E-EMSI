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
		<form>
		<div class="input-group md-form form-sm form-2 pl-0">
			
		  <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Entrez le code" aria-label="Search">
		  <div class="input-group-append" style="margin-right: 50%;">
		    	<button type="button" class="btn btn-dark">Rejoindre</button>
		  </div>
		</div>
		</form>
		</div>

		<!--classe  -->
		<div class="container p-3 my-3 bg-secondary  shadow-lg p-3 mb-5 bg-white rounded">
	
		<h4>Votre classe</h4>
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