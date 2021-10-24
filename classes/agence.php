<?php


/*
    Class Agence 
*/

require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';


class Agence extends Connexion
{
    private $numAgence;
    private $labelle;
    private $horaires;


   public function __construct() {}


    public function getNumAgence()
    {
        return $this->numAgence;
    }

    public function setNumAgence($numAgence)
    {
        $this->numAgence = $numAgence;
    }

    public function getLabelle()
    {
        return $this->labelle;
    }

    public function setLabelle($labelle)
    {
        $this->labelle = $labelle;
    }

    public function getHoraires()
    {
        return $this->horaires;
    }

    public function setHoraires($horaires)
    {
        $this->horaires = $horaires;
    }


    public function findAll() {

    
        $data = parent::getAll('agence');

            if($data) {
                
              return $data;
            }
        
        return false;
    }


    public function find($agence = null) {
        if($agence) {
            $field = 'numAgence';
            $data = parent::get('agence', array($field, '=', $agence));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }


    
    public function findById($id) {
        if($id) {
            $field = 'numAgence';
            $data = parent::get('agence', array($field, '=', $id));

            if($data) {

                $this->_data = $data[0];
                return $this->_data;
            }
        }
        return false;
    }

      public function ajoutAgence($libelle,$horaire)
    {


               
          $stmt = parent::insert('agence', array($libelle,$horaire));

          return $stmt; 
          
    }

    public function modifAgence($id, $fields = array()) 
    {
  
          $stmt = parent::update('agence', 'numAgence = '. $id, $fields);

          return $stmt; 
          
    }


    public function deleteAgence($id) {

        if($stmt = parent::delete('agence', array('numAgence', '=', $id)))  {
            return $stmt; 
         }
    }

}