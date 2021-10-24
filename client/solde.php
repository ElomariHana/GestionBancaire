
<?php

include $_SERVER["DOCUMENT_ROOT"] .  '/client/inc/header.php';



require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/client.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/classes/compte.php';


$compte = new Compte();
$data= null;


if(isset($_POST['submit']))
{


 $numCompte = $_POST['numCompte'];

   if($compte->getCompte($numCompte))
   {
     $data = $compte->getCompte($numCompte);
   }
   else
   {
    $error = "Erreur, Aucun compte trouvé !";
   } 
}



/*
highlight_string("<?php \n".var_export($client->find, true)); exit();
*/


?>

 
 

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Veuillez renseigner vote compte</h3>
            </div>

            <form role="form" method="post" action="">
              <div class="box-body">

                 <?php
                  if(isset($error))
                  {
                        ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                        </div>
                        <?php
                  }
                  ?>
                <div class="form-group col-xs-6">
                  <label for="numero">numero de compte ( sur 10 Chiffres )</label>
                  <input type="text" class="form-control" name="numCompte" placeholder="ex: 52100001..">
                </div>
               <?php if ($data) { ?>
                    <div class="col-xs-6">

                      <div class="alert alert-success">
                          
                          <h4>Votre solde est : <?= $data[0]["solde"]?> dhs</h4>
                      </div>
                    </div>

                <?php  } ?>
              
              </div>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
              </div>
            </form>
          </div>      

       

    </section>

    

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   

  </footer>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<?php

include $_SERVER["DOCUMENT_ROOT"] .  '/inc/footer.php';

?>

</body>
</html>