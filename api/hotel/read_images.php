<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Hotels.php';
  include_once '../../models/Images.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

   // Instantiate Hotels object
   
   $image = new Images($db);
  

    // Blog post query
  
  $result = $image->read();
  

  // Get row count
  $num = $result->rowCount();
  
  

  // Check if any hotels 
  if($num > 0) {
    // image array
    $images_arr = array();
  
    $images_arr['Images'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
     

      $image_item = array(
        
        'id image' => $id_img,
        'id hotel' => $id_hotel,
        'url image' => $url

      );

     

      // Push to "data"
      //array_push($hotels_arr,$hotel_item);
      
      array_push($images_arr['Images'], $image_item);
    }

    // Turn to JSON & output
    echo json_encode($images_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Images Found')
    );
  }



  