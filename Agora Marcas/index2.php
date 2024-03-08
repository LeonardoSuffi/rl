<?php
// Dados simulados para o webhook JSON
$webhook_data = array(
    'valor' => 100, // Valor da conversão
    'Id' => array(
        'id' => '14356789' // ID da transação
    )
);

// Converte os dados em JSON
$payload = json_encode($webhook_data);

// URL onde está hospedado o seu arquivo HTML/PHP
$url = 'http://localhost:8080/projetos/rl/agora%20Marcas/index.php';

// Configuração da solicitação HTTP POST
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => $payload
    )
);

// Cria um contexto de stream
$context  = stream_context_create($options);

// Envia a solicitação HTTP POST com o payload JSON
$result = file_get_contents($url, false, $context);

// Exibe a resposta do servidor
echo $result;
?>
