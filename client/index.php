<?php


session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/client.php';




  $client = new client();



if(isset($_SESSION['client'])) {

  $client->redirect('/client/accueil.php');
}

/*
  Login client 
*/


if(isset($_POST['btn-login']))
{


 $email = $_POST['email'];
 $password = $_POST['password'];
  

   if($cl = $client->login($email,$password))
   {
 
    $_SESSION['client'] = $client->find($email);

    $client->redirect('/client/accueil.php');
   }
   else
   {
    $error = "Erreur Details !";
   } 
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SGB </title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  
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
 
  <h1> Login Client</h1>

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
          <div class="checkbox icheck">
          
          
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