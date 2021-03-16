<?php
    class Database {
        // DB Params
        private $host = 'lmc8ixkebgaq22lo.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
        private $db_name = 'aszhlss0odrac2x0';
        private $username = 'met9rvy7ggqm7gbr';
        private $password = 'auayitj6t5kr9ttg';
        private $conn;

        // DB Connect
    public function connect() {
        $this->conn = null;
  
        try { 
          $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo 'Connection Error: ' . $e->getMessage();
        }
  
        return $this->conn;
      }
    }
