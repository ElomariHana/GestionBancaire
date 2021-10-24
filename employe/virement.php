<?php




include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';


if(isset($_POST['submit'])) {

$emetteur = $_POST['emetteur'];
$recepteur = $_POST['recepteur'];
$typeOp = $_POST['typeOp'];
$somme = $_POST['somme'];

    $date = date("Y-m-d");
    $status = $operation->ajoutOperation($typeOp,$emetteur,$recepteur,$somme,$date);

     if ($typeOp === 'depot') {

      if ($compte->depot($recepteur, $somme)) {
        $success_op = "Depot bien reçue !";
      }

     }elseif ($typeOp === 'retrait') {
       if ($compte->retrait($recepteur, $somme)) {
        $success_op = "Retrait bien validé !";
      }

     }elseif ($typeOp === 'virement') {
        if ($compte->retrait($emetteur, $somme) and $compte->depot($recepteur, $somme)) { 
          $success_op = "Virement bien reçue !";
        }

     } else {
        $error = "Erreur type d'operation invalid !";

     }


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
              <h3 class="box-title">Nouveau Operation: </h3>
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


              if(isset($success) and isset($success_op))
            {
                  ?>
                  <div class="alert alert-success">
                      <i class="glyphicon glyphicon-success-sign"></i> &nbsp; <?php echo $success; ?> !
                      <i class="glyphicon glyphicon-success-sign"></i> &nbsp; <?php echo $success_op; ?> !
                  </div>
                  <?php
            }
            ?>

              <form method="post" action="">
                <div class="box-body">

                  <div class="row">

                   


                    <div class="col-sm-6">
                    
                      <div class="form-group">
                        <label>Type </label>

                        <select name="typeOp" id="typeOperation" class="form-control">
                          
                          
                          <option value="virement"> Virement</option>
                          <option value="depot"> Dêpot</option>
                          <option value="retrait"> Retrait </option>

                        </select>


                      </div>
                    </div> 

                     

            
                    <div class="col-sm-6">
                    
                      <div class="form-group">
                        <label>Compte emetteur : </label>

                        <select name="emetteur" id="emet" class="form-control">

                          <?php foreach ($comptes as $key => $value) {
                           ?>
                          <option value="<?= $value['idCompte']; ?>"> 
                            <?= $value['numCompte'] ?></option>

                          <?php  } ?>
                        </select>


                      </div>

                      

                    </div> 


            
                    <div class="col-sm-6">
                    
                      <div class="form-group">
                        <label>Compte Recépteur : </label>

                        <select name="recepteur" id="recep" class="form-control">
                          
                          <?php foreach ($comptes as $key => $value) {
                           ?>
                          <option value="<?= $value['idCompte']; ?>"> 
                            <?= $value['numCompte'] ?></option>

                          <?php  } ?>
                        </select>


                      </div>

                      

                    </div> 


                  <div class="col-sm-6">

                   <div class="form-group">
                        <label>Somme d'operation</label>
                        <input type="text" class="form-control" name="somme" placeholder="ex: 1800 (en DH)" required>


                    </div>

                  </div>


                  </div>

                  <hr>
                  
                  
                    <div class="box-footer pull-right">
                      <button type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
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
  
  
  $(document).ready(function() {


   $('#typeOperation').change(function() {
       if($(this).val() == 'depot' || $(this).val() == 'retrait') {
         $("#emet").prop('disabled', true);

       } else {
         $("#emet").prop('disabled', false);

       }
   });
});
</script>
</body>
</html>
