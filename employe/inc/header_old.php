<?php

/*
  include la connexion a la base de données 
*/

require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/utilisateur.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/client.php';

 $client = new Client();
 $utilisateur = new Utilisateur();


$clients = $client->findAll();
$employes = $utilisateur->findAll('Employé');



/* highlight_string("<?php \n".var_export($employes, true)); exit();
*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Acceuil : SGB </title>

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
 <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/style.css">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



</head>
<body class="hold-transition skin-green sidebar-mini">

