<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Webhook</title>
</head>
<body>
    <script>
        // Simulando payload da webhook
        var webhookData = {
            "id": 33545225,
            "city": "São Paulo",
            "hash": "ads124",
            "value": "5.00"
        };

        // Enviando payload para o seu arquivo PHP
        fetch('https://registrarmarcaagora.com.br/webhook.php', {
            method: 'POST',
            body: JSON.stringify(webhookData),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error('Erro:', error));
    </script>
</body>
</html>
