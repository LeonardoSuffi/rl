

<style>
    input::file-selector-button {
        background-color: #f8f9fa;
        border-color: #adb5bd !important;
        color: #212529;
  font-weight: bold;
  padding: 0.1em 0.9em;
  border: 1px solid #adb5bd !important;
  border-radius: 3px;
          transition: 0.6s;
    }
    
    input::file-selector-button:hover {
        background-color: #e7f5ff;
        border-color: #339af0 !important;
        color: #339af0;


    }

        form {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: flex-start;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .w2 {
            width: 100% !important;
        }

        .w {
            width: 48% !important;
        }

        label {
            font-family: 'Inter', sans-serif;
            color: #5E6366 !important;
            font-size: 1rem;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            align-self: stretch;
            margin-bottom: 8px;
        }

        input, select, textarea {
            font-family: 'Inter', sans-serif;
            display: flex;
            height: 38px !important;
            padding: 8px !important;
            flex-direction: column;
            align-items: flex-start;
            flex-shrink: 0;
            border-radius: 8px !important;
            border: 1px solid #CFD3D4 !important;
            outline: none;
            box-sizing: border-box; /* Certifique-se de incluir o box-sizing */
        }

        /* Ajuste específico para o campo de e-mail */
        input[type="email"] {
            width: 100% !important;
            margin: 0px !important;
        }

textarea{
    height: 40% !important;
}

        placeholder, select, textarea, input {
            align-self: stretch;
            color: #343a40 !important;
            /* Input/Placeholder */
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        
@media only screen and (max-width: 767px) {
.w, .w2 {
            width: 95% !important;
        }
        form {
            display: inline-block;
            padding: 10px;
        }
        
        label {
        margin-top: 12px;
}
}        
    </style>

<form action="/z1.php" method="post" enctype="multipart/form-data">

    <div class="w"> <!-- Campo 1: Nome Completo -->
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" required>
    </div>

    <div class="w"> <!-- Campo 1.1: E-mail -->
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="w"><!-- Campo 2: Região -->
        <label for="regiao">Região:</label>
        <select id="regiao" name="regiao" required>
            <option value="salvador">Salvador</option>
            <option value="sao_paulo">São Paulo</option>
        </select>
    </div>

    <div class="w"><!-- Campo 3: Data de Nascimento -->
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="text" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000" required oninput="formatarData(this)" maxlength="10">

    </div>

    <div class="w2"><!-- Campo 4: Vaga de Interesse -->
        <label>Qual vaga você tem interesse?</label>
        <select id="vaga" name="vaga" required>
            <option value="comercial">Comercial</option>
            <option value="marketing">Marketing</option>
            <option value="financeiro">Financeiro</option>
            <option value="administrativo">Administrativo</option>
            <option value="central">Central de Monitoramento e Gestão de Veículos (roubo/furto/emergências)</option>
            <option value="operação">Operação (atendimento ao cliente)</option>
            <option value="oficina">Oficina</option>
            <option value="recurso-humanos">Recurso Humanos</option>
        </select>
    </div>

    <div class="w2"><!-- Campo 5: Razão para contratação -->
        <label for="razao_contratacao">Por que deveríamos te contratar ou por que você gostaria de trabalhar na Motoca?</label>
        <textarea id="razao_contratacao" name="razao_contratacao" rows="4" required></textarea>
    </div>

    <div class="w2"><!-- Campo 6: Upload de Currículo -->
        <label for="curriculo">Faça upload do seu currículo:<span style="color:red;">(Formato PDF, word, docx,doc)*</span></label>
        <input type="file" id="curriculo" name="curriculo" accept=".doc, .docx, .pdf" required onchange="validateFile(this)">
    </div>
    <!-- Botão de Envio -->
    <div class="w2"><button class="elementor-button" style="font-family: 'Inter', sans-serif; font-weight: 600;width: 100%!important; margin-top:12px;" type="submit">Juntar-se a Equipe</button></div>

</form>
 <script>
        function formatarData(input) {
            // Remove caracteres não numéricos
            var valor = input.value.replace(/\D/g, '');

            // Adiciona a máscara DD/MM/YYYY
            if (valor.length > 2) {
                valor = valor.replace(/(\d{2})(\d)/, '$1/$2');
            }
            if (valor.length > 5) {
                valor = valor.replace(/(\d{2})(\d)/, '$1/$2');
            }

            // Atualiza o valor do campo
            input.value = valor;
        }
    </script>
    <script>
function validateFile(input) {
    const file = input.files[0];

    // Verificar se um arquivo foi selecionado
    if (file) {
        // Verificar o tamanho do arquivo (25 MB)
        const maxSize = 24 * 1024 * 1024; // 25 MB em bytes
        if (file.size > maxSize) {
            alert("O tamanho do arquivo deve ser no máximo 24 MB.");
            input.value = ''; // Limpar a seleção do arquivo
            return;
        }
    }
}
</script>

<?php
$email = $_POST["email"];
$nome = $_POST["nome_completo"];
$vaga = $_POST["vaga"];
$regiao = $_POST["regiao"];
$data_Nascimento = $_POST["data_nascimento"];
$razao_contratacao = $_POST["razao_contratacao"];
$destinatario = "cleverttonferreira123@gmail.com, vaidemotocavagas@gmail.com";
$assunto = "Novo Curriculo para Vaga: $vaga";
$corpo = "Nome: $nome\n";
$corpo .= "E-mail: $email\n";
$corpo .= "Data De Nascimento: $data_Nascimento\n";
$corpo .= "Vaga: $vaga\n";
$corpo .= "Região: $regiao\n";
$corpo .= "Porque Contratar: $razao_contratacao\n";
$curriculo_nome = $_FILES["curriculo"]["name"];
$curriculo_tmp = $_FILES["curriculo"]["tmp_name"];
$curriculo_destino = "curriculos/" . $curriculo_nome;

$extensoes_permitidas = array("doc", "docx", "pdf"); // Adicionando "pdf" como extensão permitida
$extensao = pathinfo($curriculo_destino, PATHINFO_EXTENSION);

if (!in_array($extensao, $extensoes_permitidas)) {
    die("Erro: O arquivo não é um documento do Word ou PDF.");
}

$arquivo = file_get_contents($curriculo_destino);

if ($extensao == "pdf") {
    // Se o arquivo for um PDF, você pode realizar verificações específicas para PDF aqui.
    // Por exemplo, pode ser útil usar uma biblioteca como TCPDF ou FPDF para processar o conteúdo do PDF.
    // No entanto, isso pode ser mais complexo do que simplesmente verificar palavras-chave.
}

$palavras_chave_suspeitas = array(
    "exec(", 
    "system(", 
    "shell_exec(", 
    "eval(", 
    "base64_decode(", 
    "assert(", 
    "preg_replace(",
    "passthru(",
    "popen(",
    "proc_open(",
    "pcntl_exec(",
    "assert(",
    "assert ",
    "fopen(",
    "file_get_contents(",
    "file_put_contents(",
    "fwrite(",
    "fread(",
    "unlink(",
    "rmdir(",
    "mkdir(",
    "curl_exec(",
    "curl_multi_exec(",
    "parse_str(",
    "session_start(",
    "system ",
    "mysql_query(",
    "mysqli_query(",
    "pg_query(",
    "execsql(",
    "odbc_exec(",
    "odbc_exec(",
    "passthru(",
    "system(",
    "execsql(",
    "escapeshellcmd(",
    "escapeshellarg(",
    "proc_open(",
    "popen(",
    "proc_nice(",
    "apache_setenv(",
    "putenv(",
    "eval(",
    "preg_replace(",
    "file_exists(",
    "copy(",
    "move_uploaded_file(",
    "include(",
    "require("
);

foreach ($palavras_chave_suspeitas as $palavra_chave) {
    // Verificando palavras-chave suspeitas apenas se o arquivo não for um PDF
    if ($extensao != "pdf" && strpos($arquivo, $palavra_chave) !== false) {
        die("Erro: O arquivo contém conteúdo potencialmente malicioso.");
    }
}

move_uploaded_file($curriculo_tmp, $curriculo_destino);
$corpo .= "Currículo: $curriculo_destino\n";
$arquivo = file_get_contents($curriculo_destino);
$arquivo_codificado = chunk_split(base64_encode($arquivo));
$remetente = "empregos@vaidemotoca.com";
$senha = "Empregos0412*";
$host_smtp = "smtp.titan.email";
$porta_smtp = 465;
$secure_smtp = "ssl";
$headers = "From: $remetente\r\n";
$headers .= "Reply-To: $remetente\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
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
mail($destinatario, $assunto, $mensagem, $headers, "-f$remetente");
header("Location: obrigado");
exit;
?>
