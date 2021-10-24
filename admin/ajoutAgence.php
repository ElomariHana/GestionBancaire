<?php




include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';


if(isset($_POST['submit'])) {

$libelle = $_POST['libelle'];
$horaire = $_POST['horaire'];




    $status = $agence->ajoutAgence($libelle,$horaire);

    if ( $status) {
      $success = "Succès !";

    } else {

        $error = "Erreur !";

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
                      <input type="text" class="form-control" name="libelle" placeholder="Agence ">
                    </div>
                  </div>

                    <div class="col-sm-6">

                    <div class="form-group">
                      <label>Horaire </label>
                      <input type="text" class="form-control" name="horaire" placeholder="ex: 09:00 a 17:00">
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
