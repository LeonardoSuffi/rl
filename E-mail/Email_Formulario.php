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


<form action="/z.php" id="l1" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="Seu Nome" required>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" placeholder="E-mail" required>
    
    <label for="tel">Telefone para contato:</label>
    <input type="tel" name="tel" id="tel" placeholder="(00) 90000-0000" required/>
    
    <input type="submit" value="Enviar">
</form>

<div id="msg" style="display:none;">
    <p>Obrigado</p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('l1').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/z.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Esconder o formulário e exibir a mensagem de agradecimento
                document.getElementById('l1').style.display = 'none';
                document.getElementById('msg').style.display = 'block';
            }
        };
        xhr.send(formData);
    });
});
</script>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $destinatario = "leads@vendaseucarroagora.com.br";
    $assunto = "$nome Formulario Site";
    
    $corpo = "
    Nome: $nome\n
    E-mail: $email\n
    WhatsApp: $tel";
    mail($destinatario, $assunto, $corpo, "From: $email");
    exit;
}
?>
