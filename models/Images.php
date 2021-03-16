<?php 
  class Images {
    // DB stuff
    private $conn;
    private $table = 'images';

    // Hotel Properties
    public $id_img;
    public $id_hotel;
    public $url;
    
    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
      }

      // Get Hotels
    public function read() {
        // Create query
        $query = 'SELECT *  FROM ' . $this->table . ' 
                                  ORDER BY id_img ' ;

        // Prepare statement
         $stmt = $this->conn->prepare($query);

      // Execute query
        $stmt->execute();

      return $stmt;
    }

}