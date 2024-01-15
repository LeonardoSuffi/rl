<form action="/wp-content/themes/hello-elementor/z.php" method="post">
        <input type="text" size="40" class="nome" name="nome" placeholder="Seu Nome" required>
        <input type="tel" size="20" class="tel" name="tel" placeholder="(00) 90000-0000" required>
        <input type="email" size="40" class="email" name="email" placeholder="exemplo@email.com" required>
        <input type="submit" id="sub1" value="Receber Contato">
    </form>



    CREATE TABLE contatos (
    cCodInt INT AUTO_INCREMENT PRIMARY KEY,
    cNome VARCHAR(255) NOT NULL,
    cNumCel1 VARCHAR(20),
    cEmail VARCHAR(255)
);


<?php
    $nome = $_POST["nome"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];

    // Conexão com o banco de dados (substitua essas informações pelas suas configurações)
    $servername = "cpl03";
    $username = "acelera10x_leo";
    $password = "Lu7leo8846*";
    $database = "acelera10x_Leo";
    $tabela = "contatos";

    // Crie uma conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifique a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO $tabela (cNome, cNumCel1, cEmail) VALUES ('$nome', '$tel', '$email')";

    if (mysqli_query($conn, $sql)) {
        $cCodInt = mysqli_insert_id($conn); // Obtenha o último ID inserido
        echo "Cliente cadastrado com sucesso! O ID do cliente é: " . $cCodInt;
    } else {
        echo "Erro ao cadastrar cliente: " . mysqli_error($conn);
    }

    // Inserir o novo contato com o cCodInt incrementado
    $data = array(
        "call" => "IncluirContato",
        "app_key" => "3737404262592",
        "app_secret" => "21dc254478bc802d2fcb57ccbbf83557",
        "param" => array(
            array(
                "identificacao" => array(
                    "cCodInt" => $cCodInt,
                    "cNome" => $nome,
                    "cSobrenome" => "",
                    "cCargo" => "",
                    "dDtNasc" => "",
                    "nCodVend" => 0,
                    "nCodConta" => 0
                ),
                "endereco" => array(
                    "cEndereco" => "",
                    "cCompl" => "",
                    "cCEP" => "",
                    "cBairro" => "",
                    "cCidade" => "",
                    "cUF" => "",
                    "cPais" => ""
                ),
                "telefone_email" => array(
                    "cDDDCel1" => "",
                    "cNumCel1" => $tel,
                    "cEmail" => $email,
                    "cWebsite" => ""
                )
            )
        )
    );

    $jsonData = json_encode($data);

    // Use cURL para enviar a requisição para o endpoint da API Omie
    $ch = curl_init('https://app.omie.com.br/api/v1/crm/contatos/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);
    curl_close($ch);

    echo "Resposta da API Omie: " . $response;

    $conn->close();
?>