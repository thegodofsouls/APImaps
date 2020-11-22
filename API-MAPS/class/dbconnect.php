<?php
    class DbConnect{
        private $host = '127.0.0.1';
        private $dbname = 'bd_map';
        private $user = 'root';
        private $pass = 'root';

        public function connection()
        {
            
            try
            {
                 $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass, 
                 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
            }
            catch(PDOException $error)
            {
                //echo 'ERRO: '.$error->getMessage();
                throw new PDOException($error);
                exit;
            }

            return $conn;
        }
    }