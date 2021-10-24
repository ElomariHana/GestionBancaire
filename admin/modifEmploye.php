<?php




include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';


if($_GET['id']) {

  $user = $utilisateur->findById($_GET['id']);

} 

if(isset($_POST['modif'])) {

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];


if (!password_verify($user['password'], $pass = $_POST['pass']) ) {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
  }
 
    $status = $utilisateur->updateUser($id,array('nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'password' => $pass, 'role' => 'Employe'));

    $user = $utilisateur->findById($id);

    if ( $status) {
      $success = "Succès !";

    } else {

        $error = "Erreur !";

    }
} elseif (isset($_POST['supp']))
{

 $id = $_POST['id'];
  var_dump($utilisateur->deleteUser($id));
   if ($utilisateur->deleteUser($id)) {
          $success = "Succés, compte Supprimé !";
          $utilisateur->redirect('/admin/employe.php');

   }else {
        $error = "Erreur !!";

   }


}



?>

   

   <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Nouveau compte Employé</h3>
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
                      <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?= $user['nom'];?>" required>
                    </div>
                  </div>

                    <div class="col-sm-6">

                    <div class="form-group">
                      <label>Prenom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="<?= $user['prenom'];?>" required>
                    </div>
                    </div>

                  <div class="col-sm-6">

                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $user['email'];?>" required>
                    </div>
                   </div>

                  <div class="col-sm-6">

                     <div class="form-group">
                      <label>Mot de passe</label>
                      <input type="password" class="form-control" name="pass" placeholder="mot de passe" value="<?= $user['password'];?>" required>
                    </div>
                    
                  
                  </div>

                  
                  <input type="hidden" name="id" value="<?= $user['id'];?>">

                  

                    <div class="box-footer pull-left">
                      
                      <button class="btn btn-danger" type="submit" name="supp">Supprimer</button>
                 
                                      
                    </div>

                    <div class="box-footer pull-right">
                      <button type="submit" name="modif" class="btn btn-primary" value="submit">Modifier</button>
                     
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
