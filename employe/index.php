<?php

/*
  include la connexion a la base de données 
*/

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/utilisateur.php';

  $utilisateur = new Utilisateur();



/*
  tester si l'utilisateur déja loggué le  redirigé a la page d'accueil 
*/




if(isset($_SESSION['employe'])) {

  $utilisateur->redirect('/employe/accueil.php');
}


/*
  Login utilisateur 
*/

if(isset($_POST['btn-login']))
{


 $email = $_POST['email'];
 $password = $_POST['password'];
  

   if($data = $utilisateur->login($email,$password))
   {   

      $_SESSION['employe'] = $data;

      if ($data['role'] === 'Employe') {
        
         $utilisateur->redirect('/employe/accueil.php');

      }else
       {
        $error = "Erreur Login/mot de passe incorrecte !";
       } 
      
   }
   else
   {
    $error = "Erreur Login/mot de passe incorrecte !";
   } 
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login : SGB </title>

 
 <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">

   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">


</head>

<body class="hold-transition login-page">
<div class="login-box text-center">
 
  <h1> <strong> Login Employé </strong> </h1>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">veuillez renseigné bos information </p>
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
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div>
            

          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="btn-login" class="btn btn-primary btn-block btn-flat">LogIn</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 

include $_SERVER["DOCUMENT_ROOT"] .  '/inc/footer.php';

?>

<script src="/assets/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>