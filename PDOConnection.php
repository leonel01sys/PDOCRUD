<?php
    class Connection {

        public $servername;
        public $username;
        public $password;

        function __construct($servername, $username, $password) {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
        }

        function getConnection($database){
            try {
                
                $conn = new PDO("mysql:host=$this->servername;dbname=$database", $this->username, $this->password);
                //Establece el modo de error PDO para excepciones
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
        }

    }
