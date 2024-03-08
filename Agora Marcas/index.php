<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11429071021"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-11429071021');
    </script>
</head>
<body>

<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$payload = file_get_contents("php://input");

$webhook_data = json_decode($payload, true);

$valor = $webhook_data['valor'];
$id = $webhook_data['Id']['id'];

echo "<script>
    gtag('event', 'conversion', {
        'send_to': 'AW-11429071021/BznoCPTIiYUZEK2R58kq',
        'value': '$valor',
        'currency': 'BRL',
        'transaction_id': '$id'
    });
</script>";
?>
</body>
</html>