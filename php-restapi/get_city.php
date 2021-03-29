<?php 

  //Header
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  // Data Array
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

  // Function search
  if(!empty($_GET['search'])) {
    $key = array_search($_GET['search'], array_column($data, 'name'),true);
    $id = $data[$key]['id'];
    $name = $data[$key]['name'];
    $result = array(
      'id' => $id,
      'name' => $name,
      'status' => 'success'
    );
    http_response_code(200);
    echo json_encode($result); 
  } else {
    foreach($data as $d) {
      $result['city'][] = array(
        'id' => $d['id'],
        'name' => $d['name'],
      );
    }
    $result['status'][] = 'success';
    http_response_code(200);
    echo json_encode($result); 
  }
?>