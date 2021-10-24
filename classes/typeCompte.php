<?php


/*
    Class Type de compte bancaire 
*/

  require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';


class TypeCompte extends Connexion
{
    private $numTypeCompte;
    private $libelle;
    private $tauxInteret;

   public function __construct() {}


    public function getNumTypeCompte()
    {
        return $this->numTypeCompte;
    }

    public function setNumTypeCompte($numTypeCompte)
    {
        $this->numTypeCompte = $numTypeCompte;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function getTauxInteret()
    {
        return $this->tauxInteret;
    }

    public function setTauxInteret($tauxInteret)
    {
        $this->tauxInteret = $tauxInteret;
    }


      public function findAll() {

    
        $data = parent::getAll('typeCompte');

            if($data) {
                
              return $data;
            }
        
        return false;
    }


    public function find($type = null) {
        if($type) {
            $field = 'numTypeCompte';
            $data = parent::get('typeCompte', array($field, '=', $type));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }

      public function redirect($url)
    {
       header("Location: $url");
    }
    
}