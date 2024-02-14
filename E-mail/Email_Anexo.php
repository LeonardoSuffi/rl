<?php
$email = $_POST["email"];
$nome = $_POST["nome_completo"];
$vaga = $_POST["vaga"];
$regiao = $_POST["regiao"];
$data_Nascimento = $_POST["data_nascimento"];
$razao_contratacao = $_POST["razao_contratacao"];

$destinatario = "rh@vaidemotoca.com, aux.rh@vaidemotoca.com, bruna@tradekar.com.br, lumapitanga@vaidemotoca.com, financeirosp@vaidemotoca.com";
$assunto = "Novo Curriculo para Vaga: $vaga";

$corpo = "Nome: $nome\n";
$corpo .= "E-mail: $email\n";
$corpo .= "Data De Nascimento: $data_Nascimento\n";
$corpo .= "Vaga: $vaga\n";
$corpo .= "Região: $regiao\n";
$corpo .= "Porque Contratar: $razao_contratacao\n";

// Configurações do arquivo anexado
$curriculo_nome = $_FILES["curriculo"]["name"];
$curriculo_tmp = $_FILES["curriculo"]["tmp_name"];
$curriculo_destino = "curriculos/" . $curriculo_nome;
move_uploaded_file($curriculo_tmp, $curriculo_destino);

// Adiciona o arquivo ao corpo do e-mail
$corpo .= "Currículo: $curriculo_destino\n";

// Leitura do arquivo e codificação em base64
$arquivo = file_get_contents($curriculo_destino);
$arquivo_codificado = chunk_split(base64_encode($arquivo));

// Configurações do servidor SMTP
$remetente = "empregos@vaidemotoca.com";
$senha = "Empregos0412*";
$host_smtp = "smtp.titan.email";
$porta_smtp = 465;
$secure_smtp = "ssl";

// Headers para o e-mail com anexo
$headers = "From: $remetente\r\n";
$headers .= "Reply-To: $remetente\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

// Corpo do e-mail com anexo
$mensagem = "--boundary\r\n";
$mensagem .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
$mensagem .= "Content-Transfer-Encoding: 8bit\r\n\n";
$mensagem .= $corpo . "\r\n";
$mensagem .= "--boundary\r\n";
$mensagem .= "Content-Type: application/octet-stream; name=\"$curriculo_nome\"\r\n";
$mensagem .= "Content-Transfer-Encoding: base64\r\n";
$mensagem .= "Content-Disposition: attachment\r\n\n";
$mensagem .= $arquivo_codificado . "\r\n";
$mensagem .= "--boundary--";

// Função mail para enviar o e-mail com anexo
mail($destinatario, $assunto, $mensagem, $headers, "-f$remetente");

// Redireciona o usuário após o envio do formulário
header("Location: obrigado");
exit;
?>