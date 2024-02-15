<form action="#" method="post" id="leo-suffi">
  <input type="text" name="name" id="nome" placeholder="Seu Nome" required/>
  <input type="text" id="tel" name="tel" placeholder="DDD+Telefone" maxlength="15" required/>
  <input type="email" name="email" id="email" placeholder="Seu E-mail" required/>
  <input type="text" name="empresa" id="empresa" placeholder="Nome da empresa" required/>
  <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ da empresa" required/>
  <select name="valor" id="valor" required>
    <option value="">Cargo na empresa?</option>
    <option value="Propietário">Propietário</option>
    <option value="Funcionário">Funcionário</option>
  </select>
  <button type="submit" id="sub">Enviar</button>
</form>
<div id="msg" class="show" style="display:none;">
    <p class="thanks">Obrigado <span class="heart">&hearts;</span></p>
    <p class="message">Fique atento a seu e-mail. Enviaremos mais informações através dele</p>
  </div>
  <style>
      #msg {
          display: none;
          color: white;
          padding: 20px;
          width: 100%;
          border-radius: 10px;
          margin-top: 20px;
          text-align: center;
          box-shadow: 0px 0px 20px -5px #f09819;
      }
      
      #msg p {
          margin: 0; /* Remover a margem padrão do parágrafo */
          font-size: 18px;
          font-weight: bold;
      }
      
      #msg.show {
          display: block;
      }
      
      #msg .heart {
          color: #ff095c;
          font-size: 24px;
          margin: 0 5px;
          vertical-align: middle;
      }
      
      #msg .thanks {
          font-size: 24px;
          font-weight: bold;
          margin-bottom: 10px;
      }
      
      #msg .message {
          font-size: 16px;
      }
      @media (max-width: 767px){
          #msg{
              width:100%;
          }
      }
 .heart{
color: #D3FE00 !important;
vertical-align: 2px !important;
      }
      
</style>

<script>
function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  let regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
  return results === null
    ? ""
    : decodeURIComponent(results[1].replace(/\+/g, " "));
}

document.addEventListener('DOMContentLoaded', function () {
const form = document.querySelector("#leo-suffi");
form.addEventListener('submit', function (event) {
  event.preventDefault();
  const nome = document.getElementById('nome').value;
  const tel = document.getElementById('tel').value;
  const email = document.getElementById('email').value;
  const empresa = document.getElementById('empresa').value;
  const valor = document.getElementById('valor').value;
  const cnpj = document.getElementById('cnpj').value;
  let utm_source = getParameterByName("utm_source");
  let utm_medium = getParameterByName("utm_medium");
  let utm_campaign = getParameterByName("utm_campaign");
  let utm_term = getParameterByName("utm_term");
  let utm_content = getParameterByName("utm_content");
  let utm_position = getParameterByName("utm_position");
  let utm_device = getParameterByName("utm_device");
  let utm_match = getParameterByName("utm_match");
  let utm_creative = getParameterByName("utm_creative");
  var mensagemObrigado = document.getElementById('msg');

  const formData = {
    event_type: 'CONVERSION',
    event_family: 'CDP',
    payload: {
      conversion_identifier: "EVENTO - Acelera10x",
      name: nome,
      email: email,
      job_title: '',
      state: '',
      city: '',
      country: '',
      personal_phone: tel,
      mobile_phone: tel,
      twitter: '',
      facebook: '',
      linkedin: '',
      website: '',
      cf_custom_field_name: '',
      company_name: empresa+" - "+cnpj,
      company_site: '',
      company_address: '',
      client_tracking_id: '',
      traffic_source: 'utm_source',
      traffic_medium: 'utm_medium',
      traffic_campaign: 'utm_campaign',
      traffic_value: '',
      tags: [valor],
      available_for_mailing: true,
      legal_bases: [{ category: 'communications', type: 'consent', status: 'granted' }],
    },
  };

  const options = {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(formData),
  };

  fetch('https://api.rd.services/platform/conversions?api_key=f1ef440028167394ca97828e584919fd', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));
    document.querySelector('#leo-suffi').style.display = 'none';
    mensagemObrigado.style.display = 'block';
});
});

  function formatarTelefone(input) {
    var cleaned = ('' + input.value).replace(/\D/g, '');
    var match = cleaned.match(/^(\d{2})(\d{4,5})(\d{4})$/);
    if (match) {
      input.value = '(' + match[1] + ') ' + match[2] + '-' + match[3];
    } else {
      input.value = cleaned;
    }
  }
  document.querySelector('#tel').addEventListener('input', function() {
    formatarTelefone(this);
  });

  document.getElementById('cnpj').addEventListener('input', function (e) {
      var cnpj = e.target.value.replace(/\D/g, ''); // Remove tudo que não for dígito
      if (cnpj.length > 14) {
          cnpj = cnpj.slice(0, 14); // Limita a 14 caracteres
      }
      if (cnpj.length < 3) {
          e.target.value = cnpj;
          return;
      }
      cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2'); // Coloca ponto após os primeiros dois dígitos
      cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); // Coloca ponto após os próximos três dígitos
      cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2'); // Coloca barra após os próximos três dígitos
      cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2'); // Coloca hífen após os próximos quatro dígitos
      e.target.value = cnpj;
  });
  </script>
  <style>
    #leo-suffi {
    width: 100%;
    text-align: center;
}
#leo-suffi input{
    width: 49.5%;
    background-color: transparent;
        border: 2px solid #f6f6f6;
        margin-top: 10px;
        color: #f6f6f6;
        height: 55px;
        font-size: 18px;
        font-weight: 600;
}
#leo-suffi input:focus {
    border: 2px solid;
    border-image: linear-gradient(45deg, #D3FE00 0%, #00406D 70%, #00406D 100%);
    border-image-slice: 1;
}
#leo-suffi option{
    color: #000;
    font-weight: 500;
}
#leo-suffi select{
    width:100%;
    background-color: transparent;
    border: 2px solid #f6f6f6;
    margin-top: 10px;
    color: #f6f6f6;
    height: 55px;
    font-size: 15px;
    font-weight: 700;
}
#leo-suffi #email{
    width: 100%
}
#leo-suffi button{
    font-weight: 700;
    width: 100%;
    margin: auto;
    background-color: #D3FE00;
    color: #000;
    font-size: 18px;
    border: none;
    height: 60px;
    margin-top: 15px;
    animation: leo 2.5s infinite;
}
#leo-suffi button:hover{
  background-image: linear-gradient(45deg, #f6f6f6 0%, #f6f6f6 10%, #D3FE00 100%);
  
    color: #000;
}
@keyframes leo {
  0%,
    100% {
    transform: translateY(-15%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }

  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}
::placeholder {
color: #ffffff90;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
color: #ffffff90;
}
::-webkit-input-placeholder { /* Edge */
color: #ffffff90;
}

@media (max-width: 480px) {
#leo-suffi input{
    width: 100%;
}
}
  </style>