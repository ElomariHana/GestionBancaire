<?php




include $_SERVER["DOCUMENT_ROOT"] . '/employe/inc/header.php';


if($_GET['id']) {

  $clt = $client->findById($_GET['id']);
  $cltAdresse = $adresse->findById($clt[0]['numeroAdresse']);

}

if(isset($_POST['submit'])) {

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

if (!password_verify($clt[0]['password'], $pass = $_POST['pass']) ) {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
  }

$dateNais = $_POST['dateNais'];
$civilite = $_POST['civilite'];
$ville = $_POST['ville'];
$quartier = $_POST['quartier'];
$rue = $_POST['rue'];
$postal = $_POST['postal'];
$tel = $_POST['tel'];
$nature = $_POST['nature'];
$agence = $_POST['agence'];
 
  
      
      $add =  $adresse->getNumAdresse($tel);

      $adresse->modifAdresse($add ,array('ville' => $ville,'quartier' => $quartier,'rue' => $rue,'telephone' => $tel,'codePostal' => $postal));



      $status = $client->modifClient($id,array('nom' => $nom, 'prenom' => $prenom,'email' => $email, 'password' => $pass, 'dateNais' => $dateNais, 'civilite' => $civilite, 'nature' => $nature, 'numAgence' => $agence, '
        numeroAdresse' => $add));
      
      $clt = $client->findById($id);
     $cltAdresse = $adresse->findById($add);

    if ( $status) {

      $success = "Succès !";

    } else {

        $error = "Erreur !";

    }
} 


if (isset($_POST['supp']))
{


 $id = $_POST['id'];
 $idAdresse = $_POST['idAdresse'];


   if ($client->deleteClient($id) && $adresse->deleteAdresse($idAdresse)) {
        
        $utilisateur->redirect('/admin/comptes.php');
        $success = "Succés, compte Supprimé !";

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
                      <input type="radio" name="civilite" value="M" <?= ($clt[0]['civilite']==='M') ? 'checked' : '';?> > M.
                      <input type="radio" name="civilite" value="Mme" <?= ($clt[0]['civilite']==='Mme') ? 'checked' : '';?> > Mme.
                      <input type="radio" name="civilite" value="Mlle" <?= ($clt[0]['civilite']==='Mlle') ? 'checked' : '';?> > Mlle.
                  
                    </div>

                    <div class="form-group">
                      <label>Nom</label>
                      <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?= $clt[0]['nom'];?>" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Prenom</label>
                      <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="<?= $clt[0]['prenom'];?> " required>
                    </div>

                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email"  value="<?= $clt[0]['email'];?>">
                    </div>
                    
                     <div class="form-group">
                      <label>Mot de passe Client</label>
                      <input type="password" class="form-control" name="pass" placeholder="mot de passe" required  value="<?= $clt[0]['password'];?>">
                    </div>
                    
                    <div class="form-group">
                      <label>Date Naissance</label>
                      <input type="date" class="form-control" name="dateNais" required value="<?= $clt[0]['dateNais'];?>">
                    </div>

                  </div>
                  
                  <div class="col-sm-6">
                    
                      <label>Address</label>

                      <div class="form-group">
                        <input type="text" class="form-control" name="ville" placeholder="Ville" value="<?= $cltAdresse[0]['ville'];?>" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="quartier" placeholder="quartier" value="<?= $cltAdresse[0]['quartier'];?>" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="rue" placeholder="Rue" value="<?= $cltAdresse[0]['rue'];?>" required>
                      </div>
                      <div class="form-group">  
                        <input type="text" class="form-control" name="postal" placeholder="Code postal  " value="<?= $cltAdresse[0]['codePostal'];?>" required>
                    
                      </div>
                     
                      <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" class="form-control" name="tel" placeholder="ex: +212 600000000 " value="<?= $cltAdresse[0]['telephone'];?>" required>


                      </div>

                      <div class="form-group">
                        <label>Nature</label>
                        <br>
                        <input type="radio" name="nature" value="Particulier" <?= ($clt[0]['nature']==='Particulier') ? 'checked' : '';?>> Particulier. |  
                        <input type="radio" name="nature" value="Societe"  <?= ($clt[0]['nature']==='Societe') ? 'checked' : '';?>>  Société <br>
                    
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

                    <input type="hidden" name="id" value="<?= $clt[0]['numClient'];?>">
                    <input type="hidden" name="idAdresse" value="<?= $cltAdresse[0]['numeroAdresse'];?>">


                     <div class="box-footer pull-left">
                      
                      <button class="btn btn-danger" type="submit" name="supp">Supprimer</button>
                 
                                      
                    </div>

                    <div class="box-footer pull-right">

                      <button type="submit" name="submit" class="btn btn-primary" value="submit">Modifier</button>
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
