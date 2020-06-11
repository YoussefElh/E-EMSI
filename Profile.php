<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta charset="utf-8">

    <title>E-EMSI | Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
      body{
    margin-top:20px;
    background:#f8f8f8
}
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container" >

  <!--Requete-->
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

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">
                        <div style="height: 140px" >
                              <img style="height: 140px;" src="img-profile\<?php $photo=$row["Photo"]; echo "$photo"?>">
                      </div>

                      </span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row['Nom']?> <?php echo $row['Prenom']?></h4>
                    <p class="mb-0"><?php echo $row['Login']?></p>
                    <!--Debut form-->
          <form method="POST" class="form" action="ProfileUpdateForm.php" target="_self" enctype="multipart/form-data">
                    <div class="mt-2">
                      <span>Changer la photo</span>
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                              <input  type="file" id="file" name="image">
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary"><?php echo $row['Role']?></span>
                  </div>
                </div>
              </div>

              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#" class="active nav-link">Information</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nom</label>
                              <input class="form-control" type="text" name="nom"  value=<?php echo $row['Nom']?>>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Prénom</label>
                              <input class="form-control" type="text" name="prenom" value=<?php echo $row['Prenom']?>>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" name="email" placeholder="user@example.com" value=<?php echo $row['Email']?>>
                            </div>
                          </div>
                        </div>
                        <!---->
                      </div>

                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" name="prfUpdate" type="submit">Enregistrer</button>
                      </div>
                    </div>
                    <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#" class="active nav-link">Paramètres d'authentification</a></li>
              </ul>
              </form>
              <form method="POST" class="form" action="ProfilePassUpdate.php" target="_self" enctype="multipart/form-data">
               
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                         <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Login</label>
                              <input class="form-control" type="text" name="login" value=<?php echo $row['Login']?>>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Mot de passe actuel</label>
                              <input class="form-control" type="password" name="old_password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>nouveau mot de passe</label>
                              <input class="form-control" type="password" name="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirmer password <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="re_password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" name="PassUpdate" type="submit">Enregistrer</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3 mb-3">
          <div class="card mb-3">
            <div class="card-body">
              <div class="px-xl-3">
             
                <li class="btn btn-block btn-info">
                  <a href="index.php" style="text-decoration: none;color: white;"><span class="fa fa-home mr-3"></span>Home</a>
                </li>
              </div>
            </div>
          </div>
      </div>

    </div>

  </div>
</div>
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
</script>
</body>
  <!-- Footer -->
<footer class="page-footer font-small blue" style="background-color: #a9ff70;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> eemsi.com</a>
    BY<strong>  Youssef Elhizabri</strong>
    AND<strong>  Idriss Bacha</strong>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</html>

<?php } ?>