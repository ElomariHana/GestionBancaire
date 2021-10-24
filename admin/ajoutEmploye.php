<?php




include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';


if(isset($_POST['submit'])) {

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$pass = $_POST['pass'];

            $new_password = password_hash($pass, PASSWORD_DEFAULT);

  $status = $utilisateur->createUser(array($nom,$prenom,$email,$new_password,'Employe'));

    if ( $status) {
      $success = "Succès ";

    } else {

        $error = "Erreur, Email deja utilisé ";

    }
} 

?>

   

   <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Nouveau Employé</h3>
            </div>
            
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }


              if(isset($success))
            {
                  ?>
                  <div class="alert alert-success">
                      <i class="glyphicon glyphicon-success-sign"></i> &nbsp; <?php echo $success; ?> !
                  </div>
                  <?php
            }
            ?>

              <form method="post" action="">
                <div class="box-body">

                  
                  <div id="client-form" class="row">
                  
                  <div class="col-sm-6">
                    

                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" class="form-control" name="nom" placeholder="Nom">
                    </div>
                  </div>

                    <div class="col-sm-6">

                    <div class="form-group">
                      <label>Prenom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                    </div>
                    </div>

                  <div class="col-sm-6">

                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                   </div>

                  <div class="col-sm-6">

                     <div class="form-group">
                      <label>Mot de passe</label>
                      <input type="password" class="form-control" name="pass" placeholder="mot de passe">
                    </div>
                    
                  
                  </div>
                  
                  

                    <div class="box-footer pull-right">
                      <button type="submit" name="submit" class="btn btn-primary" value="submit">Ajouter</button>
                    </div>
              


                </div>
                <!-- /.box-body -->

              </form>


          </div>

        </div>
      </div>

</section>

 



  <div class="control-sidebar-bg"></div>
</div>

<?php 

include $_SERVER["DOCUMENT_ROOT"] .  '/inc/footer.php';

?>

<script type="text/javascript">
 
</script>
</body>
</html>
