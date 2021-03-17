<?php 
  class Hotels {
    // DB stuff
    private $conn;
    

    // Hotel Properties
    public $id;
    public $nom;
    public $description;
    public $adresse;
    public $telephone;
    public $email;
    public $reseaux_sociaux;
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
        $query = 'SELECT *  FROM hotels, images 
                                  ORDER BY id ' ;

        // Prepare statement
         $stmt = $this->conn->prepare($query);

      // Execute query
        $stmt->execute();

      return $stmt;
    }

}