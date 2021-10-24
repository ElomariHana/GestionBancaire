<?<?php 


/*
  include la connexion a la base de données 
*/
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/utilisateur.php';
require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/Compte.php';
require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/client.php';
require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/typeCompte.php';
require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/agence.php';
require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/adresse.php';


require_once $_SERVER["DOCUMENT_ROOT"] .  '/classes/operation.php';


$utilisateur = new Utilisateur();
$compte = new Compte();
$client = new Client();
$type = new TypeCompte();
$agence = new Agence();
$adresse = new Adresse();
$operation = new Operation();




if(!isset($_SESSION['employe'])) {

  $utilisateur->redirect('/employe/index.php');
}

$empl = $utilisateur->find($_SESSION['employe']['email']);

$data = $utilisateur->findAll();

$typesComptes = $type->findAll();


$comptes = $compte->findAll();

$clients = $client->findAll();

$operations = $operation->findAll();

$agences = $agence->findAll();




?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> SGB </title>

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
 
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
  

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SGB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SGB</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- Notifications: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"> <?= $empl['nom'] ." | " . $empl['role'];?> </span>
            </a>
            <ul class="dropdown-menu">
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="active">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>

       


        <li>
          <a href="clients.php">
            <i class="fa fa-users"></i> <span>Clients</span>
            
          </a>
          
        </li>
        

        <li>
          <a href="comptes.php">
            <i class="fa fa-credit-card"></i> <span>Comptes</span>
            
          </a>
          
        </li>
     

        <li>
          <a href="operations.php">
            <i class="fa fa-exchange"></i> <span>Operations bancaires</span>
            
          </a>
          
        </li>
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Employé</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= count($comptes);?></h3>

              <p>Comptes client</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="ajoutCompte.php" class="small-box-footer">Nouveau Compte <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= count($data['clt']);?></h3>

              <p>Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="ajoutClient.php" class="small-box-footer">Nouveau Client <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= count($data['emp'])?></h3>

              <p>Employés </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="ajoutEmploye.php" class="small-box-footer">Nouveau Employé <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= count($operations)?></h3>

              <p>Operations</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="operations.php" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      