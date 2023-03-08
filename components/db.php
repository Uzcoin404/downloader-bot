<?php
    class Database{
        private $hostname = '127.0.0.1';
        private $username = 'root';
        private $password = '';
        private $database = 'shop-bot';
        private $port = 19546;
        
        private function connect(){
            $mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);
            
            if ($mysqli->connect_error) {
                die('Connect Error (' . $mysqli->connect_errno . ')  '. $mysqli->connect_error);
            }
            return $mysqli;
        }
    }
