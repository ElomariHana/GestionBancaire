<?php


class Connexion

{

    private static $_instance = null;
    
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;


    /**
     * Empêche la création externe d'instances.
     */

    private function __construct() {}


    /**
     * Empêche la copie externe de l'instance.
     */

    private function __clone(){}



    /**
     * Renvoi de l'instance et initialisation si nécessaire. 
     */

    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new Connexion();
        }
        return self::$_instance;
    }



    /*
    *  method pour Inserer utilisateur & Client
    */

   public function insert($table, $fields = array()) {

       try {
            $this->_pdo = new PDO('mysql:dbname=db_3;host=127.0.0.1', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }


       $values = null;
        foreach($fields as $field) {
                $values .= ", '".$field."' ";            
        }


        $sql = "INSERT INTO `{$table}`  VALUES (NULL {$values})";

        if($this->_pdo->query($sql)) {
            
    
            return true;
        }
        
        return false;
    }

    /*
    * Query pour executé les request sql
    */

    public function query($sql, $params = array(), $table) {

        try {
            $this->_pdo = new PDO('mysql:dbname=db_3;host=127.0.0.1', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }

        $this->_error = false;

        if($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if(count($params)) {
                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll();
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }

        return $this; 
    }



    public function action($action, $table, $where = array()) {

        if(count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if(!$this->query($sql, array($value), $table)->error()) {
                    return $this->_results;
                }
            }

        }

        return false;
    }



    public function update($table, $id, $fields) {
         try {
            $this->_pdo = new PDO('mysql:dbname=db_3;host=127.0.0.1', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }

        $set = '';
        $x = 1;

        foreach($fields as $name => $value) {
            $set .= "{$name} = '{$value}'";
            if($x < count ($fields)) {
                $set .= ', ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE {$id}";

        if($this->_pdo->query($sql)) {

            return true;
        }



        return false;
    }

    public function delete($table, $where) {
        return $this->action('DELETE ', $table, $where);
    }

    public function get($table, $where) {

        return $this->action('SELECT *', $table, $where);
    }

    public function results() {
        return $this->_results;
    }

   
    public function count() {
        return $this->_count;
    }


    public function getAll($table) {
       
       try {
            $this->_pdo = new PDO('mysql:dbname=db_3;host=127.0.0.1', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }



        $sql = "SELECT * FROM `{$table}`";
        

        $this->_results = $this->_pdo->query($sql);

/*        highlight_string("<?php \n".var_export($this->_results->fetchAll(PDO::FETCH_ASSOC), true)); exit();
*/

        if ($this->_results) {
            
            return $this->_results->fetchAll();       


        }
        


        return false;
    }


    public function getClientComptes($id) {
       
       try {
            $this->_pdo = new PDO('mysql:dbname=db_3;host=127.0.0.1', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }



        $sql = "SELECT * FROM `compte` WHERE numClient = {$id} ";
        

        $this->_results = $this->_pdo->query($sql);




        if ($this->_results) {
            
            return $this->_results->fetchAll();       


        }
        


        return false;
    }


    public function getClientOp($id) {
       
       try {
            $this->_pdo = new PDO('mysql:dbname=db_3;host=127.0.0.1', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }



        $sql = "SELECT * FROM operation JOIN compte ON  operation.compteEmetteur  =  compte.idCompte WHERE compte.numClient = {$id}  ";
        

        $this->_results = $this->_pdo->query($sql);



        if ($this->_results) {
            
            return $this->_results->fetchAll();       


        }
        


        return false;
    }



    public function error() {
        return $this->_error;
    }

}
  
