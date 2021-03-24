<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Hotels.php';


  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

   // Instantiate Hotels object
   $hotel = new Hotels($db);
   
  

    // Blog post query
  $result = $hotel->read();
  
  

  // Get row count
  $num = $result->rowCount();
  
  
  


  // Check if any hotels 
  if($num > 0) {
    // Hotel array
    $hotels_arr = array();
    
  
    $hotels_arr['Hotels'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
     

      $hotel_item = array(
        'id' => $id,
        'nom' => $nom,
        'description' => $description,
        'adresse' => $adresse,
        'email' => $email,
        'reseaux_sociaux' => $reseaux_sociaux,
        'url1' => $url1,
        'url2' => $url2,
        'url3' => $url3,
        'url4' => $url4,
        'telephone' => $telephone,
        'latitude' => $longitude,
        'longitude' => $latitude

      );

     

      // Push to "data"
      //array_push($hotels_arr,$hotel_item);
      
      array_push($hotels_arr['Hotels'], $hotel_item);
    }

    // Turn to JSON & output
    echo json_encode($hotels_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Hotels Found')
    );
  }



  // Check if any images 
  /*
  if($num1 > 0) {
    // Hotel array
    
    $images_arr = array();
    $images_arr['Images'] = array();

    while($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
     
      extract($row1);

      $image_item = array(
        'id image' => $id_img,
        'id hotel' => $id_hotel,
        'Lien' => $url,
      );

      // Push to "data"
     
      //array_push($images_arr,$image_item);
      array_push($images_arr['Images'], $image_item);
    }

    // Turn to JSON & output
    echo json_encode($images_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Images Found')
    );
  }*/
