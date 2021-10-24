<?php

/**
  Class Operation
 */

  require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';

class Operation extends Connexion
{
    private $numOperation;
    private $typeOperation;
    private $compteEmetteur;
    private $compteRecepteur;
    private $somme;
    private $dateOperation;

    public function __construct()
    {
    }

   
    public function getNumOperation()
    {
        return $this->numOperation;
    }

   
    public function setNumOperation($numOperation)
    {
        $this->numOperation = $numOperation;
    }

   
    public function getTypeOperation()
    {
        return $this->typeOperation;
    }

    
    public function setTypeOperation($typeOperation)
    {
        $this->typeOperation = $typeOperation;
    }

   
    public function getCompteEmetteur()
    {
        return $this->compteEmetteur;
    }


    public function setCompteEmetteur($compteEmetteur)
    {
        $this->compteEmetteur = $compteEmetteur;
    }

    public function getCompteRecepteur()
    {
        return $this->compteRecepteur;
    }


    public function setCompteRecepteur($compteRecepteur)
    {
        $this->compteRecepteur = $compteRecepteur;
    }


   
    public function getSomme()
    {
        return $this->somme;
    }

   
    public function setSomme($somme)
    {
        $this->somme = $somme;
    }

   
    public function getDateOperation()
    {
        return $this->dateOperation;
    }

    
    public function setDateOperation($dateOperation)
    {
        $this->dateOperation = $dateOperation;
    }


    
    public function findAll() {

    
        $data = parent::getAll('operation');

            if($data) {
                
              return $data;
            }
        
        return false;
    }

     public function ajoutOperation($emetteur,$recepteur,$typeOp,$somme,$date)
    {
           
          $stmt = parent::insert('operation', array($emetteur,$recepteur,$typeOp,$somme, $date));

          return $stmt; 
          
    }

    public function deleteOperation($id) {

        if($stmt = parent::delete('operation', array('numOperation', '=', $id)))  {
            return $stmt; 
         }
    }


 
    public function findUserOp($id)
    {

          $stmt = parent::getClientOp($id);

          return $stmt; 

    }
   

     public function redirect($url)
    {
       header("Location: $url");
    }

}