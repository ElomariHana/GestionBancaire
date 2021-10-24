<?php


include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';




if(isset($_POST['modif']))
{

 $id = $_POST['id'];

   if ($id) {
          $client->redirect('/admin/modifClient.php');
   }else {
        $error = "Erreur !!";

   }

}

if(isset($_POST['supp']))
{

 $id = $_POST['id'];

   if ($id) {
         
         if ($client->deleteClient($id)) {
          $success = "Succés, compte Supprimé !";
          
          $utilisateur->redirect('/admin/clients.php');

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
              <h3 class="box-title">List des Clients</h3>
              <div class="col-sm-12 text-right">
                <a href="ajoutClient.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Nouveau </a>
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
                  <th>N° Clients</th>
                  <th>Nom complet</th>
                  <th>Date de naissance</th>
                  <th>Nature</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php if($data) {
                    
                    foreach ($data['clt'] as $key => $client) {
                               
                        ?>
                        
                 <tr>



                 <td> <?php echo $client['numClient'] ?> </td>
                 <td> <?php echo $client['nom'] . " " . $client['prenom'] ?> </td>
                 <td> <?php echo $client['dateNais'] ?> </td>
                 <td> <?php echo $client['nature'] ?> </td>
                 <td>  
                  <form action="modifClient.php" method="get">
                    <input type="hidden" name="id" value="<?= $client['numClient'];?>">
                    <button class="btn btn-warning" type="submit" name="modifr">Modifier</button>
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
