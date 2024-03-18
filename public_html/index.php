<?php
function pipe() {
  $endpointHash = "https://app.pipe.run/webservice/integradorJson?hash=7607b06d-9703-4b89-bc1c-3e8a4bcf30e8";
  $name = $_POST['nome'];
  $email = $_POST['email'];
  $phone = $_POST['tel'];

  function configPost($method, $body) {
    return array(
      'method' => $method,
      'headers' => array('Content-Type: application/json'),
      'body' => json_encode($body)
    );
  }

  $rules = array(
    'update' => true,
    'filter_status_update' => 'open',
    'status' => 'open'
  );

  $lead = array(
    array(
      'id' => $email,
      'title' => strtoupper($name),
      'mobile_phone' => $phone,
      'name' => $name,
      'email' => $email,
      'last_conversion' => array(
        'source' => 'Site Principal / Saida'
      ),
      'custom_fields' => array(
        'url_conversao' => $_SERVER['HTTP_REFERER']
      )
    )
  );

  $dataToSend = array(
    'rules' => $rules,
    'leads' => $lead
  );

  $options = configPost("POST", $dataToSend);
  $context = stream_context_create(array('http' => $options));
  $result = file_get_contents($endpointHash, false, $context);

  if ($result !== false) {
    echo "success";
  } else {
    echo "error";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  pipe();
}
?>