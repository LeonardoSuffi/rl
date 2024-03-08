<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11429071021"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11429071021');
</script>
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
// Recebe os dados do webhook
$webhookData = file_get_contents('php://input');


// Verifica se há dados no webhook
if ($webhookData) {
    // Script do evento de conversão
    $script = "<!-- Event snippet for Compra CRM conversion page
    In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
    <script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
      };
      gtag('event', 'conversion', {
          'send_to': 'AW-11467791446/DOozCJCwyZYZENa4otwq',
          'value': 1.0,
          'currency': 'BRL',
          'transaction_id': '',
          'event_callback': callback
      });
      return false;
    }
    </script>";

    // Envia o script para o Google Ads
    $url = 'https://www.googleadservices.com/pagead/conversion/AW-11429071021/?script='.$script; // Substitua 'XXXXXXXXX' pelo ID do Google Ads
    $response = file_get_contents($url);

    // Verifica se o envio foi bem-sucedido
    if ($response) {
        echo "Script de conversão enviado com sucesso para o Google Ads.";
    } else {
        echo "Erro ao enviar o script de conversão para o Google Ads.";
    }
} else {
    echo "Nenhum dado recebido do webhook.";
}
?>
