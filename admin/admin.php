<?php


// highlight_string("<?php \n".var_export($data, true)); exit();


include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';

?>

 

      
   
   <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List des Employées</h3>
            </div>
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



                 <td> <?php echo $employe['id'] ?> </td>
                 <td> <?php echo $employe['nom'] . " " . $employe['prenom'] ?> </td>
                 <td> <?php echo $employe['role'] ?> </td>
                 <td>  </td>
                
                </tr>
                <?php } } ?>

                </tbody>

              </table>
            </div>
          </div>

        </div>
      </div>

       <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List des Clients</h3>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>N° Clients</th>
                  <th>Nom complet</th>
                  <th>Date de naissance</th>
                  <th>Nature</th>

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

                
                </tr>
                <?php } } ?>

                </tbody>

              </table>
            </div>
          </div>

        </div>
      </div>

</section>



  <div class="control-sidebar-bg"></div>
</div>

<?php 

include $_SERVER["DOCUMENT_ROOT"] .  '/inc/footer.php';

?>
</body>
</html>
