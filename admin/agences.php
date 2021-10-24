<?php


include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';




if(isset($_POST['modif']))
{

 $id = $_POST['id'];

   if ($id) {
          $agence->redirect('/admin/modifAgence.php');
   }else {
        $error = "Erreur !!";

   }

}

if(isset($_POST['supp']))
{

 $id = $_POST['id'];

   if ($id) {
         
         if ($agence->deleteagence($id)) {
          $success = "Succés, compte Supprimé !";
          
          $utilisateur->redirect('/admin/agences.php');

         }
         else {
        $error = "Erreur !!";

        }

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
              <h3 class="box-title">List des Agences</h3>
              <div class="col-sm-12 text-right">
                <a href="ajoutAgence.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Nouveau </a>
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
                  <th>N° Agence</th>
                  <th>Libelle</th>
                  <th>Horaire</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php if($agences) {
                    
                    foreach ($agences as $key => $agence) {
                               
                        ?>
                        
                 <tr>



                 <td> <?php echo $agence['numAgence'] ?> </td>
                 <td> <?php echo $agence['libelle'] ?> </td>
                 <td> <?php echo $agence['horaires'] ?> </td>
                 <td>  
                  <form action="modifAgence.php" method="get">
                    <input type="hidden" name="id" value="<?= $agence['numAgence'];?>">
                    <button class="btn btn-warning" type="submit" name="modif">Modifier</button>

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
