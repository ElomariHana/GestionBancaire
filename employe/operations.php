<?php


include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';



if(isset($_POST['supp']))
{

 $id = $_POST['id'];

 if ($id) {
         
         if ($operation->deleteOperation($id)) {
            $success = "Succés, compte Supprimé !";

         } else {
          $error = "Erreur !!";

        }

   }

$operations = $operation->findAll();

}




?>

   
      

         <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

            
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List des operations</h3>
               <div class="col-sm-12 text-right">
                <a href="virement.php" class="btn btn-primary"> <i class="fa fa-plus"></i> nouvelle Operation</a>
              </div>
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
                      <i class="glyphicon glyphicon-ok"></i> &nbsp; <?php echo $success; ?> !
                  </div>
                  <?php
            }
            ?>

            <!-- /.box-header -->
             <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>N° operation</th>
                  <th>Type operation</th>
                  <th>Compte Emetteur</th>
                  <th>Compte Recepteur</th>
                  <th>somme</th>
                  <th>Date d'operation</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php if($operations) {
                    
                    foreach ($operations as $key => $operation) {
                               
                        ?>
                        
                 <tr>



                 <td> <?php echo $operation['numOperation'] ?> </td>
                 <td> <?php echo $operation['typeOperation'] ?> </td>
                 <td> <?php echo $operation['compteEmetteur'] ?> </td>
                 <td> <?php echo $operation['compteRecepteur'] ?> </td>
                 <td> <?php echo $operation['somme'] ?> </td>
                 <td> <?php echo $operation['dateOperation'] ?> </td>
                 <td>  
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $operation['numOperation'];?>">
                    <button class="btn btn-danger" type="submit" name="supp">Supprimer</button>
                  </form>
                   
                 </td>
                
                </tr>
                <?php } } ?>

                </tbody>

              </table>
            </div>
          </div>

        </div>
      </div>
       

 
  <div class="control-sidebar-bg"></div>
</div>

<?php 

include $_SERVER["DOCUMENT_ROOT"] .  '/inc/footer.php';

?>
</body>
</html>
