<?php
// Configurar cabeçalhos CORS para permitir solicitações de http://localhost:8080
header("Access-Control-Allow-Origin: https://app.pipe.run");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Recebe o payload JSON do webhook
$payload = file_get_contents("php://input");

// Decodifica o JSON para um array associativo
$data = json_decode($payload, true);

// Verifica se o JSON foi decodificado corretamente
if ($data === null) {
    die('Erro ao decodificar o JSON do webhook.');
}

// Verifica se 'id' e 'value' existem no array antes de acessá-los
if (isset($data['id']) && isset($data['value'])) {
    // Extrai os valores desejados
    $id = $data['id'];
    $value = $data['value'];

    // Adiciona o script JavaScript com os valores extraídos
    echo "<html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Teste de Webhook</title>
                <script async src='https://www.googletagmanager.com/gtag/js?id=AW-11429071021'></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());
                    gtag('config', 'AW-11429071021');
                </script>
            </head>
            <body>
                <script>
                    function gtag_report_conversion(url) {
                        var callback = function () {
                            if (typeof(url) != 'undefined') {
                                window.location = url;
                            }
                        };
                        gtag('event', 'conversion', {
                            'send_to': 'AW-11429071021/BznoCPTIiYUZEK2R58kq',
                            'value': $value,
                            'currency': 'BRL',
                            'transaction_id': $id,
                            'event_callback': callback
                        });
                        return false;
                    }
                </script>
            </body>
          </html>";
} else {
    // Caso os campos não estejam presentes
    echo "Campos 'id' ou 'value' não encontrados no JSON do webhook.\n";
}
?>
