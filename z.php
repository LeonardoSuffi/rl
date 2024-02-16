<?php

// Verifica se o método da requisição é POST e se há dados no corpo da requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    // Parâmetros da requisição
    $cnpj = $_POST['input-payment-custom-field1'];
    $email = $_POST['input-payment-email'];
    $telefone = $_POST['input-payment-telephone'];
    $nome = $_POST['input-payment-firstname'];
    $sobrenome = $_POST['input-payment-lastname'];

    // Função para configurar a requisição POST
    function configPost($body) {
        return [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($body),
            ]
        ];
    }

    // Regras
    $rules = [
        'update' => true,
        'filter_status_update' => 'open',
        'status' => 'open',
    ];

    // Dados do lead
    $lead = [
        [
            'id' => $email,
            'title' => strtoupper($nome),
            'mobile_phone' => $telefone,
            'name' => $nome . ' ' . $sobrenome,
            'email' => $email,
            'last_conversion' => [
                'source' => 'Cadastro Usuario',
            ],
            'custom_fields' => [
                'CPF/CNPJ' => $cnpj
            ],
        ],
    ];

    // Dados a serem enviados
    $dataToSend = [
        'rules' => $rules,
        'leads' => $lead,
    ];

    // Configura e envia a requisição
    $endpointHash = "https://app.pipe.run/webservice/integradorJson?hash=54b6d9e9-a506-4003-973a-59ba49d3d5d4";
    $options = configPost($dataToSend);
    $context = stream_context_create($options);
    $result = file_get_contents($endpointHash, false, $context);

    // Manipula a resposta
    if ($result === FALSE) {
        // Tratamento de erro
        echo "Erro ao enviar requisição";
    } else {
        // Requisição bem sucedida
        echo "Requisição enviada com sucesso";
    }
} else {
    // Se não for uma requisição POST válida
    echo "Método de requisição inválido ou sem dados";
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registro de Conta</title>
</head>
<body>
    <form action="#" id="register-form" method="post">
        <label for="input-payment-custom-field1">CNPJ:</label><br>
        <input type="text" id="input-payment-custom-field1" name="input-payment-custom-field1" required><br><br>
        
        <label for="input-payment-email">Email:</label><br>
        <input type="email" id="input-payment-email" name="input-payment-email" required><br><br>
        
        <label for="input-payment-telephone">Telefone:</label><br>
        <input type="tel" id="input-payment-telephone" name="input-payment-telephone" required><br><br>
        
        <label for="input-payment-firstname">Nome:</label><br>
        <input type="text" id="input-payment-firstname" name="input-payment-firstname" required><br><br>
        
        <label for="input-payment-lastname">Sobrenome:</label><br>
        <input type="text" id="input-payment-lastname" name="input-payment-lastname" required><br><br>
        
        <button type="submit" id="button-register-account">Registrar Conta</button>
    </form>
</body>
</html>
