<?php

    class Contact{
        private $db;
        private $insert;
        public function __construct($db){
            $this->db = $db;
            $this->insert = $this->db->prepare("insert into contact(email, nom, text)values (:email, :nom, :text)");
            
        }
        public function insert($email, $nom, $text){ // Étape 3
            $r = true;
            $this->insert->execute(array(':email'=>$email, ':nom'=>$nom,':text'=>$text));
            if ($this->insert->errorCode()!=0){
                print_r($this->insert->errorInfo());
                $r=false;        
            }        
            return $r;
        }
    }

?>