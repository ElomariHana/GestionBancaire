<?php


/*
    Class Client 
*/


  require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';



class Client extends Connexion
{
    private $numClient;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $dateNais; 
    private $civilite; 
    private $nature;
    private $agence;
    private $adresse;




    /*
        Constructeur Client, afin d'instancier un objet client 
    */

    public function __construct() {

    }


    public function getNumClient()
    {
        return $this->numClient;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getDateNais()
    {
        return $this->dateNais;
    }

    public function setDateNais($dateNais)
    {
        $this->dateNais = $dateNais;
    }

    public function getNature()
    {
        return $this->nature;
    }

    public function setNature($nature)
    {
        $this->nature = $nature;
    }

    public function getCivilite()
    {
        return $this->civilite;
    }

    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }



     public function findAll() {

    
        $data = parent::getAll('client');

            if($data) {
                
              return $data;
            }
        
        return false;
    }


    public function find($client = null) {
        if($client) {
            $field = 'email';
            $data = parent::get('client', array($field, '=', $client));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }

     public function findById($numClient) {
            if($numClient) {
                $field = 'numClient';
                $data = parent::get('client', array($field, '=', $numClient));

                if($data) {

                    $this->_data = $data;
                    return $this->_data;
                }
            }
            return false;
        }


    public function login($email = null, $password = null) {
        if(!$email && !$password && $this->exists()) {

        } else {
            $client = $this->find($email);

            if ($client) {

                if ( password_verify($password, $client["password"]) ) {


                    $this->isLoggedIn = true;
                    return true;
                }
            }
        }
        return false;
    }



    public function ajoutClient($nom,$prenom,$email,$password,$dateNais, $civilite, $nature,$agence,$adresse)
    {


       
          $new_password = password_hash($password, PASSWORD_DEFAULT);
           
          $stmt = parent::insert('client', array($nom,$prenom,$email,$new_password,$dateNais, $civilite, $nature,$agence,$adresse));

          return $stmt; 
          
    }

 
    public function modifClient($id, $fields = array()) {

        if($stmt = parent::update('client', 'numClient = ' . $id,$fields)) {
            return $stmt; 
         }
    }

   
    public function deleteClient($id) {

        if($stmt = parent::delete('client', array('numClient', '=', $id)))  {
            return $stmt; 
         }
    }




    public function redirect($url)
    {
       header("Location: $url");
    }

}