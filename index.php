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
            <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Download</a>
          </li>
          <?php if($_SESSION['role']=="Admin"){
			echo '<li>
		            <a href="#"><span class="fa fa-book mr-3"></span> Cours</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-graduation-cap mr-3"></span> Classe</a>
		          </li>
		          <li>
		            <a href="Profile.php"><span class="fa fa-cog mr-3"></span> Paramètres</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-file mr-3"></span> Files</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-bars mr-3"></span> Matiére</a>
		          </li>
		          <li>
		            <a href="CrudProf.php"><span class="fa fa-address-book-o mr-3"></span> Crud Professeur</a>
		          </li>
		          <li>
		            <a href="CrudEtud.php"><span class="fa fa-address-book-o mr-3"></span> Crud Etudiant</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-files-o mr-3"></span> Crud Files</a>
		          </li>
		          <li>
		            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
		          </li>
		        </ul>'; }
		       else if($_SESSION['role']=="Prof"){
		       		echo '<li>
		            <a href="#"><span class="fa fa-book mr-3"></span> Cours</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-graduation-cap mr-3"></span> Classe</a>
		          </li>
		          <li>
		            <a href="Profile.php"><span class="fa fa-cog mr-3"></span> Paramètres</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-bars mr-3"></span> Matiére</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-files-o mr-3"></span> Crud Files</a>
		          </li>
		          <li>
		            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
		          </li>
		        </ul>';
		       			}
		       		else if($_SESSION['role']=="Etud"){
		       		echo '<li>
		            <a href="#"><span class="fa fa-book mr-3"></span> Cours</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-graduation-cap mr-3"></span> Classe</a>
		          </li>
		          <li>
		            <a href="Profile.php"><span class="fa fa-cog mr-3"></span> Paramètres</a>
		          </li>
		          <li>
		            <a href="#"><span class="fa fa-bars mr-3"></span> Matiére</a>
		          </li>
		          <li>
		            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
		          </li>
		        </ul>';
		       			}



			?>
          

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">E-EMSI</h2>
        <p>Avec le préfixe « e » pour web, numérique, ou cyber et « learning » pour apprentissage, le e-learning, signifie littéralement : formation sur internet.Nouvelle forme d’apprentissage, le e-learning tire son attrait du fait de pouvoir apprendre à son rythme, sur son ordinateur, des contenus pédagogiques sur des sujets variés. Organisée en sessions ou modules, avec tests d’évaluations, la formation peut-être totalement autogérée et suivie via un tableau de bord qui répertorie chacune des avancées du participant.Pour se former les plateformes se structurent autour de vidéos, d’animations, de textes, et de tests en tout genre.Le but : obtenir pour certaines formations, un certificat d’aptitudes ou de connaissances, mais surtout améliorer son capital connaissance dans un domaine précis.Point positif, les évaluations peuvent être refaites jusqu’à ce que l’exercice soit réussi ou totalement maîtrisé.</p>
        
        <p>Un suivi pas à pas des différentes étapes.Des contrôles de connaissances et une auto-évaluation.Une façon ludique et pédagogique de se former à différentes matières.Un interlocuteur joignable par mail en cas de questions.Un apprentissage à son rythme en fonction de ses disponibilités.</p>
      </div>
		</div>

    <script src="js/jqueryMenu.min.js"></script>
    <script src="js/popperMenu.js"></script>
    <script src="js/bootstrapMenu.min.js"></script>
    <script src="js/mainMenu.js"></script>
  </body>
</html>
<?php } ?>