<?php




include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';


if($_GET['id']) {

  $cmpt = $compte->findById($_GET['id']);
  
} 

if(isset($_POST['modif'])) {

$id = $_POST['id'];
$solde = $_POST['solde'];
    
   
        $status = $compte->modifCompte($id, array('solde' => $solde));
        
        if ($status) {

        $success =  "Compte modifier avec succès"; 
          
        } else {
          $error = " Error !";
        }

      $cmpt = $compte->findById($id);

}


if (isset($_POST['supp']))
{

 $id = $_POST['id'];

   if ($compte->deleteCompte($id)) {
          $success = "Succés, compte Supprimé !";
          $utilisateur->redirect('/admin/comptes.php');

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
              <h3 class="box-title">Modifier compte client</h3>
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
                      <label>Numero de compte</label>
                      <input type="text" class="form-control" name="numCompte" placeholder="Nom" value="<?= $cmpt['numCompte'];?>" disabled required>
                    </div>
                  </div>

                    <div class="col-sm-6">

                    <div class="form-group">
                      <label>Solde</label>
                      <input type="text" class="form-control" name="solde"  value="<?= $cmpt['solde'];?>" required>
                    </div>
                    </div>

                  <div class="col-sm-6">

                     <div class="form-group">
                      <label>Client</label>
                      <input type="text" class="form-control" name="client" value="<?= $cmpt['numClient'];?>" required>
                    </div>
                   </div>

                  <div class="col-sm-6">

                     <div class="form-group">
                      <label>Type de compte</label>
                      <input type="text" class="form-control" name="typeCompte" value="<?= $cmpt['numTypeCompte'];?>" disabled required>
                    </div>
                    
                  
                  </div>

                  
                  <input type="hidden" name="id" value="<?= $cmpt['idCompte'];?>">

                  

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
