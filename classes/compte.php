<?php

/*
    Class Compte bancaire 
*/

  require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';


class Compte extends Connexion
{ 
    private $id;
    private $numCompte;
    private $solde;
    private $numClient;
    private $numTypeCompte;


   public function __construct() {}

    public function getNumCompte()
    {
        return $this->numCompte;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

     public function getClient()
    {
        return $this->numClient;
    }

    public function setClient($numClient)
    {
        $this->numClient = $numClient;
    }

      public function getTypeCompte()
    {
        return $this->numTypeCompte;
    }

    public function setTypeCompte($numTypeCompte)
    {
        $this->numTypeCompte = $numTypeCompte;
    }



    public function getCompte($num) {

        $data = null;
        $data = parent::get('compte', array('numCompte', '=', $num));

        return $data;
    }


    public function findAll()
    {       
        if ($comptes = parent::getAll('compte')) {
            return $comptes;
        }
        return false;
    }

     public function findById($id) {
        if($id) {
            $field = 'numCompte';
            $data = parent::get('compte', array($field, '=', $id));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }

    public function ajoutCompte($numCompte,$solde,$client,$numTypeCompte)
    {
  
          $stmt = parent::insert('compte', array($numCompte,$solde,$client,$numTypeCompte));

          return $stmt; 
          
    }

    public function modifCompte($idCompte, $solde) 
    {
  
          $stmt = parent::update('compte', 'idCompte = '. $idCompte, $fields);

          return $stmt; 
          
    }

    public function deleteCompte($id) 
    {
  
        $stmt = parent::delete('compte', array('idCompte', '=', $id));

        return $stmt; 
          
    }
       

   
    public function depot($recepteur, $somme) 
    {

        $compte = parent::get('compte', array('idCompte', '=', $recepteur));

            

        $new_solde = $compte[0]['solde'] + $somme;


        $stmt = parent::update('compte', 'idCompte = '. $recepteur, array('solde' => $new_solde));

        return $stmt; 
          
    }
    
      public function retrait($recepteur, $somme) 
        {

            $compte = parent::get('compte', array('idCompte', '=', $recepteur));

                

            $new_solde = $compte[0]['solde'] - $somme;


            $stmt = parent::update('compte', 'idCompte = '. $recepteur, array('solde' => $new_solde));

            return $stmt; 
              
        }
        

    public function findUserComptes($id)
    {

          if($stmt = parent::getClientComptes($id)) {

          return $stmt; 
        }

    }
    


    public function redirect($url)
    {
       header("Location: $url");
    }

}