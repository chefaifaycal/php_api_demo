<?php 
  class Hotels {
    // DB stuff
    private $conn;
    private $table = 'hotels';

    // Hotel Properties
    public $id;
    public $nom;
    public $description;
    public $adresse;
    public $telephone;
    public $email;
    public $reseaux_sociaux;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
      }

      // Get Hotels
    public function read() {
        // Create query
        $query = 'SELECT *  FROM ' . $this->table . ' 
                                  ORDER BY id ' ;

        // Prepare statement
         $stmt = $this->conn->prepare($query);

      // Execute query
        $stmt->execute();

      return $stmt;
    }

}