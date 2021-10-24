<?php


include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';


?>

   
   <!-- Main row -->
      

       <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List des comptes clients</h3>
               <div class="col-sm-12 text-right">
                <a href="ajoutCompte.php" class="btn btn-primary"> Ajout nouveau compte</a>
              </div>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>N° compte</th>
                  <th>Client</th>
                  <th>Solde</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php if($comptes) {
                    
                    foreach ($comptes as $key => $compte) {
                               
                        ?>
                        
                 <tr>



                 <td> <?php echo $compte['numCompte'] ?> </td>
                 <td> <?php echo $client->findById($compte['numClient'])[0]['nom'] ." " . $client->findById($compte['numClient'])[0]['prenom'] ; ?> </td>
                 <td> <?php echo $compte['solde'] ?> </td>
                <td>
                  <form action="modifCompte.php" method="get">
                    <input type="hidden" name="id" value="<?= $compte['numCompte'];?>">
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
  </div>
 
 
  <div class="control-sidebar-bg"></div>
</div>

<?php 

include $_SERVER["DOCUMENT_ROOT"] .  '/inc/footer.php';

?>
</body>
</html>
