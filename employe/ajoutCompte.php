<?php


/*
  include la connexion a la base de données 
*/


include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';


if(isset($_POST['submit'])) {

$solde = $_POST['solde'];
$num_client = $_POST['client'];
$typeCo = $_POST['typeCompte'];
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

    if ($_POST['nouveau'] === "non") {
    
   
        $status = $compte->ajoutCompte('18002'.mt_rand(1000, 9999), $solde, $num_client, $typeCo);
        if ($status) {

        $success =  "Compte crée avec succès"; 
          
        } else {
          $error = " Error !";
        }

    } elseif ($_POST['nouveau'] === "oui" && !in_array(null, $_POST) ) {

      $compte->ajoutCompte('18002'.mt_rand(1000, 9999), $solde, $num_client, $typeCo);

      $adresse->ajoutAdresse($ville,$quartier,$rue,$tel,$postal);
      
       $add =  $adresse->getNumAdresse($tel);

      $client->ajoutClient($nom,$prenom,$email,$pass,$dateNais, $civilite, $nature,$agence,$add);

      $utilisateur->redirect('/admin/comptes.php');

    } else {

        $error = "Erreur !";

    }
} 

?>

   

   <!-- Main row -->
      <div class="row">

        <div class="col-sm-12">

           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Nouveau compte Client</h3>
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

              <form method="post" action="">
                <div class="box-body">

                  <div class="row">

                    <div class="col-sm-6">

                      <div class="form-group">
                       
                        <label for="nouveau">Nouveau Compte?</label><br>
                        <input type="radio" name="nouveau" value="oui" checked> Oui    | 
                        <input type="radio" name="nouveau" value="non"> Non <br>
                      </div>

                    </div>
            
                    <div class="col-sm-6" id="client-choix">
                    
                      <div class="form-group">
                        <label>Choisissez un client : </label>

                        <select name="client"  class="form-control">
                          
                          <?php foreach ($clients as $key => $value) {
                           ?>
                          <option value="<?= $value['numClient']; ?>"> 
                            <?= $value['nom'] . " " . $value['prenom'] . " - " . $value['email']; ?></option>

                          <?php  } ?>
                        </select>


                      </div>

                      

                    </div> 

                    <div class="col-sm-6">
                    
                      <div class="form-group">
                        <label>Solde  : </label>
                       <input type="text" class="form-control" name="solde" placeholder="ex: 21000 ">
                        
                  
                      </div>
                    </div>


                    <div class="col-sm-6">
                    
                      <div class="form-group">
                        <label>Type </label>

                        <select name="typeCompte"  class="form-control">
                          
                          <?php foreach ($typesComptes as $key => $value) {
                           ?>
                          <option value="<?= $value['numTypeCompte']; ?>"> <?= $value['libelle']; ?></option>

                          <?php  } ?>
                        </select>


                      </div>
                    </div> 

                     

                  </div>

                  <hr>
                  
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
                      <input type="text" class="form-control" name="nom" placeholder="Nom">
                    </div>
                    
                    <div class="form-group">
                      <label>Prenom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                    </div>

                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    
                     <div class="form-group">
                      <label>Mot de passe Nouveau  Client</label>
                      <input type="password" class="form-control" name="pass" placeholder="mot de passe">
                    </div>
                    
                    <div class="form-group">
                      <label>Date Naissance</label>
                      <input type="date" class="form-control" name="dateNais">
                    </div>

                  </div>
                  
                  <div class="col-sm-6">
                    
                      <label>Address</label>

                      <div class="form-group">
                        <input type="text" class="form-control" name="ville" placeholder="Ville">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="quartier" placeholder="quartier">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="rue" placeholder="Rue">
                      </div>
                      <div class="form-group">  
                        <input type="text" class="form-control" name="postal" placeholder="Code postal  ">
                    
                      </div>
                     
                      <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" name="tel" placeholder="ex: +212 600000000 ">


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
  
  
  $(document).ready(function() {
             $("#client-choix").hide();

   $('input[name="nouveau"]').click(function() {
       if($(this).val() == 'non') {
         $("#client-form").fadeOut();
         $("#client-choix").fadeIn();
       }

       else {
         $("#client-form").fadeIn();
         $("#client-choix").fadeOut();
       }
   });
});
</script>
</body>
</html>
