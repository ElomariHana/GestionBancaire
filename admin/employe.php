<?php


include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';





?>

   
      

         <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List des Employées</h3>
              
               <div class="col-sm-12 text-right">
                <a href="ajoutEmploye.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Nouveau </a>
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
                  <th>N° Employé</th>
                  <th>Nom complet</th>
                  <th>Role</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php if($data) {
                    
                    foreach ($data['emp'] as $key => $employe) {
                               
                        ?>
                        
                 <tr>



                 <td> <?php echo $employe['id']; ?> </td>
                 <td> <?php echo $employe['nom'] . " " . $employe['prenom']; ?> </td>
                 <td> <?php echo $employe['role']; ?> </td>
                 <td>  
                   <form action="modifEmploye.php" method="get" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?= $employe['id'];?>">
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
