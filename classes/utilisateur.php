<?php

/*
    Class utilisateur   
*/

  require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';



class Utilisateur extends Connexion
{ 
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $role;
    


   public function __construct() {}



    public function getId()
    {
        return $this->id;
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

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }


     /**
     * Méthode Inscrire 
     */

/*    public function inscrire($nom,$prenom,$email,$password)
    {


       
          $new_password = password_hash($password, PASSWORD_DEFAULT);
           
          $stmt = parent::insert('utilisateur', array($nom,$prenom,$email,$new_password));

          return $stmt; 
          
    }*/

  
    public function createUser($fields = array()) {


        if($stmt = parent::insert('utilisateur', $fields)) {
          return $stmt; 
        }
    
    }

 
    public function updateUser($id, $fields = array()) {

        if($stmt = parent::update('utilisateur','id = ' . $id, $fields)) {
            return $stmt; 
         }

    }

   
    public function deleteUser($id) {

        if($stmt = parent::delete('utilisateur', array('id', '=', $id)))  {

            return $stmt; 
         }
    }

   
    public function find($userEmail = null) {
        if($userEmail) {
            $field = 'email';
            $data = parent::get('utilisateur', array($field, '=', $userEmail));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }

     public function findById($id) {
        if($id) {
            $field = 'id';
            $data = parent::get('utilisateur', array($field, '=', $id));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }

    
    public function findAll() {

            $field = 'role';
            $data['emp'] = parent::get('utilisateur', array($field, '=', 'Employe'));

            $data['clt'] = parent::getAll('client');

            if($data) {
                
              return $data;
            }
        return false;
    }

    public function login($email = null, $password = null) {
       
            $user = $this->find($email);

            if ($user) {
              
                if ( password_verify($password, $user['password']) ) {


                    return $user;
                }
            }
        
        return false;
    }


    public function redirect($url)
    {
       header("Location: $url");
    }
}