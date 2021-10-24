<?php




include $_SERVER["DOCUMENT_ROOT"] . '/admin/inc/header.php';


if(isset($_POST['submit'])) {

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$dateNais = $_POST['dateNais'];
$civilite = $_POST['civilite'];
$ville = $_POST['ville'];
$quartier = $_POST['quartier'];
$rue = $_POST['rue'];
$postal = $_POST['postal'];
$tel = $_POST['tel'];
$nature = $_POST['nature'];
$agence = $_POST['agence'];

  
      $adresse->ajoutAdresse($ville,$quartier,$rue,$tel,$postal);
      
       $add =  $adresse->getNumAdresse($tel);

      $status = $client->ajoutClient($nom,$prenom,$email,$pass,$dateNais,$civilite, $nature,$agence,$add);
      
    if ( $status) {
      $success = "Succès ";

    } else {

        $error = "Erreur, Email deja utilisé ";

    }
} 

?>

   

   <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Nouveau Client</h3>
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
                      <label>Civilité : </label>
                      <input type="radio" name="civilite" value="M" checked> M.
                      <input type="radio" name="civilite" value="Mme"> Mme.
                      <input type="radio" name="civilite" value="Mlle"> Mlle.
                  
                    </div>

                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Prenom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                    </div>

                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    
                     <div class="form-group">
                      <label>Mot de passe Nouveau  Client</label>
                      <input type="password" class="form-control" name="pass" placeholder="mot de passe" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Date Naissance</label>
                      <input type="date" class="form-control" name="dateNais" required>
                    </div>

                  </div>
                  
                  <div class="col-sm-6">
                    
                      <label>Address</label>

                      <div class="form-group">
                        <input type="text" class="form-control" name="ville" placeholder="Ville" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="quartier" placeholder="quartier" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="rue" placeholder="Rue" required>
                      </div>
                      <div class="form-group">  
                        <input type="text" class="form-control" name="postal" placeholder="Code postal  " required>
                    
                      </div>
                     
                      <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" name="tel" placeholder="ex: +212 600000000 " required>


                      </div>

                      <div class="form-group">
                        <label>Nature</label>
                        <br>
                        <input type="radio" name="nature" value="Particulier"> Particulier. |  
                        <input type="radio" name="nature" value="Société"> Société <br>
                    
                      </div>
                    
                      <div class="form-group">
                        <label>Agence</label>
                        
                        <select name="agence"  class="form-control">
                          
                          <?php foreach ($agences as $key => $value) {
                           ?>
                          <option value="<?= $value['numAgence']; ?>"> 
                            <?= $value['libelle']; ?></option>

                          <?php  } ?>
                        </select>
                      </div>

                    </div>
                  </div>

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
 
</script>
</body>
</html>
