<?php 

  //Header
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: DELETE");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  // Data
  $data = array(
    array(
      'id' => '1',
      'name' => 'Bandung'
    ),
    array(
      'id' => '2',
      'name' => 'Jakarta'
    ),
    array(
      'id' => '3',
      'name' => 'Surabaya'
    ),
  );

  $method = $_SERVER['REQUEST_METHOD'];
  if ('DELETE' === $method) {
      parse_str(file_get_contents('php://input'), $_DELETE);
      //var_dump($_PUT); //$_PUT contains put fields 
  }
  // Function Edit Data
  if(!empty($_DELETE['id'])) {
    // New Data
    foreach($data as $d) {
      if($d['id'] != $_DELETE['id']) {
        $result['city'][] = array(
          'id' => $d['id'],
          'name' => $d['name'],
        );
      }
    }
    $result['status'] = 'success';
  } else {
    foreach($data as $d) {
      $result['city'][] = array(
        'id' => $d['id'],
        'name' => $d['name'],
      );
    }
    $result['status'] = 'success';
  }

  http_response_code(200);
  echo json_encode($result); 
?>