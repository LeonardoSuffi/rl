<form action="processar_formulario.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="mensagem">Mensagem:</label>
    <textarea id="mensagem" name="mensagem" required></textarea>
    
    <input type="submit" value="Enviar">
</form>

<?php
    $email = $_POST["email"];

$destinatario = "leonardo.fco123@gmail.com";
$assunto = "Nova mensagem do formulário de contato";


$corpo = "Nome: $nome\n";
$corpo .= "E-mail: $email\n";
$corpo .= "Mensagem:\n $mensagem";

$remetente = "contato@acelera10x.com.br"; // O endereço de e-mail que você criou em sua hospedagem
$senha = "Contato0110*"; // A senha da conta de e-mail

$host_smtp = "mailacelera10x.com.br"; // Nome do servidor SMTP fornecido pela sua hospedagem
$porta_smtp = 465; // A porta SMTP (pode variar dependendo das configurações do seu host)
$secure_smtp = "ssl"; // Use "tls" ou "ssl" dependendo das configurações do seu host

mail($destinatario, $assunto, $corpo, "From: $remetente", "-f$remetente");
    // Redirecionar o usuário após o envio do formulário
    header("Location: obrigado.html");
    exit;
?>
