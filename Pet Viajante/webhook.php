<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11429071021"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11429071021');
</script>

<?php
// Configurar cabeçalhos CORS para permitir solicitações de qualquer origem
header("Access-Control-Allow-Origin: *");
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

// Verifica se o campo 'valor' e 'Id' existem no array antes de acessá-los
if (isset($data['valor']) && isset($data['Id']['id'])) {
    // Extrai os valores desejados
    $valor = $data['valor'];
    $id = $data['Id']['id'];

    // Monta a string de consulta com os dados da conversão
    $queryString = http_build_query(array(
        'value' => 1.0,
        'currency' => 'BRL',
        'transaction_id' => $id,
        'label' => "Compra Piper"
    ));

    // URL de acompanhamento de conversão do Google Ads
    $googleAdsConversionUrl = 'https://www.googleadservices.com/pagead/conversion/AW-11467791446/';

    // Inicializa o objeto cURL
    $curl = curl_init();

    // Define as opções da requisição cURL
    curl_setopt($curl, CURLOPT_URL, $googleAdsConversionUrl);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $queryString);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Executa a requisição e obtém a resposta
    $response = curl_exec($curl);

    // Fecha a sessão cURL
    curl_close($curl);

    // Verifica se a solicitação foi bem-sucedida
    if ($response !== false) {
        echo 'Conversão enviada com sucesso para o Google Ads.';
    } else {
        echo 'Erro ao enviar a conversão para o Google Ads.';
    }
} else {
    // Caso os campos não estejam presentes
    echo "Campos 'valor' ou 'Id' não encontrados no JSON do webhook.\n";
}
?>