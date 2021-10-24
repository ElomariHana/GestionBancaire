<?php




include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';




if($_GET['id']) {

  $ag = $agence->findById($_GET['id']);
  
}

if(isset($_POST['submit'])) {

$id = $_POST['id'];
$libelle = $_POST['libelle'];
$horaire = $_POST['horaire'];




    $status = $agence->modifAgence($id, array('libelle' => $libelle, 'horaires' => $horaire));
    
    $ag = $agence->findById($id);

    if ( $status) {
      $success = "Succès !";

    } else {

        $error = "Erreur !";

    }
}

if (isset($_POST['supp']))
{


 $id = $_POST['id'];

   if ($agence->deleteAgence($id)) {
        
        $utilisateur->redirect('/admin/comptes.php');
        $success = "Succés, compte Supprimé !";

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
              <h3 class="box-title">Nouveau Agence</h3>
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
                      <label>Nom d'agence</label>
                      <input type="text" class="form-control" name="libelle" placeholder="Agence " value="<?= $ag['libelle'] ?>" required>
                    </div>
                  </div>

                    <div class="col-sm-6">

                    <div class="form-group">
                      <label>Horaire </label>
                      <input type="text" class="form-control" name="horaire" placeholder="ex: 09:00 a 17:00" value="<?= $ag['horaires'] ?>" required>
                    </div>
                    </div>


                    <input type="hidden" name="id" value="<?= $ag['numAgence'];?>">
                  
                    <div class="box-footer pull-left">
                      
                      <button class="btn btn-danger" type="submit" name="supp">Supprimer</button>
                 
                                      
                    </div>

                    <div class="box-footer pull-right">

                      <button type="submit" name="submit" class="btn btn-primary" value="submit">Modifier</button>
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
