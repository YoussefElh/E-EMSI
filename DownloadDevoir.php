<?php  
if(isset($_GET['ID_dv_tel'])){

    $id = $_GET['ID_dv_tel'];
     $req="select * FROM `filedevoir` WHERE `filedevoir`.`ID_FileDv`='$id'";

     $cnx=mysqli_connect("127.0.0.1","root","","eemsi");
     $result=mysqli_query($cnx,$req);
     $row=mysqli_fetch_array($result);
     $fileNom=$row['FileNameDv'];
     $filepath       = 'devoir-files';
    $file = $filepath.'/'.$fileNom;
    var_dump($file);
    if(file_exists($file)){
    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.$fileNom);
    header('Content-Type: application/zip');
    //header('Expires: 0');
    
    header('Pragma: public');
    //header('Content-Length:'.filesize($file));
    header('Content-Transfer-Encoding: binary');
    readfile($file);
    exit;
    }else{
        include ("CrudDevoir.php");
            echo '<script>
                swal({
                  title: "Erreur !",
                  text: "Impossible de trouver ce fichier!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                });</script>';
    }
}
    else{
        include ("CrudDevoir.php");
            echo '<script>
                swal({
                  title: "Erreur !",
                  text: "Erreur de téléchargement du fichier!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                });</script>';
    }
?>