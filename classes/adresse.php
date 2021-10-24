<?php


/*
    Class address 
*/

  require_once $_SERVER["DOCUMENT_ROOT"] .  '/db/connexion.php';


class Adresse extends Connexion
{
    private $numeroAdresse;
    private $ville;
    private $quartier;
    private $rue;
    private $telephone;
    private $codePostal;



   public function __construct() {}


/*
    Getters et Setters pour chaque propriété 
*/

    public function getNumeroAdresse()
    {
        return $this->numeroAdresse;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getQuartier()
    {
        return $this->quartier;
    }

    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;
    }

    public function getRue()
    {
        return $this->rue;
    }

    public function setRue($rue)
    {
        $this->rue = $rue;
    }

   

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getCodePostal()
    {
        return $this->codePostal;
    }

    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    public function ajoutAdresse($ville,$quartier,$rue,$telephone,$codePostal)
    {
         $stmt = parent::insert('adresse', array($ville,$quartier,$rue,$telephone,$codePostal));
          
          return $stmt;
    }


     public function modifAdresse($id,$fields = array()) 
    {
         $stmt = parent::update('adresse', 'numeroAdresse ='. $id, $fields);
          
          return $stmt;
    }

    public function deleteAdresse($id) {

        if($stmt = parent::delete('adresse', array('numeroAdresse', '=', $id)))  {

            return $stmt; 
         }
    }


    public function getNumAdresse($tel)
    {


          $stmt = parent::get('adresse', array('telephone', '=',$tel));
          
          return $stmt[0]['numeroAdresse'];

      }


   public function findById($numeroAdresse) {
        if($numeroAdresse) {
            $field = 'numeroAdresse';
            $data = parent::get('adresse', array($field, '=', $numeroAdresse));

            if($data) {

                $this->_data = $data;
                return $this->_data;
            }
        }
        return false;
    }


}