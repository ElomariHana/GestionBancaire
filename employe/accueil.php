

<?php

include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';

?>


      

      <!--  row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">List des Client</h3>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   

  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<?php

include $_SERVER["DOCUMENT_ROOT"] . '/inc/footer.php';

?>