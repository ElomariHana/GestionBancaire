<?php

/*
	include la connexion a la base de données 
*/

require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/utilisateur.php';



/*
	Inscription utilisateur 
*/

if(isset($_POST['btn-inscrire']))
{


 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $email = $_POST['email'];
 $pass = $_POST['pass'];
/*$role = 'Employé';*/
  
  $utilisateur = new Utilisateur();

   $new_password = password_hash($pass, PASSWORD_DEFAULT);

  
	 if($utilisateur->createUser(array($nom,$prenom,$email,$pass,'Employe')))
	 {
	  $utilisateur->redirect('accueil.php');
	 }
	 else
	 {
	  $error = "Erreur !";
	 } 
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SGB </title>


  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/css/ionicons.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/assets/iCheck/square/blue.css">

</head>

<body class="hold-transition login-page">
<div class="login-box">
 

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inscription a SGB</p>
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
    <form method="post">
      

      

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nom" placeholder="Nom">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" class="form-control"  name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-8 col-xs-offset-2">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-inscrire">S'inscrire</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p></p>

    <p class="text-center">

       <a href="index.php" class="text-center">Login </a>
    </p>
  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/assets/jquery/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>