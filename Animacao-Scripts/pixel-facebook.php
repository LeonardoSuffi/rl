<?php
$access_token = 'EAAPAUhKakSIBO5fdoUUEirMNaiESmXqFQX2jELZCrIrjfm1J60y58LQjUQZCWzyzbfZBUId6s4adoLU7nZC59yEcaasCQ6y0ysgyB16WaJaHWSle1UScsZAwARYjNGhcZBUbt0M91oOYgZAXzZC82infl1KfyPmoUDCORMi0KxJj4J8C0tZBrgu1vPina8G8CfqoJRgZDZD';
$pixel_id = '1088555712400897';

$email = $_POST["email"];
$hashed_email = hash('sha256', $email); //isso gera a hash do email

$params = array(
    'access_token' => $access_token,
    'data' => array(
        array(
            'event_name' => 'Cadastro',
            'event_time' => time(),
            'user_data' => array(
                'em' => $hashed_email 
            ),
            'action_source' => 'email',
            'data_processing_options' => array('LDU'),
            'data_processing_options_country' => 0 
        )
    )
);

$ch = curl_init('https://graph.facebook.com/v13.0/' . $pixel_id . '/events');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
?>